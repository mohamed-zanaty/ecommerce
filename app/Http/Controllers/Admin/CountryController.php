<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CountryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CountryController extends Controller
{

    public function index(CountryDataTable $country)
    {
        return $country->render('dashboard.page.country.index', ['title' => trans('admin.countries')]);
    }


    public function create()
    {
        return view('dashboard.page.country.create', ['title' => trans('admin.create_countries')]);
    }


    public function store(Request $request)
    {
        $data = $this->validate(request(),
            [
                'country_name_ar' => 'required',
                'country_name_en' => 'required',
                'mob' => 'required',
                'code' => 'required',
                'currency' => 'required',
                'logo' => 'required|image',
            ], [], [
                'country_name_ar' => trans('admin.country_name_ar'),
                'country_name_en' => trans('admin.country_name_en'),
                'mob' => trans('admin.mob'),
                'code' => trans('admin.code'),
                'currency' => trans('admin.currency'),
                'logo' => trans('admin.logo'),
            ]);

        if ($request->logo) {
            Image::make($request->logo)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/country/' . $request->logo->hashName()));

            $data['logo'] = $request->logo->hashName();
        }

        Country::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect()->route('country.index');
    }


    public function edit($id)
    {
        $country = Country::find($id);
        $title = trans('admin.edit');
        return view('dashboard.page.country.edit', compact('country', 'title'));
    }


    public function update(Request $request, $id)
    {
        $country = Country::where('id', $id)->first();
        $data = $this->validate(request(),
            [
                'country_name_ar' => 'required',
                'country_name_en' => 'required',
                'mob' => 'required',
                'code' => 'required',
                'currency' => 'required',
                'logo' => 'sometimes|nullable|image',
            ], [], [
                'country_name_ar' => trans('admin.country_name_ar'),
                'country_name_en' => trans('admin.country_name_en'),
                'mob' => trans('admin.mob'),
                'code' => trans('admin.code'),
                'currency' => trans('admin.currency'),
                'logo' => trans('admin.logo'),
            ]);

        if ($request->logo) {


            Storage::disk('public_uploads')->delete('/country/' . $country->logo);


            Image::make($request->logo)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/country/' . $request->logo->hashName()));

            $data['image'] = $request->logo->hashName();

        }//end of external if

        $country->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return redirect()->route('country.index');
    }


    public function destroy($id)
    {
        $country = Country::findOrFail($id);

        Storage::disk('public_uploads')->delete('/country/' . $country->image);
        $country->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect()->route('country.index');
    }

    public function destroy_all() {
        if (is_array(request('item'))) {
            foreach (request('item') as $id) {
                $countries = Country::find($id);
                Storage::disk('public_uploads')->delete('/country/' . $countries->image);
                $countries->delete();
            }
        } else {
            $countries = Country::find(request('item'));
            Storage::disk('public_uploads')->delete('/country/' . $countries->image);
            $countries->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect()->route('country.index');
    }
}
