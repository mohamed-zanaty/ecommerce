<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ShippingDatatable;
use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ShippingController extends Controller
{

    public function index(ShippingDatatable $trade)
    {
        return $trade->render('dashboard.page.shipping.index', ['title' => trans('admin.shipping')]);
    }


    public function create()
    {
        return view('dashboard.page.shipping.create', ['title' => trans('admin.add')]);
    }

    public function store(Request $request)
    {

        $data = $this->validate(request(),
            [
                'name_ar' => 'required',
                'name_en' => 'required',
                'user_id' => 'required|numeric',
                'lat' => 'sometimes|nullable',
                'lng' => 'sometimes|nullable',
                'icon' => 'sometimes|nullable|image',
            ], [], [
                'name_ar' => trans('admin.name_ar'),
                'name_en' => trans('admin.name_en'),
                'user_id' => trans('admin.user_id'),
                'lat' => trans('admin.lat'),
                'lng' => trans('admin.lng'),
                'icon' => trans('admin.icon'),
            ]);

        if (request()->hasFile('icon')) {
            Image::make($request->icon)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/shipping/' . $request->icon->hashName()));

            $data['icon'] = $request->icon->hashName();
        }

        Shipping::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('shipping'));
    }


    public function edit($id)
    {
        $shipping = Shipping::find($id);
        $title = trans('admin.edit');
        return view('dashboard.page.shipping.edit', compact('shipping', 'title'));
    }

    public function update(Request $request, $id)
    {

        $shipping = Shipping::findOrFail($id);
        $data = $this->validate(request(),
            [
                'name_ar' => 'required',
                'name_en' => 'required',
                'user_id' => 'required|numeric',
                'lat' => 'sometimes|nullable',
                'lng' => 'sometimes|nullable',
                'icon' => 'sometimes|nullable|image',
            ], [], [
                'name_ar' => trans('admin.name_ar'),
                'name_en' => trans('admin.name_en'),
                'user_id' => trans('admin.user_id'),
                'lat' => trans('admin.lat'),
                'lng' => trans('admin.lng'),
                'icon' => trans('admin.icon'),
            ]);

        if (request()->hasFile('icon')) {
            Storage::disk('public_uploads')->delete('/shipping/' . $shipping->icon);


            Image::make($request->icon)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/shipping/' . $request->icon->hashName()));

            $data['icon'] = $request->icon->hashName();
        }

        $shipping->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return redirect(aurl('shipping'));
    }


    public function destroy($id)
    {
        $shipping = Shipping::find($id);
        Storage::disk('public_uploads')->delete('/shipping/' . $shipping->icon);
        $shipping->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('shipping'));
    }

    public function destroy_all()
    {
        if (is_array(request('item'))) {
            foreach (request('item') as $id) {
                $shipping = Shipping::find($id);
                Storage::disk('public_uploads')->delete('/shipping/' . $shipping->icon);
                $shipping->delete();
            }
        } else {
            $shipping = Shipping::find(request('item'));
            Storage::disk('public_uploads')->delete('/shipping/' . $shipping->icon);
            $shipping->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('shipping'));
    }
}
