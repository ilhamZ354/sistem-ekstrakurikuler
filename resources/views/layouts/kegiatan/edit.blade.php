@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--8">
            <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Data Siswa') }}</div>

                <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('kegiatan.update', $kegiatan->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="nama" class="form-label">{{ __('Nama Kegiatan') }}</label>
                                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $kegiatan->nama }}" required autofocus>
                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                <label for="deskripsi" class="form-label">{{ __('Deskripsi kegiatan') }}</label>
                                <textarea id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" required autofocus>{{ $kegiatan->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="pembimbing" class="form-label">{{ __('Pembimbing kegiatan') }}</label>
                                    <input id="pembimbing" type="text" class="form-control @error('pembimbing') is-invalid @enderror" name="pembimbing" value="{{ $kegiatan->pembimbing }}" required autofocus>
                                    @error('pembimbing')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="tempat" class="form-label">{{ __('Tempat kegiatan') }}</label>
                                    <input id="tempat" type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat" value="{{ $kegiatan->tempat }}" required autofocus>
                                    @error('tempat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="{{ route('kegiatan.index') }}" class="btn btn-primary">
                                            {{ __('Kembali') }}
                                        </a>
                                        <button type="submit" class="btn btn-info">
                                            {{ __('Simpan') }}
                                        </button>
                                    </div>
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