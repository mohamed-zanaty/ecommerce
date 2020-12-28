<?php
namespace App\Http\Controllers\Admin;

use App\DataTables\TradeMarkDatatable;
use App\Http\Controllers\Controller;
use App\Models\TradeMarks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TradeMarksController extends Controller {

	public function index(TradeMarkDatatable $trade) {
		return $trade->render('dashboard.page.trademarks.index', ['title' => trans('admin.TradeMarks')]);
	}


	public function create() {
		return view('dashboard.page.trademarks.create', ['title' => trans('admin.create_trademarks')]);
	}


	public function store(Request $request) {

		$data = $this->validate(request(),
			[
				'name_ar' => 'required',
				'name_en' => 'required',
                'logo' => 'sometimes|nullable|image',
			], [], [
				'name_ar' => trans('admin.name_ar'),
				'name_en' => trans('admin.name_en'),
				'logo'    => trans('admin.trade_icon'),
			]);

		if (request()->hasFile('logo')) {
            Image::make($request->logo)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/trademarks/' . $request->logo->hashName()));

            $data['logo'] = $request->logo->hashName();
		}

		TradeMarks::create($data);
		session()->flash('success', trans('admin.record_added'));
		return redirect(aurl('trademarks'));
	}


	public function edit($id) {
		$trademark = TradeMarks::find($id);
		$title     = trans('admin.edit');
		return view('dashboard.page.trademarks.edit', compact('trademark', 'title'));
	}


	public function update(Request $request, $id) {
        $trademark = TradeMarks::findOrFail($id);
		$data = $this->validate(request(),
			[
				'name_ar' => 'required',
				'name_en' => 'required',
				'logo'    => 'sometimes|nullable|image',
			], [], [
				'name_ar' => trans('admin.name_ar'),
				'name_en' => trans('admin.name_en'),
				'logo'    => trans('admin.trade_icon'),
			]);

		if (request()->hasFile('logo')) {
           Storage::disk('public_uploads')->delete('/trademark/' . $trademark->logo);


            Image::make($request->logo)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/trademark/' . $request->logo->hashName()));

            $data['logo'] = $request->logo->hashName();
		}

        $trademark->update($data);
		session()->flash('success', trans('admin.updated_record'));
		return redirect(aurl('trademarks'));
	}


	public function destroy($id) {
		$TradeMarks = TradeMarks::find($id);
        Storage::disk('public_uploads')->delete('/trademark/' . $TradeMarks->logo);
		$TradeMarks->delete();
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('trademarks'));
	}

	public function destroy_all() {
		if (is_array(request('item'))) {
			foreach (request('item') as $id) {
				$TradeMarks = TradeMarks::find($id);
                Storage::disk('public_uploads')->delete('/trademark/' . $TradeMarks->logo);
				$TradeMarks->delete();
			}
		} else {
			$TradeMarks = TradeMarks::find(request('item'));
			Storage::delete($TradeMarks->logo);
			$TradeMarks->delete();
		}
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('trademarks'));
	}
}
