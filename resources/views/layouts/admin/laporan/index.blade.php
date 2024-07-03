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
                    <h3 class="mb-0">Data Laporan</h3>
                </div>
                    <form action="{{ route('laporankegiatan.store')}}" method="POST">
                        @csrf
                        <div class="col text-right">
                            <select name="bulan" class="form-control form-control-md text-md" style="display: inline-block; width: auto;">
                            <option value="{{ isset($reqData->bulan) ? $reqData->bulan : '' }}" selected>Bulan {{ isset($reqData->bulan) ? $reqData->bulan : '' }}</option>
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                            </select>
                            <button type="submit" class="btn btn-info">Cari</button>
                        </div>
                        </form>
                        @if(isset($data))
                        <form action="{{ route('cetak.pdf') }}" method="GET">
                                @csrf
                                <input type="hidden" name="bulan" value="{{ $reqData->bulan }}">
                                <button type="submit" class="btn btn-success"><i class="fas fa-print"></i></button>
                        </form>
                        @endif
                        </div>
                    </div>
                    <div class="table-responsive" style="max-height: 520px">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama kegiatan</th>
                                    <th scope="col">Jumlah pertemuan</th>
                                    <th scope="col">Pembimbing</th>
                                    <th scope="col">Tempat kegiatan</th>
                                    <th scope="col">Jumlah peserta</th>
                                    <th scope="col">Total kehadiran</th>
                                    <th scope="col">Rata-rata nilai</th>
                                    <th scope="col" class="marginRight:0">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @if(isset($data))
                                @foreach($data as $key=> $value)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $value->kegiatan_nama }}</td>
                                        <td>{{ $value->total_pertemuan }}</td>
                                        <td>{{ $value->pembimbing }}</td>
                                        <td>{{ $value->tempat }}</td>
                                        <td>{{ $value->total_peserta }}</td>
                                        <td>{{ $value->total_hadir }}</td>
                                        <td>{{ number_format($value->average_nilai, 2) }}</td>
                                    </tr>
                                @endforeach
                                @endif
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