@extends('layouts.app')
@section('title')
Kriteria
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
                        <a href="{{route('kriteria.tambah')}}" class="btn btn-success btn-md">Tambah Data</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table id="kriteria" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Bobot</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @if(!empty($kriteria))
                        @foreach($kriteria as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->kode}}</td>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->jenis}}</td>
                            <td>{{$data->bobot}}</td>
                            <td class="text-center">
                                <a href="{{ url('#') }}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
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
        $('#kriteria').DataTable({
            "paging": true,
            "pageLength": 5,
            "lengthChange": true,
            "lengthMenu": [[5, 10, 15], [5, 10, 15]],
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "language": {
                "emptyTable": "Data tidak ditemukan."
            }
        });
    });
</script>
@endsection