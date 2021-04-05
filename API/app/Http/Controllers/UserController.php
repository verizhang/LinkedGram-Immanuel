<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        
        $user = User::with('profile')->where('email',$request->email)->first();

        return response()->json(compact('user','token'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'tahun_masuk' => 'required|string',
            'tahun_lulus' => 'required|string',
            'jurusan' => 'required|string',
            'tanggal_lahir' => 'required|string',
            'alamat' => 'required|string',
            'no_telepon' => 'required|string',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $path = public_path()."/profile";
        $file = $request->file('gambar');
        $file->move($path, $file->getClientOriginalName());

        $user = new User();
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->tahun_masuk = $request->tahun_masuk;
        $profile->tahun_lulus = $request->tahun_lulus;
        $profile->jurusan = $request->jurusan;
        $profile->tanggal_lahir = $request->tanggal_lahir;
        $profile->alamat = $request->alamat;
        $profile->no_telepon = $request->no_telepon;
        $profile->gambar = 'profile/'.$file->getClientOriginalName();
        $profile->save();
        
        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }

    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }
}