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
                    <h3 class="mb-0">Daftar Kegiatan Ekstrakurikuler</h3>
                </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="max-height: 520px">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Deksripsi</th>
                                    <th scope="col">Pembimbing</th>
                                    <th scope="col">Tempat kegiatan</th>
                                    <th scope="col" class="marginRight:0">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="list">
                            @foreach ($data as $key => $value)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $value->nama }}</td>
                                <td><textarea name="deskripsi" style="width: 400px; min-height:70px; border:0;" class="text-body" readonly>{{ $value->deskripsi }}</textarea></td>
                                <td>{{ $value->pembimbing }}</td>
                                <td>{{ $value->tempat }}</td>
                                <td class="text-right">
                                        @php
                                            $paramValue = $param->firstWhere('kegiatan_id', $value->id);
                                        @endphp

                                        @if($paramValue)
                                            <form action="{{ route('kegiatan-siswa.destroy', $value->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-dark">Batal</button>
                                            </form>
                                        @else
                                            <form action="{{ route('kegiatan-siswa.store') }}" method="POST" style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="siswa_id" value="{{ auth()->guard('siswas')->user()->id }}">
                                                <input type="hidden" name="kegiatan_id" value="{{ $value->id }}">
                                                <button type="submit" class="btn btn-info">{{ __('Daftar') }}</button>
                                            </form>
                                            <button type="submit" class="btn btn-dark" disabled>{{ __('Batal') }}</button>
                                        @endif
                                    </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $data->links('pagination::bootstrap-4') }}
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