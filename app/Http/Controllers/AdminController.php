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
         session()->forget('ADMIN_LOGIN');
        $url=url('admin_auth');
       return view('admin.auth_login')->with(compact('url'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deshbord()
    {


        return view('admin.indexAdmin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_auth(Request $request)

    {
        $request->validate(
            [
               'email'=>'required',
            //    same:admins,email,id,admin_name,|same:admins,password,id,admin_password
               'password'=>'required',
            ]
        );
        $email=$request->input('email');
        $password=$request->input('password');
        $Admin=Admin::where(['admin_name'=>$email,'admin_password'=>$password])->count();
        
        if($Admin>0)
        {
            $request->session()->put(['ADMIN_LOGIN'=>$email]);
            $request->session()->put(['ADMIN_password'=>$password]);
            return redirect('/deshbord');
        }
        else
        {
            $request->session()->flush('error','Please enter valid login detail');
            return redirect()->back();
        }
    }
}
