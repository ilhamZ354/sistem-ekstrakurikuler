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
                    <form action="{{ route('nilai.store')}}" method="POST">
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
                            <input type="hidden" name="siswa_id" value="{{ auth()->guard('siswas')->user()->id }}">
                            <button type="submit" class="btn btn-info">Cari</button>
                        </div>
                        </form>
                        </div>
                    </div>
                    <div class="table-responsive" style="max-height: 520px">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama kegiatan</th>
                                    <th scope="col">Pertemuan</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col" class="marginRight:0">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @if(isset($dataJoin))
                                @foreach($dataJoin as $key=> $value)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $value->nama_kegiatan}}</td>
                                        <td>{{ $value->pertemuan }}</td>
                                        <td>{{ $value->nilai }}</td>
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