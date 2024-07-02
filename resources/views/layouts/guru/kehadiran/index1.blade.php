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
                                <h3 class="mb-0">TES TELEGRAM</h3>
                            </div>
                        </div>
                    </div>
                    <form action="{{ route('kehadiran.store') }}" method="POST">
                    @csrf
                            <input type="text" name="nama" value="">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                       </div>
                    </form>
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
