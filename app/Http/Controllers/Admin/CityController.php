<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CityDataTable;
use App\DataTables\CountryDataTable;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SebastianBergmann\CodeCoverage\TestFixture\C;

class CityController extends Controller
{

    public function index(CityDataTable $city)
    {
        return $city->render('dashboard.page.city.index', ['title' => trans('admin.city')]);
    }


    public function create()
    {
        return view('dashboard.page.city.create', ['title' => trans('admin.city')]);
    }


    public function store(Request $request)
    {
        $data = $this->validate(request(),
            [
                'city_name_ar' => 'required',
                'city_name_en' => 'required',
                'country_id'   => 'required|numeric',

            ], [], [
                'city_name_ar' => trans('admin.city_name_ar'),
                'city_name_en' => trans('admin.city_name_en'),
                'country_id'   => trans('admin.country_id'),

            ]);

        City::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect()->route('city.index');
    }


    public function edit($id)
    {
        $city = City::find($id);
        $title = trans('admin.edit');
        return view('dashboard.page.city.edit', compact('city', 'title'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate(request(),
            [
                'city_name_ar' => 'required',
                'city_name_en' => 'required',
                'country_id'   => 'required|numeric',

            ], [], [
                'city_name_ar' => trans('admin.city_name_ar'),
                'city_name_en' => trans('admin.city_name_en'),
                'country_id'   => trans('admin.country_id'),
            ]);

        City::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return redirect()->route('city.index');
    }


    public function destroy($id)
    {
        $cities = City::find($id);

        $cities->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect()->route('city.index');
    }

    public function destroy_all() {
        if (is_array(request('item'))) {
            foreach (request('item') as $id) {
                $cities = City::find($id);
                $cities->delete();
            }
        } else {
            $cities = City::find(request('item'));
            $cities->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect()->route('city.index');
    }
}
