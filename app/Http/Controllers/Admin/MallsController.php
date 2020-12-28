<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\MallsDatatable;
use App\Http\Controllers\Controller;
use App\Models\Mall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MallsController extends Controller {

    public function index(MallsDatatable $trade) {
        return $trade->render('dashboard.page.malls.index', ['title' => trans('admin.malls')]);
    }

    public function create() {
        return view('dashboard.page.malls.create', ['title' => trans('admin.add')]);
    }


    public function store(Request $request) {

        $data = $this->validate(request(),
            [
                'name_ar'      => 'required',
                'name_en'      => 'required',
                'mobile'       => 'required|numeric',
                'email'        => 'required|email',
                'country_id'   => 'required|numeric',
                'address'      => 'sometimes|nullable',
                'facebook'     => 'sometimes|nullable|url',
                'twitter'      => 'sometimes|nullable|url',
                'website'      => 'sometimes|nullable|url',
                'contact_name' => 'sometimes|nullable|string',
                'lat'          => 'sometimes|nullable',
                'lng'          => 'sometimes|nullable',
                'icon'         => 'sometimes|nullable|image',
            ], [], [
                'name_ar'      => trans('admin.name_ar'),
                'name_en'      => trans('admin.name_en'),
                'country_id'   => trans('admin.country_id'),
                'mobile'       => trans('admin.mobile'),
                'email'        => trans('admin.email'),
                'address'      => trans('admin.address'),
                'facebook'     => trans('admin.facebook'),
                'twitter'      => trans('admin.twitter'),
                'website'      => trans('admin.website'),
                'contact_name' => trans('admin.contact_name'),
                'lat'          => trans('admin.lat'),
                'lng'          => trans('admin.lng'),
                'icon'         => trans('admin.icon'),
            ]);

        if (request()->hasFile('icon')) {
            Image::make($request->icon)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/malls/' . $request->icon->hashName()));

            $data['icon'] = $request->icon->hashName();
        }

        Mall::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('malls'));
    }

    public function edit($id) {
        $mall  = Mall::find($id);
        $title = trans('admin.edit');
        return view('dashboard.page.malls.edit', compact('mall', 'title'));
    }


    public function update(Request $request, $id) {
        $mall = Mall::findOrFail($id);
        $data = $this->validate(request(),
            [
                'name_ar'      => 'required',
                'name_en'      => 'required',
                'mobile'       => 'required|numeric',
                'email'        => 'required|email',
                'country_id'   => 'required|numeric',
                'address'      => 'sometimes|nullable',
                'facebook'     => 'sometimes|nullable|url',
                'twitter'      => 'sometimes|nullable|url',
                'website'      => 'sometimes|nullable|url',
                'contact_name' => 'sometimes|nullable|string',
                'lat'          => 'sometimes|nullable',
                'lng'          => 'sometimes|nullable',
                'icon'         => 'sometimes|nullable|image' ,
            ], [], [
                'name_ar'      => trans('admin.name_ar'),
                'name_en'      => trans('admin.name_en'),
                'country_id'   => trans('admin.country_id'),
                'address'      => trans('admin.address'),
                'mobile'       => trans('admin.mobile'),
                'email'        => trans('admin.email'),
                'facebook'     => trans('admin.facebook'),
                'twitter'      => trans('admin.twitter'),
                'website'      => trans('admin.website'),
                'contact_name' => trans('admin.contact_name'),
                'lat'          => trans('admin.lat'),
                'lng'          => trans('admin.lng'),
                'icon'         => trans('admin.icon'),
            ]);

        if (request()->hasFile('icon')) {
            Storage::disk('public_uploads')->delete('/malls/' . $mall->icon);


            Image::make($request->icon)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/malls/' . $request->icon->hashName()));

            $data['icon'] = $request->icon->hashName();
        }

        $mall->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return redirect(aurl('malls'));
    }


    public function destroy($id) {
        $malls = Mall::find($id);
        Storage::disk('public_uploads')->delete('/malls/' . $malls->icon);
        $malls->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('malls'));
    }

    public function multi_delete() {
        if (is_array(request('item'))) {
            foreach (request('item') as $id) {
                $malls = Mall::find($id);
                Storage::disk('public_uploads')->delete('/malls/' . $malls->icon);
                $malls->delete();
            }
        } else {
            $malls = Mall::find(request('item'));
            Storage::disk('public_uploads')->delete('/malls/' . $malls->icon);
            $malls->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('malls'));
    }
}
