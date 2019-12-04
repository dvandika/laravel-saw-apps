@extends('layouts.app')
@section('title')
Data Nilai
@endsection

@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Data -->
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Nilai</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="data" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    @foreach($kriteria as $krit)
                                    <th class="text-center">{{$krit->kode}}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($mahasiswa))
                                @foreach($mahasiswa as $data)
                                <tr>
                                    <td>
                                        {{$data->nama}}
                                    </td>
                                    @foreach($data->nilai as $nilai)
                                    <td>{{ $nilai->nilai_alt }}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="{{(count($kriteria)+1)}}" class="text-center">Data tidak ditemukan</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Normalisasi -->
            <div class="card">
                <div class="card-header">
                    <h3 class="float-left">Normalisasi</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="normalisasi" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Kode</th>
                                    <?php $bobot = [] ?>
                                    @foreach($kriteria as $krit)
                                    <?php $bobot[$krit->id] = $krit->bobot ?>
                                    <th class="text-center">{{$krit->kode}} [{{ $krit->bobot }}]</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($mahasiswa))
                                <?php $ranking = []; ?>
                                @foreach($mahasiswa as $data)
                                <tr>
                                    <td>[{{$data->nim}}] - {{ $data->nama }}</td>
                                    <?php $total = 0; ?>
                                    @foreach($data->nilai as $nilai)
                                    @if($nilai->kriteria->jenis == 'cost')
                                    <?php $normalisasi = number_format(($kode_krit[$nilai->kriteria->id] / $nilai->nilai_alt), 2); ?>
                                    @elseif($nilai->kriteria->jenis == 'benefit')
                                    <?php $normalisasi = number_format(($nilai->nilai_alt / $kode_krit[$nilai->kriteria->id]), 2); ?>
                                    @endif
                                    <?php $total = number_format($total + ($bobot[$nilai->kriteria->id] * $normalisasi), 2); ?>
                                    <td>{{$normalisasi}}
                                    </td>
                                    @endforeach
                                    <?php $ranking[] = [
                                        'nim'  => $data->nim,
                                        'nama'  => $data->nama,
                                        'total' => $total
                                    ]; ?>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="{{(count($kriteria)+1)}}" class="text-center">Data tidak ditemukan</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Ranking -->
            <div class="card">
                <div class="card-header">
                    <h3>Ranking</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="ranking" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Mahasiswa</th>
                                    <th>Total</th>
                                    <th>Ranking</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    // var_dump($ranking);
                                usort($ranking, function ($a, $b) {
                                    return strcmp($a['total'], $b['total']);
                                    // return $a['total'] <=> $b['total'];
                                });
                                $ranking = array_reverse($ranking);
                                // print_r($ranking[0]);
                                // rsort($ranking);
                                // asort($ranking);
                                // array_revers
                                $a = 1;
                                ?>
                                @foreach($ranking as $t)
                                <tr>
                                    <td>[{{$t['nim']}}] - {{ $t['nama'] }}</td>
                                    <td>{{$t['total']}}</td>
                                    <td>{{$a++}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <!-- Ranking -->
            <div class="card">
                <div class="card-header">
                    <h3>Kesimpulan</h3>
                </div>
                <div class="card-body">
                    <h4>Maka, didapat dengan peringkat nomor 1 adalah alternatif dengan nama <strong>{{ current($ranking)['nama'] }}</strong></h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
<script>
    $(function() {
        $('#data').DataTable({
            "paging": false,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": true,
            "language": {
                "emptyTable": "Data tidak ditemukan."
            }
        });
        $('#normalisasi').DataTable({
            "paging": false,
            "pageLength": 5,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": true,
            "language": {
                "emptyTable": "Data tidak ditemukan."
            }
        });
        $('#ranking').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "aaSorting": [[2, 'asc']]
            "info": false,
            "autoWidth": true,
            "language": {
                "emptyTable": "Data tidak ditemukan."
            }
        });
    });
</script>
@endsection