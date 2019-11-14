@extends('layouts.app')
@section('title')
Mahasiswa
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h1 class="card-title"></h1>
                    <div class="float-right">
                        <a href="{{route('mahasiswa.tambah')}}" class="btn btn-success btn-md">Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="mahasiswa" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @if(!empty($mahasiswa))
                        @foreach($mahasiswa as $mhs)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$mhs->nim}}</td>
                            <td>{{$mhs->nama}}</td>
                            <td>{{$mhs->alamat}}</td>
                            <td class="text-center">
                                <a href="{{url('#')}}" class="btn btn-md btn-primary">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <a href="{{url('#')}}" class="btn btn-md btn-warning">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="{{url('#')}}" class="btn btn-md btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection

@section('js')
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    $(function() {
        $('#mahasiswa').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": true,
            "lengthMenu": [
                [5, 10, 15],
                [5, 10, 15]
            ],
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "language": {
                "emptyTable": "Data tidak ditemukan."
            }
        });
    });
</script>
@endsection