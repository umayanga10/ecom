<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
  
    public function index()
    {
        $category = Category::get();
        return view('admin.category.index',compact('category'));
    }

    public function create()
    {
       
        return view('admin.category.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'category_slug' => 'required|unique:categories',
            'category_name' => 'required',
        ]);
        
            $category = new Category();

            $category->category_name = $request->input('category_name');
            $category->category_slug = $request->input('category_slug');
    
            $category->save();

            $request->session()->flash('message','Category Inserted');
            return redirect('admin/manage_category');
        
    }

    public function show(Category $category)
    {
        //
    }


    public function edit(Request $request, $id)
    {
        $category = Category::find($id);

        return view('admin.category.edit',compact('category'));
    }


    public function update(Request $request, $id)
    {
            $category = Category::find($id);

            $category->category_name = $request->input('category_name');
            $category->category_slug = $request->input('category_slug');
    
            $category->save();

            $request->session()->flash('message','Category Updated Successfully');
            return redirect('admin/category');
    }


    public function delete(Request $request, $id)
    {
        $category = Category::find($id);
        $category->delete();

        $request->session()->flash('message','Category Deleted Successfully');
        return redirect('admin/category');

    }

    public function status(Request $request, $status, $id)
    {
        $category = Category::find($id);
        $category->status = $status;
        $category->save();

        $request->session()->flash('message','Category Status has been Updated Successfully');
        return redirect('admin/category');

    }
}
