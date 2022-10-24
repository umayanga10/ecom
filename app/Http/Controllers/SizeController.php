<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SizeController extends Controller
{
    public function index()
    {
        $size = Size::get();
        return view('admin.size.index',compact('size'));
    }

    public function create()
    {
       
        return view('admin.size.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'size' => 'required',
        ]);
        
            $size = new size();

            $size->size = $request->input('size');
            $size->save();

            $request->session()->flash('message','Size has been Successfully Inserted');
            return redirect('admin/size');
        
    }

    public function show(Category $category)
    {
        //
    }


    public function edit(Request $request, $id)
    {
        $size = Size::find($id);

        return view('admin.size.edit',compact('size'));
    }


    public function update(Request $request, $id)
    {
            $size = Size::find($id);

            $size->size = $request->input('size');
            $size->save();

            $request->session()->flash('message','Size Updated Successfully');
            return redirect('admin/size');
    }


    public function delete(Request $request, $id)
    {
        $size = Size::find($id);
        $size->delete();

        $request->session()->flash('message','Size Deleted Successfully');
        return redirect('admin/size');

    }

    public function status(Request $request, $status, $id)
    {
        $size = Size::find($id);
        $size->status = $status;
        $size->save();

        $request->session()->flash('message','Size Status has been Updated Successfully');
        return redirect('admin/size');

    }
}
