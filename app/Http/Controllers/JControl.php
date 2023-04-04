<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Validator;
use Illuminate\Support\facades\DB;
use App\Models\JModel;

class JControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getjurusan()
    {
        $dt_jurusan=jurusan::get();
        return response()->json ($dt_jurusan);
    }

    public function getjurusanid($id)
    {
        $dt_jurusan=jurusan::where('id_jurusan','=',$id)->get();
        return response()->json($dt_jurusan);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $validate = Validator::make($req->all(),[
            'namajurusan'=>'required',
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $create = JModel::create([
            'namajurusan'=>$req->namajurusan,
        ]);
        if($create){
            return response()->json(['status'=>true, 'message'=>'Sukses menambah data jurusan.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal menambah data jurusan.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $validate = Validator::make($req->all(),[
            'namajurusan'=>'required',
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $update = JModel::where('id_jurusan', $id)->update([
            'namajurusan'=>$req->namajurusan,
        ]);
        if($update){
            return response()->json(['status'=>true, 'message'=>'Sukses mengubah data jurusan.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal mengubah data jurusan.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = JModel::where('id_jurusan', $id)->delete();
            if($destroy){
                return response()->json(['status'=>true, 'message' => 'Sukses menghapus data jurusan.']);
            }else{
                return response()->json(['status'=>false, 'message' => 'Gagal menghapus data jurusanbuku.']);
            }
    }
}