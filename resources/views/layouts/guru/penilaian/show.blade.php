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
                                <h3 class="mb-0">Data nilai siswa {{ $keg->nama }}</h3>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('penilaian.store') }}" method="POST">
                    @csrf
                        <div class="col ml-2">
                        <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="select-bulan">Bulan</label>
                                                <select class="form-control" id="select-bulan" name="bulan">
                                                <option value="{{ isset($dataReq->bulan) ? $dataReq->bulan : '' }}" selected>{{ isset($dataReq->bulan) ? $dataReq->bulan : 'Bulan' }}</option>
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
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="select-pertemuan">Pertemuan Ke</label>
                                                <select class="form-control" id="select-pertemuan" name="pertemuan">
                                                <option value="{{ isset($dataReq->pertemuan) ? $dataReq->pertemuan : '' }}" selected>Pertemuan {{ isset($dataReq->pertemuan) ? $dataReq->pertemuan : '' }}</option>
                                                    <option value="1">Pertemuan 1</option>
                                                    <option value="2">Pertemuan 2</option>
                                                    <option value="3">Pertemuan 3</option>
                                                    <option value="4">Pertemuan 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" name="kegiatan_id" value="{{ $id }}">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="invisible">Submit</label>
                                                @if(isset($dataReq))
                                                <button type="btn" class="btn btn-info btn-block " disabled>Cari data</button>
                                                @else
                                                    <button type="btn" class="btn btn-info btn-block ">Cari data</button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                            </div>                        
                        @if(isset($data))
                        <div class="table-responsive" style="max-height: 520px;">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col" class="marginRight:0">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $value->siswa_name }}</td>
                                            <td>{{ $value->siswa_email }}</td>
                                            <td>{{ $value->siswa_kelas }}</td>
                                            <td class="text-left">

                                            @php
                                                $paramValue = $param->filter(function($item) use ($value, $dataReq) {
                                                    return $item->siswa_id == $value->id 
                                                        && $item->bulan == $dataReq->bulan 
                                                        && $item->pertemuan == $dataReq->pertemuan
                                                        && $item->nilai !== null;
                                                })->first();
                                            @endphp
                                            <!-- INPUT NILAI SISWA -->
                                            <input type="text" name="nilai[{{ $value->siswa_id }}]" id="nilai_{{ $value->siswa_id }}" class="p-2" required  style="width: 50px;">
                                            @if($paramValue)
                                                <span class="text-muted text-italic">nilai telah di submit</span>
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer text-right">
                            <input type="hidden" name="kegiatan_id" value="{{ $id }}">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                       </div>
                       @else
                            <span class="ml-4">Silakan cari data terlebih dahulu</span>
                        @endif
                            <div class="mb-3 ml-4">
                                    <a href="{{ route('penilaian.index') }}" class="btn btn-secondary">
                                        {{ __('Kembali') }}
                                    </a>
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
