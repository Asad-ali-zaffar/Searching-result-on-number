<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url=url('/add_new_certificate');
        return view('admin.add_certificate')->with(compact('url'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
               'frist_name'=>'required',
               'date'=>'required',
               'cert_no'=>'required|unique:certificates,cer_no,id,cer_id'
            //    required|unique:users,email,'.$this->id . ',user_id';
            ]
        );
        $Certificate= new Certificate;
        $Certificate->cer_name=$request['frist_name'];
        $Certificate->cer_date=$request['date'];
        $Certificate->cer_no=$request['cert_no'];
        $Certificate->save();
        return redirect('all_certificate');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */

    public function user_side_view(Request $request,$id=null)
    {

        $search = $request['search'] ?? "";

        if($search != "")
        {
            // echo $search;
            // die;
            $data=Certificate::where('cer_no',$search)->get();
            $status=Certificate::where('cer_no',$search)->count();

        }
        else{
            $data=array();
            $status=2;
            // $id="noDisplay";
        }
        return view('admin.user_side')->with(compact('data','status'));
    }
    public function show(Certificate $certificate)
    {
        $Certificate=Certificate::paginate(100);
        return view('admin.certificateview')->with(compact('Certificate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Certificate=Certificate::where('cer_id',$id)->get();
        // if(is_null($Certificate))
        // {
        //     return redirect()->back();
        // }
        // else
        // {
            $titel="Update Certificate";
        $url=url('/update_certificate'."/".$id);
        return view('admin.update')->with(compact('Certificate','url','titel'));
    // }
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // $request->validate(
        //     [
        //        'frist_name'=>'required',
        //        'date'=>'required',
        //        'cert_no'=>'required|unique:certificates,cer_no,id,cer_id'
        //     ]

        // );
        Certificate::where('cer_id',$id)
        ->update([
                'cer_name'=>$request->input('frist_name'),
                'cer_date'=>$request->input('date'),
                'cer_no'=>$request->input('cert_no')
            ]);
            return redirect('all_certificate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificate  $certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificate $certificate)
    {
        //
    }
}
