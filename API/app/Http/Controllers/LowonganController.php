<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use App\Models\Pelamar;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $lowongan = User::with(['lowongan','lowongan.pelamar','lowongan.pelamar.user'])->where('id',$user_id)->get();
        return response()->json($lowongan);
    }

    public function all()
    {
        $lowongan = Lowongan::with(['user','pelamar','pelamar.user'])->get();
        return response()->json($lowongan);
    }

    public function lamar(Request $request)
    {
        $pelamar = new Pelamar();
        $pelamar->lowongan_id = $request->lowongan_id;
        $pelamar->user_id = $request->user_id;
        $pelamar->save();
        
        return response()->json([
            "message"=>"success"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            "user_id"=>"required",
            "judul_lowongan"=>"required|min:5",
            "deskripsi_lowongan"=>"required|min:5",
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(),400);
        }

        $path = public_path()."/lowongan";
        $file = $request->file('gambar');
        $file->move($path, $file->getClientOriginalName());

        $lowongan = new Lowongan();
        $lowongan->user_id = $request->user_id;
        $lowongan->judul_lowongan = $request->judul_lowongan;
        $lowongan->deskripsi_lowongan = $request->deskripsi_lowongan;
        $lowongan->gambar = 'lowongan/'.$file->getClientOriginalName();
        $lowongan->save();

        return response()->json([
            "message"=>"success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function show(Lowongan $lowongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lowongan $lowongan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lowongan $lowongan)
    {
        //
    }
}
