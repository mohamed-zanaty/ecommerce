<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductsDatatable;
use App\File as FileTbl;
use App\Http\Controllers\Controller;
use App\Models\MallProduct;
use App\Models\OtherData;
use App\Models\Product;
use App\Models\RelatedProduct;
use App\Models\Size;
use http\Env\Request;
use Illuminate\Support\Str;
use App\Models\Weight;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{

    public function index(ProductsDatatable $product)
    {
        return $product->render('dashboard.page.products.index', ['title' => trans('admin.products')]);
    }

    public function prepare_weight_size()
    {
        if (request()->ajax() and request()->has('dep_id')) {
            $dep_list = array_diff(explode(',', get_parent(request('dep_id'))), [request('dep_id')]);

            $sizes = Size::where('is_public', 'yes')
                ->whereIn('department_id', $dep_list)
                ->orWhere('department_id', request('dep_id'))
                ->pluck('name_' . app()->getLocale(), 'id');

            $weights = Weight::pluck('name_' . app()->getLocale(), 'id');
            return view('dashboard.page.products.ajax.size_weight', [
                'sizes' => $sizes,
                'weights' => $weights,
                'product' => Product::find(request('product_id')),
            ])->render();
        } else {
            return 'برجاء اختيار قسم';
        }
    }

    public function create()
    {
        $product = Product::create(['title' => '']);
        if (!empty($product)) {
            return redirect(aurl('products/' . $product->id . '/edit'));
        }
    }


    public function delete_main_image($id)
    {
        $product = Product::find($id);
        Storage::delete($product->photo);
        $product->photo = null;
        $product->save();
        //, 'photo' => $product->photo
        return response(['status' => true], 200);
    }

    public function update_product_image($id)
    {
        $product = Product::where('id', $id)->update([
            'photo' => up()->upload([
                'file' => 'file',
                'path' => 'products/' . $id,
                'upload_type' => 'single',
                'delete_file' => '',
            ]),
        ]);
        return response(['status' => true], 200);
    }


    public function edit($id)
    {
        $product = Product::find($id);

        return view('dashboard.page.products.product', ['title' => trans('admin.create_or_edit_product', ['title' => $product->title]), 'product' => $product]);
    }


    public function upload_file($id)
    {
        if (request()->hasFile('file')) {
            $fid = up()->upload([
                'file' => 'file',
                'path' => 'products/' . $id,
                'upload_type' => 'files',
                'file_type' => 'product',
                'relation_id' => $id,
            ]);
            return response(['status' => true, 'id' => $fid], 200);
        }
    }

    public function delete_file()
    {
        if (request()->has('id')) {
            up()->delete(request('id'));
        }
    }

    public function update($id)
    {

        $data = $this->validate(request(),
            [
                'title' => 'required',
                'content' => 'required',
                'department_id' => 'required|numeric',
                'trade_id' => 'required|numeric',
                'manu_id' => 'required|numeric',
                'color_id' => 'sometimes|nullable|numeric',
                'size_id' => 'sometimes|nullable|numeric',
                'size' => 'sometimes|nullable',
                'currency_id' => 'required|numeric',
                'price' => 'required|numeric',
                'stock' => 'required|numeric',
                'start_at' => 'required|date',
                'end_at' => 'required|date',

                'start_offer_at' => 'sometimes|nullable|date',
                'end_offer_at' => 'sometimes|nullable|date',
                'price_offer' => 'sometimes|nullable|numeric',
                'weight' => 'sometimes|nullable',
                'weight_id' => 'sometimes|nullable|numeric',
                'status' => 'sometimes|nullable|in:pending,refused,active',
                'reason' => 'sometimes|nullable|numeric',
            ], [], [
                'title' => trans('admin.title'),
                'content' => trans('admin.content'),
                'department_id' => trans('admin.department_id'),
                'trade_id' => trans('admin.trade_id'),
                'manu_id' => trans('admin.manu_id'),
                'color_id' => trans('admin.color_id'),
                'size_id' => trans('admin.size_id'),
                'size' => trans('admin.size'),
                'currency_id' => trans('admin.currency_id'),
                'price' => trans('admin.price'),
                'stock' => trans('admin.stock'),
                'start_at' => trans('admin.start_at'),
                'end_at' => trans('admin.end_at'),
                'start_offer_at' => trans('admin.start_offer_at'),
                'end_offer_at' => trans('admin.end_offer_at'),
                'price_offer' => trans('admin.price_offer'),
                'weight' => trans('admin.weight'),
                'weight_id' => trans('admin.weight_id'),
                'status' => trans('admin.status'),
                'reason' => trans('admin.reason'),
            ]);

        if (request()->has('mall')) {
            MallProduct::where('product_id', $id)->delete();
            foreach (request('mall') as $mall) {
                MallProduct::create([
                    'product_id' => $id,
                    'mall_id' => $mall,
                ]);
            }
        }
        if (request()->has('adv')) {
            Product::where('id', $id)->update(['adv' => 1]);
        } else {
            Product::where('id', $id)->update(['adv' => 0]);
        }

        if (request()->has('featured')) {
            Product::where('id', $id)->update(['featured' => 1]);
        } else {
            Product::where('id', $id)->update(['featured' => 0]);
        }

        if (request()->has('related')) {
            RelatedProduct::where('product_id', $id)->delete();
            foreach (request('related') as $related) {
                RelatedProduct::create([
                    'product_id' => $id,
                    'related_product' => $related,
                ]);
            }
        } else {
            RelatedProduct::where('product_id', $id)->delete();
        }
        if (request()->has('input_value') && request()->has('input_key')) {
            $i = 0;
            $other_data = '';
            OtherData::where('product_id', $id)->delete();
            foreach (request('input_key') as $key) {
                $data_value = !empty(request('input_value')[$i]) ? request('input_value')[$i] : '';
                OtherData::create([
                    'product_id' => $id,
                    'data_key' => $key,
                    'data_value' => $data_value,
                ]);
                $i++;
            }
            $data['other_data'] = rtrim($other_data, '|');
        }
        Product::where('id', $id)->update($data);
        return response(['status' => true, 'message' => trans('admin.updated_record')], 200);

    }


    public function copy_product($id)
    {
        if (request()->ajax()) {
            $releation_data = Product::find($id);
            $copy = Product::find($id)->toArray();
            unset($copy['id']);
            $create = Product::create($copy);
            if (!empty($copy['photo'])) {
                $ext = \File::extension($copy['photo']);
                $new_path = 'products/' . $create->id . '/' . (30) . '.' . $ext;
                \Storage::copy($copy['photo'], $new_path);
                $create->photo = $new_path;
                $create->save();
            }

            // Mall Product //
            foreach ($releation_data->mall_product()->get() as $mall) {
                MallProduct::create([
                    'product_id' => $create->id,
                    'mall_id' => $mall->mall_id,
                ]);
            }
            // Mall Product //

            // Other Data k=>v Product //
            foreach ($releation_data->other_data()->get() as $otherdata) {
                OtherData::create([
                    'product_id' => $create->id,
                    'data_key' => $otherdata->data_key,
                    'data_value' => $otherdata->data_value,
                ]);
            }
            // Other Data k=>v Product //

            foreach ($releation_data->files()->get() as $file) {
                $hashname = Str::random(30);
                $ext = \File::extension($file->full_file);
                $new_path = 'products/' . $create->id . '/' . $hashname . '.' . $ext;
                \Storage::copy($file->full_file, $new_path);
                $add = FileTbl::create([
                    'name' => $file->name,
                    'size' => $file->size,
                    'file' => $hashname,
                    'path' => 'products/' . $create->id,
                    'full_file' => 'products/' . $create->id . '/' . $hashname . '.' . $ext,
                    'mime_type' => $file->mime_type,
                    'file_type' => 'product',
                    'relation_id' => $create->id,
                ]);
            }

            return response([
                'status' => true,
                'message' => trans('admin.product_created'),
                'id' => $create->id,
            ], 200);
        } else {
            return redirect(aurl('/'));
        }
    }

    public function deleteProduct($id)
    {
        $products = Product::find($id);
        !empty($products->photo) ? Storage::delete($products->photo) : '';
        up()->delete_files($id);
        $products->delete();

    }

    public function destroy($id)
    {
        //return $id;
        $this->deleteProduct($id);
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('products'));
    }

    public function multi_delete()
    {
        if (is_array(request('item'))) {
            foreach (request('item') as $id) {
                $this->deleteProduct($id);
            }
        } else {
            $this->deleteProduct(request('item'));
        }
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('products'));
    }

    public function product_search()
    {
        if (request()->ajax()) {

            if (!empty(request('search')) && request()->has('search')) {

                $related_product = RelatedProduct::where('product_id', request('id'))
                    ->get(['related_product']);

                $products = Product::where('title', 'LIKE', '%' . request('search') . '%')
                    ->where('id', '!=', request('id'))
                    ->whereNotIn('id', $related_product)
                    ->limit(10)
                    ->orderBy('id', 'desc')
                    ->get();

                return response(['status' => true,
                    'result' => count($products) > 0 ? $products : '',
                    'count' => count($products),
                ], 200);
            }
        }
    }
}
