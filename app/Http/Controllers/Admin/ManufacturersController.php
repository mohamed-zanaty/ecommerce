<?php
namespace App\Http\Controllers\Admin;
use App\DataTables\ManuFactskDatatable;
use App\Http\Controllers\Controller;
use App\Models\Manufacturers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ManufacturersController extends Controller {

	public function index(ManuFactskDatatable $trade) {
		return $trade->render('dashboard.page.manufacturers.index', ['title' => trans('admin.manufacturers')]);
	}


	public function create() {
		return view('dashboard.page.manufacturers.create', ['title' => trans('admin.add')]);
	}


	public function store(Request $request) {

		$data = $this->validate(request(),
			[
				'name_ar'      => 'required',
				'name_en'      => 'required',
				'mobile'       => 'required|numeric',
				'email'        => 'required|email',
				'address'      => 'sometimes|nullable',
				'facebook'     => 'sometimes|nullable|url',
				'twitter'      => 'sometimes|nullable|url',
				'website'      => 'sometimes|nullable|url',
				'contact_name' => 'sometimes|nullable|string',
				'lat'          => 'sometimes|nullable',
				'lng'          => 'sometimes|nullable',
				'icon'         => 'sometimes|nullable|image',
			], [], [
				'name_ar'      => trans('admin.name_ar'),
				'name_en'      => trans('admin.name_en'),
				'mobile'       => trans('admin.mobile'),
				'email'        => trans('admin.email'),
				'address'      => trans('admin.address'),
				'facebook'     => trans('admin.facebook'),
				'twitter'      => trans('admin.twitter'),
				'website'      => trans('admin.website'),
				'contact_name' => trans('admin.contact_name'),
				'lat'          => trans('admin.lat'),
				'lng'          => trans('admin.lng'),
				'icon'         => trans('admin.icon'),
			]);

		if (request()->hasFile('icon')) {
            Image::make($request->icon)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/manufactures/' . $request->icon->hashName()));

            $data['icon'] = $request->icon->hashName();
		}

		Manufacturers::create($data);
		session()->flash('success', trans('admin.record_added'));
		return redirect(aurl('manufacturers'));
	}

	public function edit($id) {
		$manufact = Manufacturers::find($id);
		$title    = trans('admin.edit');
		return view('dashboard.page.manufacturers.edit', compact('manufact', 'title'));
	}


	public function update(Request $request, $id) {
        $manufacture = Manufacturers::findOrFail($id);

		$data = $this->validate(request(),
			[
				'name_ar'      => 'required',
				'name_en'      => 'required',
				'mobile'       => 'required|numeric',
				'email'        => 'required|email',
				'address'      => 'sometimes|nullable',
				'facebook'     => 'sometimes|nullable|url',
				'twitter'      => 'sometimes|nullable|url',
				'website'      => 'sometimes|nullable|url',
				'contact_name' => 'sometimes|nullable|string',
				'lat'          => 'sometimes|nullable',
				'lng'          => 'sometimes|nullable',
				'icon'         => 'sometimes|nullable|image',
			], [], [
				'name_ar'      => trans('admin.name_ar'),
				'name_en'      => trans('admin.name_en'),
				'address'      => trans('admin.address'),
				'mobile'       => trans('admin.mobile'),
				'email'        => trans('admin.email'),
				'facebook'     => trans('admin.facebook'),
				'twitter'      => trans('admin.twitter'),
				'website'      => trans('admin.website'),
				'contact_name' => trans('admin.contact_name'),
				'lat'          => trans('admin.lat'),
				'lng'          => trans('admin.lng'),
				'icon'         => trans('admin.icon'),
			]);

		if (request()->hasFile('icon')) {
            Storage::disk('public_uploads')->delete('/manufactures/' . $manufacture->icon);


            Image::make($request->icon)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/manufactures/' . $request->icon->hashName()));

            $data['icon'] = $request->icon->hashName();

        }

        $manufacture->update($data);
		session()->flash('success', trans('admin.updated_record'));
		return redirect(aurl('manufacturers'));
	}


	public function destroy($id) {
		$manufacturers = Manufacturers::find($id);
        Storage::disk('public_uploads')->delete('/manufactures/' . $manufacturers->icon);
		$manufacturers->delete();
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('manufacturers'));
	}

	public function destroy_all() {
		if (is_array(request('item'))) {
			foreach (request('item') as $id) {
				$manufacturers = Manufacturers::find($id);
                Storage::disk('public_uploads')->delete('/manufactures/' . $manufacturers->icon);
				$manufacturers->delete();
			}
		} else {
			$manufacturers = Manufacturers::find(request('item'));
            Storage::disk('public_uploads')->delete('/manufactures/' . $manufacturers->icon);
			$manufacturers->delete();
		}
		session()->flash('success', trans('admin.deleted_record'));
		return redirect(aurl('manufacturers'));
	}
}
