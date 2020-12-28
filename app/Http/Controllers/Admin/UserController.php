<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\DataTables\UserDataTable;

class UserController extends Controller
{

    public function index(UserDataTable $user)
    {
        return $user->render('dashboard.page.user.index');
    }//index


    public function create()
    {
        return view('dashboard.page.user.create', ['title' => trans('user.create_user')]);

    }//create


    public function store()
    {
        $data = $this->validate(request(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'level' => 'required|in:user,company,vendor',
                'password' => 'required|min:6'
            ], [], [
                'name' => trans('user.name'),
                'email' => trans('user.email'),
                'password' => trans('user.password'),
            ]);
        $data['password'] = bcrypt(request('password'));
        User::create($data);
        session()->flash('success', trans('user.record_added'));
        return redirect()->route('user.index');
    }//store


    public function edit($id)
    {
        $user = User::find($id);
        $title = trans('user.edit');
        return view('dashboard.page.user.edit', compact('user', 'title'));
    }//edit


    public function update($id)
    {

        $data = $this->validate(request(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'level' => 'required|in:user,company,vendor',
                'password' => 'sometimes|nullable|min:6'
            ], [], [
                'name' => trans('user.name'),
                'email' => trans('user.email'),
                'password' => trans('user.password'),
            ]);
        if (request()->has('password')) {
            $data['password'] = bcrypt(request('password'));
        }
        User::where('id', $id)->update($data);
        session()->flash('success', trans('user.updated_record'));
        return redirect()->route('user.index');
    }//update


    public function destroy($id)
    {
        User::find($id)->delete();
        session()->flash('success', trans('user.deleted_record'));
        return redirect()->route('user.index');

    }//destroy

    public function destroy_all()
    {
        if (is_array(request('item'))) {
            User::destroy(request('item'));
        } else {
            User::find(request('item'))->delete();
        }
        session()->flash('success', trans('user.deleted_record'));
        return redirect()->route('user.index');

    }//destroy_all

}//controller
