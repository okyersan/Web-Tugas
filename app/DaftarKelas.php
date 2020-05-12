<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarKelas extends Model
{
    protected $table = 'daftar_kelas';
    
    protected $timestamps = false;

    protected $primaryKey = 'id_siswa';
}
