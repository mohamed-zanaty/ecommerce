<?php


if (!function_exists('get_parent')) {
    function get_parent($dep_id) {
        // $list_department = [];

        $department = \App\Models\Department::find($dep_id);
        if (null !== $department->parent && $department->parent > 0) {
            // array_push($list_department, $department->parent);
            return get_parent($department->parent).",".$dep_id;
        } else {
            return $dep_id;
        }
        // return $list_department;
    }
}

/////// Scan Mall Id Exists /////
if (!function_exists('check_mall')) {
    function check_mall($id, $pid) {
        return \App\Models\MallProduct::where('product_id', $pid)->where('mall_id', $id)->count() > 0?true:false;
    }
}

if (!function_exists('setting')) {
    function setting() {
        return \App\Models\Setting::orderBy('id', 'desc')->first();
    }
}if (!function_exists('websiteName')) {
    function websiteName() {
        if (app()->getLocale() == 'ar')
             return setting()-> sitename_ar ;
        else
            return setting()-> sitename_en ;

    }
}
if (!function_exists('countries')) {
    function countries() {
        return \App\Models\Country::get();
    }
}
if (!function_exists('countriesName')) {
    function countriesName() {
        if (app()->getLocale() == 'ar')
            return countries()-> country_name_ar ;
        else
            return countries()-> country_name_en ;

    }
}
if (!function_exists('featured')) {
    function featured() {
        $product_featured = \App\Models\Product::where('featured','1')->where('status','active')->where('end_at','>',\Carbon\Carbon::now())->get();
        return $product_featured;

    }
}


if (!function_exists('load_dep')) {
    function load_dep($select = null, $dep_hide = null)
    {

        $departments = \App\Models\Department::selectRaw('dep_name_'. app()->getLocale() .' as text')
            ->selectRaw('id as id')
            ->selectRaw('parent as parent')
            ->get(['text', 'parent', 'id']);
        $dep_arr = [];
        foreach ($departments as $department) {
            $list_arr = [];
            $list_arr['icon'] = '';
            $list_arr['li_attr'] = '';
            $list_arr['a_attr'] = '';
            $list_arr['children'] = [];

            if ($select !== null and $select == $department->id) {

                $list_arr['state'] = [
                    'opened' => true,
                    'selected' => true,
                    'disabled' => false,
                ];
            }

            if ($dep_hide !== null and $dep_hide == $department->id) {

                $list_arr['state'] = [
                    'opened' => false,
                    'selected' => false,
                    'disabled' => true,
                    'hidden' => true,
                ];
            }

            $list_arr['id'] = $department->id;
            $list_arr['parent'] = $department->parent > 0 ? $department->parent : '#';
            $list_arr['text'] = $department->text;
            array_push($dep_arr, $list_arr);
        }

        return json_encode($dep_arr, JSON_UNESCAPED_UNICODE);
    }
}

if (!function_exists('aurl')) {
    function aurl($url = null) {
        return url('admin/'.$url);
    }


}

if (!function_exists('up')) {
    function up() {
        return new \App\Http\Controllers\Upload;
    }
}

if (!function_exists('parent_category')) {
    function parent_category() {
        $categories = \App\Models\Department::where('parent',null)->get();
        return $categories;
    }
}
