@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')


    <div class="container-fluid mt--8">
    <div class="col">
            <div class="col">
            <div class="card shadow">
            <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Data Laporan Siswa Anda</h3>
                </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="max-height: 520px;">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Pertemuan</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col" class="marginRight:0">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="list">
                            @foreach($data as $key => $value)
                                @php
                                    $isHadir = $value->isHadir === 1 ? 'Hadir' : 'Tidak Hadir';
                                @endphp
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $value->kegiatan_nama }}</td>
                                        <td>{{ $value->bulan }}</td>
                                        <td>Pertemuan {{ $value->pertemuan }}</td>
                                        <td>{{ $isHadir }}</td>
                                        <td>{{ $value->nilai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>
        </div>
    @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush