<?php

namespace App\Http\Controllers;

use App\Models\Aktifitas;
use App\Models\User;

use Illuminate\Http\Request;

use Validator;

class AktifitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        $aktifitas = User::with(array('profile','aktifitas'=> function($query){
                $query->orderBy('id','desc');
            }))->where('id', $user_id)->get();

        return response()->json($aktifitas);
    }

    public function all()
    {
        $aktifitas = Aktifitas::with('user')->orderBy('id','desc')->get();
        return response()->json($aktifitas);
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
        $validator = Validator::make($request->all(),[
            "user_id"=>"required",
            "judul_aktifitas"=>"required|string|min:5",
            "deskripsi_aktifitas"=>"required|string",
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $path = public_path()."/aktifitas";
        $file = $request->file('gambar');
        $file->move($path, $file->getClientOriginalName());

        $aktifitas = new Aktifitas();
        $aktifitas->user_id = $request->user_id;
        $aktifitas->judul_aktifitas = $request->judul_aktifitas;
        $aktifitas->deskripsi_aktifitas = $request->deskripsi_aktifitas;
        $aktifitas->gambar = 'aktifitas/'.$file->getClientOriginalName();
        $aktifitas->save();

        return response()->json([
            "message"=>"success"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aktifitas  $aktifitas
     * @return \Illuminate\Http\Response
     */
    public function show(Aktifitas $aktifitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aktifitas  $aktifitas
     * @return \Illuminate\Http\Response
     */
    public function edit(Aktifitas $aktifitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aktifitas  $aktifitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aktifitas $aktifitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aktifitas  $aktifitas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aktifitas $aktifitas)
    {
        //
    }
}
