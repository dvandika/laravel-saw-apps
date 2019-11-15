<?php

namespace App\Http\Controllers;

use App\Nilai;
use App\Mahasiswa;
use App\Kriteria;

use Illuminate\Http\Request;
use DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $mahasiswa = DB::table('nilai n, mahasiswa m')
        //     ->select('nilai')
        //     ->get();
        $mahasiswa = Mahasiswa::all();
        $kriteria = Kriteria::all();
        return view('nilai.index', [
            'mahasiswa' => $mahasiswa,
            'kriteria' => $kriteria
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $mahasiswa = Mahasiswa::find($id);
        $kriteria = Kriteria::all();
        return view('nilai.tambah', [
            'master_kriteria' => $kriteria,
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $data = array_values($request->except('_token'));
        // var_dump($data);
        $mahasiswa = Mahasiswa::find($id);
        // var_dump($mahasiswa);exit;
        $mahasiswa->crip()->sync($data);

        return redirect(route('nilai'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
