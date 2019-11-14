@extends('layouts.app')

@section('title')
Tambah Mahasiswa
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
            <form role="form" action="{{ route('mahasiswa.simpan')}}" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10 offset-sm-1">
                            <!-- text input -->
                            @csrf
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" name="nim" placeholder="Nomor Induk Mahasiswa">
                                @if ($errors->has('nim'))
                                <div class="text-danger">{{ $errors->first('nim') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nim">Nama</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                                @if ($errors->has('nama'))
                                <div class="text-danger">{{ $errors->first('nama') }}</div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="nim">Alamat</label>
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat Lengkap"></textarea>
                                @if ($errors->has('alamat'))
                                <div class="text-danger">{{ $errors->first('alamat') }}</div>
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