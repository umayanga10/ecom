<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

 
    public function auth(Request $request)
    {
        $email = $request->post('email');
        $password = $request->post('password');

        $result = Admin::where('email',$email)->where('password',$password)->get();

        if (isset($result['0']->id)) {
           $request->session()->put('ADMIN_LOGIN',true);
           $request->session()->put('ADMIN_ID',$result['0']->id);
           return redirect('admin/dashboard');
        }else{
            $request->session()->flash('error','Pleace Enter Valid Details');
            return redirect('admin');
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
 
}
