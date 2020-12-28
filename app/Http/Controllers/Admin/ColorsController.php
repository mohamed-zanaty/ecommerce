<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\ColorsDatatable;
use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;


class ColorsController extends Controller
{

   public function index(ColorsDatatable $trade)
   {
      return $trade->render('dashboard.page.colors.index', ['title' => trans('admin.colors')]);
   }


   public function create()
   {
      return view('dashboard.page.colors.create', ['title' => trans('admin.add')]);
   }


   public function store()
   {

      $data = $this->validate(request(),
         [
            'name_ar' => 'required',
            'name_en' => 'required',
            'color'   => 'required|string',

         ], [], [
            'name_ar' => trans('admin.name_ar'),
            'name_en' => trans('admin.name_en'),
            'color'   => trans('admin.color'),
         ]);

      Color::create($data);
      session()->flash('success', trans('admin.record_added'));
      return redirect(aurl('colors'));
   }


   public function edit($id)
   {
      $color = Color::find($id);
      $title = trans('admin.edit');
      return view('admin.colors.edit', compact('color', 'title'));
   }


   public function update(Request $r, $id)
   {

      $data = $this->validate(request(),
         [
            'name_ar' => 'required',
            'name_en' => 'required',
            'color'   => 'required|string',
         ], [], [
            'name_ar' => trans('admin.name_ar'),
            'name_en' => trans('admin.name_en'),
            'color'   => trans('admin.color'),
         ]);

      Color::where('id', $id)->update($data);
      session()->flash('success', trans('admin.updated_record'));
      return redirect(aurl('colors'));
   }


   public function destroy($id)
   {
      $colors = Color::find($id);
      $colors->delete();
      session()->flash('success', trans('admin.deleted_record'));
      return redirect(aurl('colors'));
   }

   public function destroy_all()
   {
      if (is_array(request('item'))) {
         foreach (request('item') as $id) {
            $malls = Color::find($id);
            $malls->delete();
         }
      } else {
         $malls = Color::find(request('item'));
         $malls->delete();
      }
      session()->flash('success', trans('admin.deleted_record'));
      return redirect(aurl('colors'));
   }
}
