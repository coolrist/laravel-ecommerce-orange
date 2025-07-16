<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lib\StrFun;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        return view('admin.content.categories', ['categories' => Category::paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin.content.addcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $this->validate($request, ['name' => 'required|unique:product_categories']);

        $category = new Category();
        $category->name = StrFun::sanitize($request->name);
        $category->save();

        return back()->with('success_status', __('admin.addcategory.success_status', ['Name' => $category->name]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category) {
        return view("admin.content.editcategory", ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category) {
        $this->validate($request, ['name' => 'required|unique:product_categories']);

        $category->name = StrFun::sanitize($request->name);
        $category->update();

        return redirect()->route('categories.index')->with('success_status', __('admin.categories.success_status.update', ['Name' => $category->name]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category) {
        $category->delete();
        return back()->with('success_status', __('admin.categories.success_status.delete', ['Name' => $category->name]));
    }
}
