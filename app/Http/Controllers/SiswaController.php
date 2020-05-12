<?php

namespace App\Http\Controllers;

use App\Siswa;
use Illuminate\Http\Request;
use App\Libraries\SendResponse;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function registrasi(Request $request)
    {
        $siswa = New Siswa;
        $msg = $siswa::message();
        $response = array('response' => ''  , 'success' => false);
        $validasi = Validator::make($request->all(),[
            'nama_siswa' => 'required',
            'email' => 'required|email|unique:siswa,email',
            'password' => 'required_with:konfirmasi_password|same:konfirmasi_password|min:8',
            'konfirmasi_password' => 'min:8'
        ],$msg);

        if ($validasi->fails()) {
            return response()->json(['error' => $validasi->errors()] , 401);
        }else{
            $siswa->nama_siswa = $request->nama_siswa;
            $siswa->email = $request->email;
            $siswa->password = Hash::make($request->password);
            $siswa->save();
            return SendResponse::data($siswa);
        }
    }

    public function login(Request $request)
    {

        $siswa = new Siswa;
        $msg = $siswa::message();
        $validasi = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required|min:8',
        ],$msg);

        if ($validasi->fails()) {
            return response()->json(['error' => $validasi->errors()] , 401);
        }
        else{
            $input = $request->only('email' , 'password');
            try{
                if(! $token = auth('siswa')->attempt($input)){
                    $msg = 'invalid_credentials';
                    return SendResponse::error($msg);
                }
            }catch(JWTException $e){
                $msg = 'could_not_create_token';
                return SendResponse::error($msg);
            }
            $data = compact('token');
            return SendResponse::data($data);
        }
    }

    
}