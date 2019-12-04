<?php

namespace App\Http\Controllers;

use App\Nilai;
use App\Mahasiswa;
use App\Kriteria;

use Illuminate\Http\Request;
use DB;
use stdClass;

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
        $data = $request->except('_token');

        $mahasiswa_id = $data['mahasiswa_id'];
        $kriteria_id = $data['kriteria_id'];
        foreach ($kriteria_id as $key => $value) {
            echo $key . ' - ' . $value . '<br>';
            $objData = new stdClass();
            $objData->mahasiswa_id = $id;
            $objData->kriteria_id = $key;
            $objData->nilai = $value;
            $objArray[] = $objData;
        }
        foreach ($objArray as $data) {
            Nilai::create([
                'mahasiswa_id' => $data->mahasiswa_id,
                'kriteria_id' => $data->kriteria_id,
                'nilai_alt' => $data->nilai
            ]);
        }
        // $mahasiswa = Mahasiswa::find($id);
        // var_dump($mahasiswa);exit;
        // $mahasiswa->crip()->sync($data);
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
    public function edit($id)
    {
        //
        // $mahasiswa = Mahasiswa::find($id); 
        // $nilai = DB::table('nilai')
        //     ->join('kriteria', 'kriteria.id', '=', 'nilai.kriteria_id')
        //     ->select('kriteria.id AS id_kriteria', 'nilai.id AS id_nilai', 'kriteria.nama', 'kriteria.kode', 'nilai.nilai_alt')
        //     ->where('nilai.mahasiswa_id', $id)
        //     ->get();
        $mahasiswa = Mahasiswa::find($id);
        // echo '<br>$mahasiswa: ' . json_encode($mahasiswa);
        // echo '<br>$mahasiswa->nilai: ' . json_encode($mahasiswa->nilai);exit;
        // $nilai = Kriteria::all()->nilai();
        $kriteria = Kriteria::all();
        // foreach ($mahasiswa )
        return view('nilai.edit', [
            'kriteria' => $kriteria,
            'mahasiswa' => $mahasiswa,
            // 'nilai' => $nilai
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->except('_token');
        $nilai_id = $data['id_nilai'];
        $kriteria_id = $data['kriteria_id'];
        foreach ($nilai_id as $nilai) {
            $nilaiData = new stdClass();
            $nilaiData->id = $nilai;
            $nilaiArray[] = $nilaiData;
        }
        // echo json_encode($nilaiArray);
        // echo '<br>';
        $i = 0;
        foreach ($kriteria_id as $key => $value) {
            $objData = new stdClass();
            $objData->id_nilai = $nilaiArray[$i]->id;
            $objData->mahasiswa_id = $id;
            $objData->kriteria_id = $key;
            $objData->nilai = $value;
            $objArray[] = $objData;
            $i++;
        }
        // echo json_encode($objArray);exit;
        foreach($objArray as $data) {
            $save = Nilai::find($data->id_nilai);
            $save->nilai_alt = $data->nilai;
            $save->save();
        }        
        return redirect(route('nilai'));
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
