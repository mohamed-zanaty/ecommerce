<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\AdminReset;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminAuthController extends Controller
{
    public function index()
    {
        return view('dashboard.login');
    }//index


    public function dologin()
    {
        $rememberme = request('rememberme') == 1 ? true : false;
        if (auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
            return redirect('admin');
        } else {
            session()->flash('error', trans('admin.inccorrect_information_login'));
            return redirect('admin/login');
        }
    }//dologin


    public function forget_password()
    {
        return view('dashboard.forgetpassword');
    }//forget_password


    public function forget_password_action(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();
        if (!empty($admin)) {
            $token = app('auth.password.broker')->createToken($admin);
            $data = DB::table('password_resets')->insert([
                'email' => $admin->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
            Mail::to($admin->email)->send(new AdminReset(['data' => $admin, 'token' => $token]));
            return back()->with('success', 'email was sent');
        }
        return redirect()->back();
    }//forget_password_action


    public function reset($token)
    {
        $check = DB::table('password_resets')->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subHours(2))->first();
        if (!empty($check)) {
            return view('dashboard.reset', compact('check'));
        }
        return route('forget.password');
    }//reset


    public function reset_password(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        $check = DB::table('password_resets')->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subHours(2))->first();
        if (!empty($check)) {
            $admin = Admin::where('email', $check->email)->update([
                'email' => $check->email,
                'password' => bcrypt($request->password),
            ]);
            DB::table('password_resets')->where('email', $check->email)->delete();
            auth('admin')->attempt(['email' => request('email'), 'password' => request('password')], true);
            return redirect()->route('dashboard');
        } else {
            return route('forget.password');
        }
    }//reset_password


}//end of controller
