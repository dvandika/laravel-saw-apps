<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    //
    protected $table = 'mahasiswa';
    protected $fillable = ['nim', 'nama', 'alamat'];
    protected $hidden = ['created_at', 'updated_at'];

    public function nilai()
    {
        return $this->hasMany(\App\Nilai::class);
        // return $this->hasMany(\App\Nilai::class,'nilai','mahasiswa_id','kriteria_id', 'nilai');
    }

    public function crip()
    {
        return $this->belongsToMany(\App\Nilai::class, 'nilai', 'mahasiswa_id', 'kriteria_id');
    }
}
