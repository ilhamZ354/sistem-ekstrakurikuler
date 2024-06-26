@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--8">
        <div class="col">
        <div class="row">
            <!-- Card Kegiatan -->
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Kegiatan {{ $data->nama }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="max-height: 520px;">
                        <div class="align-items-start">
                            <p class="text-muted">{{ $data->deskripsi }}</p>
                        </div>
                        <div class="border-2 bg-secondary p-2">
                            <span><i class="ni ni-single-02"></i> Pembimbing : {{ $data->pembimbing }}</span>
                        </div>
                        <div class="border-2 bg-secondary p-2 mt-2">
                            <span><i class="ni ni-pin-3"></i> Tempat : {{ $data->tempat }}</span>
                        </div>
                        <div class="border-2 bg-secondary p-2 mt-2">
                            <span><i class="fas fa-users"></i> Peserta : {{ $data->jumlah_peserta }}</span>
                        </div>
                        <div class="border-2 bg-secondary p-2 mt-2">
                            <span><i class="ni ni-single-02"></i> PJ : {{ $data->penanggungjawab }}</span>
                        </div>
                    </div>
                    <div class="card-footer">
                    <div class="mb-3">
                        <a href="{{ route('jadwal.index') }}" class="btn btn-secondary">
                            {{ __('Kembali') }}
                        </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Jadwal -->
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Jadwal Kegiatan</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="max-height: 520px;">
                        <div class="align-items-start">
                            <p class="text-muted">Jadwal kegiatan ini belum dibuat!.</p>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <button type="submit" class="btn btn-secondary"><a href="#" class="text-dark">Edit</a></button>
                        <a href="{{ route('jadwal.create',$data->id) }}" onmouseover="moveRight(this)" onmouseout="moveLeft(this)">
                            Buat jadwal >>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
<script>
        function moveRight(element) {
            element.style.transform = "translateX(10px)";
            element.style.transition = "transform 0.2s";
        }

        function moveLeft(element) {
            element.style.transform = "translateX(0)";
            element.style.transition = "transform 0.2s";
        }
    </script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
