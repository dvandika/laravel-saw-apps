@extends('layouts.app')
@section('title')
Data Nilai
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
                    <h1 class="card-title">Nilai Setiap Mahasiswa</h1>
                </div>
            </div>
            <div class="card-body">
                <table id="mahasiswa" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th width="20vh">No</th>
                            <th width="75vh">NIM</th>
                            <th>Nama</th>
                            @foreach($kriteria as $krit)
                            <th>{{$krit->nama}}</th>
                            @endforeach
                            <th width="100vh">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @if(!empty($mahasiswa))
                        {{-- variable $mahasiswa berisi nilai dari setiap kriteria per mahasiswa --}}
                        @foreach($mahasiswa as $mhs)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$mhs->nim}}</td>
                            <td>{{$mhs->nama}}</td>
                            @if(count($mhs->nilai) == 0)
                            @foreach($kriteria as $krit)
                            <td><i>Tidak ada data</i></td>
                            @endforeach
                            @endif
                            @foreach($mhs->nilai as $nilai)
                            <td>{{$nilai->nilai_alt}}</td>
                            @endforeach
                            <td class="text-center">
                                @if(count($mhs->nilai) == 0)
                                <a href="{{ route('nilai.tambah',['id' => $mhs->id]) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-plus"></i>
                                </a>
                                @else
                                <a href="{{ route('nilai.edit', ['id' => $mhs->id]) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-pen"></i>
                                </a>
                                @endif
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
        var t = $('#mahasiswa').DataTable({
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
        t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
    });
</script>
@endsection