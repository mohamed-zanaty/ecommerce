<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\SizesDatatable;
use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;

class SizesController extends Controller
{

   public function index(SizesDatatable $trade)
   {
      return $trade->render('dashboard.page.sizes.index', ['title' => trans('admin.sizes')]);
   }


   public function create()
   {
      return view('dashboard.page.sizes.create', ['title' => trans('admin.add')]);
   }


   public function store()
   {

      $data = $this->validate(request(),
         [
            'name_ar'       => 'required',
            'name_en'       => 'required',
            'department_id' => 'required|numeric',
            'is_public'     => 'required|in:yes,no',

         ], [], [
            'name_ar'       => trans('admin.name_ar'),
            'name_en'       => trans('admin.name_en'),
            'department_id' => trans('admin.department_id'),
            'is_public'     => trans('admin.is_public'),
         ]);

      Size::create($data);
      session()->flash('success', trans('admin.record_added'));
      return redirect(aurl('sizes'));
   }


   public function edit($id)
   {
      $size  = Size::find($id);
      $title = trans('admin.edit');
      return view('dashboard.page.sizes.edit', compact('size', 'title'));
   }


   public function update(Request $r, $id)
   {
      $data = $this->validate(request(),
         [
            'name_ar'       => 'required',
            'name_en'       => 'required',
            'department_id' => 'required|numeric',
            'is_public'     => 'required|in:yes,no',

         ], [], [
            'name_ar'       => trans('admin.name_ar'),
            'name_en'       => trans('admin.name_en'),
            'department_id' => trans('admin.department_id'),
            'is_public'     => trans('admin.is_public'),
         ]);

      Size::where('id', $id)->update($data);
      session()->flash('success', trans('admin.updated_record'));
      return redirect(aurl('sizes'));
   }


   public function destroy($id)
   {
      $size = Size::find($id);
      $size->delete();
      session()->flash('success', trans('admin.deleted_record'));
      return redirect(aurl('sizes'));
   }

   public function multi_delete()
   {
      if (is_array(request('item'))) {
         foreach (request('item') as $id) {
            $size = Size::find($id);
            $size->delete();
         }
      } else {
         $size = Size::find(request('item'));
         $size->delete();
      }
      session()->flash('success', trans('admin.deleted_record'));
      return redirect(aurl('sizes'));
   }
}
