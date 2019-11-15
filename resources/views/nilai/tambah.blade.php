@extends('layouts.app')

@section('title')
Tambah Nilai
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Tambah Data</h3>
                </div>
            </div>
            <form role="form" action="{{ route('nilai.simpan', ['id' => Request::segment(2)]) }}" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10 offset-sm-1">
                            <!-- text input -->
                            @csrf
                            @if(!empty($mahasiswa))
                            <div class="form-group">
                                <label for="mahasiswa">Nama Mahasiswa</label>
                                <input type="hidden" name="mahasiswa_id" value="{{ $mahasiswa->id }}">
                                <input type="text" class="form-control" value="{{ $mahasiswa->nama }}" readonly>
                            </div>
                            @foreach($master_kriteria as $kriteria)
                            <div class="form-group">
                                <label for="{{ $kriteria->kode }}">{{ $kriteria->nama }}</label>
                                <input type="text" class="form-control" name="{{ $kriteria->id }}" placeholder="Isi nilai">
                                @if ($errors->has($kriteria->kode))
                                <div class="text-danger">{{ $errors->first($kriteria->kode) }}</div>
                                @endif
                            </div>
                            @endforeach
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
                        <button type="submit" class="btn btn-primary">Submit</button>
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