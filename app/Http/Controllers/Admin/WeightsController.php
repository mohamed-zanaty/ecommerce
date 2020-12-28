<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\WeightsDatatable;
use App\Http\Controllers\Controller;
use App\Models\Weight;
use Illuminate\Http\Request;


class WeightsController extends Controller
{

   public function index(WeightsDatatable $trade)
   {
      return $trade->render('dashboard.page.weights.index', ['title' => trans('admin.weights')]);
   }


   public function create()
   {
      return view('dashboard.page.weights.create', ['title' => trans('admin.add')]);
   }


   public function store()
   {

      $data = $this->validate(request(),
         [
            'name_ar' => 'required',
            'name_en' => 'required',

         ], [], [
            'name_ar' => trans('admin.name_ar'),
            'name_en' => trans('admin.name_en'),

         ]);

      Weight::create($data);
      session()->flash('success', trans('admin.record_added'));
      return redirect(aurl('weights'));
   }


   public function edit($id)
   {
      $weight = Weight::find($id);
      $title  = trans('admin.edit');
      return view('dashboard.page.weights.edit', compact('weight', 'title'));
   }


   public function update(Request $r, $id)
   {

      $data = $this->validate(request(),
         [
            'name_ar' => 'required',
            'name_en' => 'required',
         ], [], [
            'name_ar' => trans('admin.name_ar'),
            'name_en' => trans('admin.name_en'),
         ]);

      Weight::where('id', $id)->update($data);
      session()->flash('success', trans('admin.updated_record'));
      return redirect(aurl('weights'));
   }


   public function destroy($id)
   {
      $weights = Weight::find($id);
      $weights->delete();
      session()->flash('success', trans('admin.deleted_record'));
      return redirect(aurl('weights'));
   }

   public function destroy_all()
   {
      if (is_array(request('item'))) {
         foreach (request('item') as $id) {
            $malls = Weight::find($id);
            $malls->delete();
         }
      } else {
         $malls = Weight::find(request('item'));
         $malls->delete();
      }
      session()->flash('success', trans('admin.deleted_record'));
      return redirect(aurl('weights'));
   }
}
