<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\DataTables\AdminDataTable;

class AdminController extends Controller
{

    public function index(AdminDataTable $admin)
    {
        return $admin->render('dashboard.page.admin.index');
    }//index


    public function create()
    {
        return view('dashboard.page.admin.create', ['title' => trans('admin.create_admin')]);

    }//create


    public function store()
    {
        $data = $this->validate(request(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:admins',
                'password' => 'required|min:6'
            ], [], [
                'name' => trans('admin.name'),
                'email' => trans('admin.email'),
                'password' => trans('admin.password'),
            ]);
        $data['password'] = bcrypt(request('password'));
        Admin::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect()->route('moderator.index');
    }//store


    public function edit($id)
    {
        $admin = Admin::find($id);
        $title = trans('admin.edit');
        return view('dashboard.page.admin.edit', compact('admin', 'title'));
    }//edit


    public function update($id)
    {

        $data = $this->validate(request(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:admins,email,' . $id,
                'password' => 'sometimes|nullable|min:6'
            ], [], [
                'name' => trans('admin.name'),
                'email' => trans('admin.email'),
                'password' => trans('admin.password'),
            ]);
        if (request()->has('password')) {
            $data['password'] = bcrypt(request('password'));
        }
        Admin::where('id', $id)->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return redirect()->route('moderator.index');
    }//update


    public function destroy($id)
    {
        Admin::find($id)->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect()->route('moderator.index');

    }//destroy

    public function destroy_all()
    {
        if (is_array(request('item'))) {
            Admin::destroy(request('item'));
        } else {
            Admin::find(request('item'))->delete();
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect()->route('moderator.index');

    }//destroy_all

}//controller
