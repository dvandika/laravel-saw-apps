@extends('layouts.app')

@section('title')
Edit Nilai
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Edit Data</h3>
                </div>
            </div>
            <form role="form" action="{{ route('nilai.update', ['id' => Request::segment(3)]) }}" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10 offset-sm-1">
                            <!-- text input -->
                            @csrf
                            @if(!empty($mahasiswa))
                            <div class="form-group">
                                <label for="mahasiswa">Nama Mahasiswa</label>
                                <!-- <input type="hidden" name="mahasiswa_id" value="{{ $mahasiswa->id }}"> -->
                                <input type="text" class="form-control" value="{{ $mahasiswa->nama }}" readonly>
                            </div>
                            <div class="form-group">
                                @foreach($mahasiswa->nilai as $key => $value)
                                <?php $krit = $kriteria[$key]; $krit_err = "kriteria_id[$krit->id]" ?>
                                @if($krit->id == $value->kriteria_id)
                                <label for="{{$krit->kode}}">{{ $krit->nama }}</label>
                                <input type="hidden" name="id_nilai[{{ $value->id }}]" value="{{ $value->id }}">
                                <input type="text" class="form-control" name="{{$krit_err}}" value="{{ $value->nilai_alt }}">
                                @elseif(empty($krit))
                                <p>Fail</p>
                                @endif
                                @endforeach
                            </div>
                            @else
                            <div class="form-group text-center">
                                Data Tidak Ditemukan
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-sm-10 offset-sm-1">
                        @if(!empty($mahasiswa))
                        <button type="submit" class="btn btn-primary">Update</button>
                        @else
                        <a href="{{ route('nilai') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i>
                            Back
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection