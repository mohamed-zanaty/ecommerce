<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DepartmentsController extends Controller
{

    public function index()
    {
        return view('dashboard.page.departments.index', ['title' => trans('admin.departments')]);
    }


    public function create()
    {
        return view('dashboard.page.departments.create', ['title' => trans('admin.add')]);
    }


    public function store(Request $request)
    {

        $data = $this->validate(request(),
            [
                'dep_name_ar' => 'required',
                'dep_name_en' => 'required',
                'parent' => 'sometimes|nullable|numeric',
                'icon' => 'sometimes|nullable|image',
                'description' => 'sometimes|nullable',
                'keyword' => 'sometimes|nullable',

            ], [], [
                'dep_name_ar' => trans('admin.dep_name_ar'),
                'dep_name_en' => trans('admin.dep_name_en'),
                'parent' => trans('admin.parent'),
                'icon' => trans('admin.icon'),
                'description' => trans('admin.description'),
                'keyword' => trans('admin.keyword'),
            ]);

        if (request()->hasFile('icon')) {
            Image::make($request->icon)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/department/' . $request->icon->hashName()));

            $data['icon'] = $request->icon->hashName();
        }

        Department::create($data);
        session()->flash('success', trans('admin.record_added'));
        return redirect()->route('department.index');
    }


    public function edit($id)
    {
        $department = Department::find($id);
        $title = trans('admin.edit');
        return view('dashboard.page.departments.edit', compact('department', 'title'));
    }


    public function update(Request $request, $id)
    {

        $department = Department::findOrFail($id);
        $data = $this->validate(request(),
            [
                'dep_name_ar' => 'required',
                'dep_name_en' => 'required',
                'parent' => 'sometimes|nullable|numeric',
                'icon' => 'sometimes|nullable|image',
                'description' => 'sometimes|nullable',
                'keyword' => 'sometimes|nullable',

            ], [], [
                'dep_name_ar' => trans('admin.dep_name_ar'),
                'dep_name_en' => trans('admin.dep_name_en'),
                'parent' => trans('admin.parent'),
                'icon' => trans('admin.icon'),
                'description' => trans('admin.description'),
                'keyword' => trans('admin.keyword'),
            ]);

        if (request()->hasFile('icon')) {


            Storage::disk('public_uploads')->delete('/department/' . $department->icon);


            Image::make($request->icon)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/department/' . $request->icon->hashName()));

            $data['icon'] = $request->icon->hashName();


        }

        $department->update($data);
        session()->flash('success', trans('admin.updated_record'));
        return redirect()->route('department.index');
    }


    public static function delete_parent($id)
    {
        $department_parent = Department::where('parent', $id)->get();
        foreach ($department_parent as $sub) {
            self::delete_parent($sub->id);
            if (!empty($sub->icon)) {
                Storage::has($sub->icon) ? Storage::disk('public_uploads')->delete('/department/' . $sub->icon) : '';
            }
            $subdepartment = Department::find($sub->id);
            if (!empty($subdepartment)) {
                $subdepartment->delete();
            }
        }
        $dep = Department::find($id);

        if (!empty($dep->icon)) {
            Storage::has($dep->icon) ? Storage::disk('public_uploads')->delete('/department/' . $dep->icon) : '';
        }
        $dep->delete();
    }

    public function destroy($id)
    {
        self::delete_parent($id);
        session()->flash('success', trans('admin.deleted_record'));
        return redirect()->route('department.index');
    }
}
