<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CuponController extends Controller
{
    public function index()
    {
        $cupon = Cupon::get();
        return view('admin.cupon.index',compact('cupon'));
    }

    public function create()
    {
       
        return view('admin.cupon.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:category|max:255',
            'code' => 'required',
            'value' => 'required',
        ]);
        
            $cupon = new Cupon();

            $cupon->title = $request->input('title');
            $cupon->code = $request->input('code');
            $cupon->value = $request->input('value');
    
            $cupon->save();

            $request->session()->flash('message','Cupon has been successfully Inserted');
            return redirect('admin/cupon');
        
    }

    public function show(Category $category)
    {
        //
    }


    public function edit(Request $request, $id)
    {
        $cupon = Cupon::find($id);

        return view('admin.cupon.edit',compact('cupon'));
    }


    public function update(Request $request, $id)
    {
            $cupon = cupon::find($id);

            $cupon->title = $request->input('title');
            $cupon->code = $request->input('code');
            $cupon->value = $request->input('value');
    
            $cupon->save();

            $request->session()->flash('message','Cupon has been successflully Updated');
            return redirect('admin/cupon');
    }


    public function delete(Request $request, $id)
    {
        $cupon = cupon::find($id);
        $cupon->delete();

        $request->session()->flash('message','Cupon has been Deleted Successfully');
        return redirect('admin/cupon');

    }
}
