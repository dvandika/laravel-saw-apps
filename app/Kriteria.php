<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    //
    protected $table = 'kriteria';
    protected $fillable = ['kode', 'nama', 'jenis', 'bobot'];
    protected $hidden = ['created_at', 'hidden_at'];

    public function nilai() {
        return $this->hasMany(\App\Nilai::class);
    }

    public function crip() {
        return $this->hasMany(\App\Nilai::class);   
    }
}
