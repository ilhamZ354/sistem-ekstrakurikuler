@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--8">
            <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Buat Jadwal') }}</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('jadwal.store') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="jumlahPertemuan" class="form-label">{{ __('Jumlah Pertemuan Setiap Bulan') }}</label>
                                    <select id="jumlahPertemuan" class="form-control @error('jumlahPertemuan') is-invalid @enderror" name="jumlahPertemuan" required>
                                        <option value="" disabled selected>Jumlah Pertemuan</option>
                                            <option value="1">1 kali pertemuan</option>
                                            <option value="2">2 kali pertemuan</option>
                                            <option value="3">3 kali pertemuan</option>
                                            <option value="4">4 kali pertemuan</option>
                                    </select>
                                    @error('jumlahPertemuan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="hari" class="form-label">{{ __('Setiap hari') }}</label>
                                    <select id="hari" class="form-control @error('hari') is-invalid @enderror" name="hari" required>
                                        <option value="" disabled selected>pilih hari</option>
                                            <option value="senin">Senin</option>
                                            <option value="selasa">Selasa</option>
                                            <option value="rabu">Rabu</option>
                                            <option value="kamis">Kamis</option>
                                            <option value="jumat">Jumat</option>
                                            <option value="sabtu">Sabtu</option>
                                            <option value="minggu">Minggu</option>
                                    </select>
                                    @error('hari')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="waktu" class="form-label">{{ __('Waktu') }}</label>
                                    <input id="waktu" type="time" class="form-control @error('waktu') is-invalid @enderror" name="waktu" value="{{ old('waktu') }}" required>
                                    @error('waktu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <a href="{{ route('jadwal.show',$param) }}" class="btn btn-secondary">
                                        {{ __('Kembali') }}
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Simpan') }}
                                    </button>
                                </div>
                            </form>
                </div>
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