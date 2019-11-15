<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    //
    protected $table = 'nilai';
    protected $fillable = ['mahasiswa_id', 'kriteria_id', 'nilai_alt'];
    protected $hidden = ['created_at', 'updated_at'];

    public function kriteria()
    {
        return $this->belongsTo(\App\Kriteria::class, 'kriteria_id');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(\App\Mahasiswa::class, 'mahasiswa_id');
    }
}