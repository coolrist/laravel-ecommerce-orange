<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lib\StrFun;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

/**
 * Summary of ProductController
 */
class ProductController extends Controller {

    private string $noimagePath = "public/empty/noimage.jpg";

    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view("admin.content.products", ['products' => Product::paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $categories = Category::orderBy('name')->pluck('name', 'id');
        return $categories->isEmpty() ?
            redirect()->route('categories.create')->with('fail_status', __('admin.addcategory.fail_status'))
            : view("admin.content.addproduct", ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $imageValidation = 'image|nullable|max:9999';
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|decimal:0,4|min:0',
            'category' => 'required',
            'color' => 'required',
            'special_offer' => 'nullable|decimal:0,4|min:0',
            'image1' => $imageValidation,
            'image2' => $imageValidation,
            'image3' => $imageValidation,
            'image4' => $imageValidation
        ]);

        $category = Category::find($request->category);
        if (!$category) {
            return back()->with('fail_status', __('admin.addproduct.fail_status'))->withInput();
        }

        for ($i = 1; $i <= 4; $i++) {
            if ($request->hasFile("image$i")) {
                // 1: get just file extension
                $extension = $request->file("image$i")->getClientOriginalExtension();
                // 2: file name to store
                $fileNameToStore = time() . "_$i.$extension";

                // upload image
                $store_path = 'public/' . Session::get('admin')->id . '/product-images';

                $path[$i] = $request->file("image$i")->storeAs($store_path, $fileNameToStore);
            } else {
                $path[$i] = $this->noimagePath;
            }
        }

        $product = new Product();

        $product->category_id = $category->id;
        $product->name = StrFun::sanitize($request->name);
        $product->description = StrFun::sanitize($request->description);
        $product->image1 = $path[1];
        $product->image2 = $path[2];
        $product->image3 = $path[3];
        $product->image4 = $path[4];
        $product->price = $request->price;
        $product->special_offer = $request->special_offer ? $request->special_offer : 0;
        $product->color = StrFun::sanitize($request->color);

        $product->save();

        return back()->with('success_status', __('admin.addproduct.success_status', ['Name' => $product->name]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) {
        return view("admin.content.editproduct", ['product' => $product,
            'categories' => Category::all()->pluck('name', 'id')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product) {
        $imageValidation = 'image|nullable|max:9999';
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|decimal:0,4|min:0',
            'category' => 'required',
            'color' => 'required',
            'special_offer' => 'nullable|decimal:0,4|min:0',
            'image1' => $imageValidation,
            'image2' => $imageValidation,
            'image3' => $imageValidation,
            'image4' => $imageValidation
        ]);

        $category = Category::find($request->category);
        if (!$category) {
            return back()->with('fail_status', __('admin.addproduct.fail_status'))->withInput();
        }

        for ($i = 1; $i <= 4; $i++) {
            if ($request->hasFile("image$i")) {
                // 1: get just file extension
                $extension = $request->file("image$i")->getClientOriginalExtension();
                // 2: file name to store
                $fileNameToStore = "image{$i}_" . time() . ".$extension";

                // upload image
                $store_path = 'public/' . Session::get('admin')->id . '/product-images';

                $path = $request->file("image$i")->storeAs($store_path, $fileNameToStore);

                switch ($i) {
                    case 1:
                        if ($product->image1 != $this->noimagePath) {
                            Storage::delete($product->image1);
                        }
                        $product->image1 = $path;
                        break;
                    case 2:
                        if ($product->image2 != $this->noimagePath) {
                            Storage::delete($product->image2);
                        }
                        $product->image2 = $path;
                        break;
                    case 3:
                        if ($product->image3 != $this->noimagePath) {
                            Storage::delete($product->image3);
                        }
                        $product->image3 = $path;
                        break;
                    default:
                        if ($product->image4 != $this->noimagePath) {
                            Storage::delete($product->image4);
                        }
                        $product->image4 = $path;
                        break;
                }
            }
        }

        $product->category_id = $category->id;
        $product->name = StrFun::sanitize($request->name);
        $product->description = StrFun::sanitize($request->description);
        $product->price = $request->price;
        $product->special_offer = $request->special_offer ? $request->special_offer : 0;
        $product->color = StrFun::sanitize($request->color);

        $product->update();

        return redirect()->route('products')->with('success_status', __('admin.products.success_status.update', ['Name' => $product->name]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) {
        if ($product->image1 != $this->noimagePath) {
            Storage::delete($product->image1);
        }
        if ($product->image2 != $this->noimagePath) {
            Storage::delete($product->image2);
        }
        if ($product->image3 != $this->noimagePath) {
            Storage::delete($product->image3);
        }
        if ($product->image4 != $this->noimagePath) {
            Storage::delete($product->image4);
        }

        $product->delete();

        return back()->with('success_status', __('admin.products.success_status.update', ['Name' => $product->name]));
    }
}
