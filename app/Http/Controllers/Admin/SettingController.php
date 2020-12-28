<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{

    public function setting() {
        $setting = Setting::orderBy('id', 'desc')->first();
        return view('dashboard.page.setting.index', ['title' => trans('admin.settings'), 'setting'=>$setting]);
    }

    public function setting_save(Request $request) {
        $data = request()->except(['_token', '_method']);
        if ($request->logo) {
            Image::make($request->logo)
                ->save(public_path('uploads/setting/' . $request->logo->hashName()));

            $data['logo'] = $request->logo->hashName();

        }//end of external if
        Setting::orderBy('id', 'desc')->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return redirect()->route('setting.index');
    }

}//controller
