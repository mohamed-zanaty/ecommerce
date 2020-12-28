<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\StateDataTable;
use App\DataTables\CountryDataTable;
use App\Http\Controllers\Controller;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use SebastianBergmann\CodeCoverage\TestFixture\C;

class StateController extends Controller
{

    public function index(StateDataTable $state)
    {
        return $state->render('dashboard.page.state.index', ['title' => trans('admin.state')]);
    }


    public function create()
    {
        return view('dashboard.page.state.create', ['title' => trans('admin.state')]);
    }


    public function store(Request $request)
    {
        $data = $this->validate(request(),
            [
                'state_name_ar' => 'required',
                'state_name_en' => 'required',
                'country_id'   => 'required|numeric',
                'city_id'   => 'required|numeric',

            ], [], [
                'state_name_ar' => trans('admin.state_name_ar'),
                'state_name_en' => trans('admin.state_name_en'),
                'country_id'   => trans('admin.country_id'),
                'city_id'   => trans('admin.city_id'),

            ]);

        State::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect()->route('state.index');
    }


    public function edit($id)
    {
        $state = State::find($id);
        $title = trans('admin.edit');
        return view('dashboard.page.state.edit', compact('state', 'title'));
    }


    public function update(Request $request, $id)
    {
        $data = $this->validate(request(),
            [
                'state_name_ar' => 'required',
                'state_name_en' => 'required',
                'country_id'   => 'required|numeric',
                'city_id'   => 'required|numeric',

            ], [], [
                'state_name_ar' => trans('admin.state_name_ar'),
                'state_name_en' => trans('admin.state_name_en'),
                'country_id'   => trans('admin.country_id'),
                'city_id'   => trans('admin.country_id'),
            ]);

        State::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return redirect()->route('state.index');
    }


    public function destroy($id)
    {
        $state = State::find($id);

        $state->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect()->route('state.index');
    }

    public function destroy_all() {
        if (is_array(request('item'))) {
            foreach (request('item') as $id) {
                $state = State::find($id);
                $state->delete();
            }
        } else {
            $state = State::find(request('item'));
            $state->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect()->route('state.index');
    }
}
