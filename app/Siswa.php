<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Siswa extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'siswa';
    
    public $timestamps = false;

    protected $fillable = [
        'nama_siswa' , 'email' , 'password',
    ];


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function message()
    {
        $message = [
            'required' => ':attribute tidak boleh kosong',
            'min' => ':attribute harus berisi minimal :min karakter',
            'max' => ':attribute tidak boleh dari maksimal :max karakter',
            'email' => 'Email Tidak Valid',
            'confirmed' => ':attribute tidak sesuai',
            'same' => 'konfirmasi password harus sama dengan password',
            'unique' =>':attribute sudah tersedia'
        ];
        return $message;
    }
}
