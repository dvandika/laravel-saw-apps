<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Kriteria;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        $mahasiswa = Mahasiswa::all();
        $kode_krit = [];
        foreach ($kriteria as $krit)
        {
            $kode_krit[$krit->id] = [];
            foreach($mahasiswa AS $mhs)
            {
                foreach($mhs->nilai as $nilai)
                {
                    if ($nilai->kriteria->id == $krit->id)
                    {
                        $kode_krit[$krit->id][] = $nilai->nilai_alt;
                    }
                    // echo json_encode(max($nilai->nilai_alt));
                }
            }
            
            if ($krit->jenis == 'cost')
            {
                $kode_krit[$krit->id] = min($kode_krit[$krit->id]);
            } 
            elseif ($krit->jenis == 'benefit')
            {
                $kode_krit[$krit->id] = max($kode_krit[$krit->id]);
            }
        }
        // echo json_encode($kode_krit);exit;

        // var_dump($kode_krt);
        return view('perhitungan.index',[
            'kriteria'      => $kriteria,
            'mahasiswa'    => $mahasiswa,
            'kode_krit'     => $kode_krit
        ]);
    }
}
