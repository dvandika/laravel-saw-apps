@extends('layouts.app')

@section('title')
Tambah Kriteria
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
            <form role="form" action="{{ route('kriteria.simpan')}}" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10 offset-sm-1">
                            <!-- text input -->
                            @csrf
                            <div class="form-group">
                                <label for="nim">Kode <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ old('kode')}}" name="kode" placeholder="Kode Kriteria">
                                @if ($errors->has('kode'))
                                <div class="text-danger">{{ ucfirst(trans($errors->first('kode'))) }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ old('nama')}}" name="nama" placeholder="Nama Kriteria">
                                @if ($errors->has('nama'))
                                <div class="text-danger">{{ ucfirst(trans($errors->first('nama'))) }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis <span class="text-danger">*</span></label>
                                <select name="jenis" class="form-control">
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="cost">Cost</option>
                                    <option value="benefit">Benefit</option>
                                </select>
                                @if ($errors->has('jenis'))
                                <div class="text-danger">{{ ucfirst(trans($errors->first('jenis'))) }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="bobot">Bobot <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ old('bobot')}}" name="bobot" placeholder="Bobot Kriteria">
                                @if ($errors->has('bobot'))
                                <div class="text-danger">{{ ucfirst(trans($errors->first('bobot'))) }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="col-sm-10 offset-sm-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection