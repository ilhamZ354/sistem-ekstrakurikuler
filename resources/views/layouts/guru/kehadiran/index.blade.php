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
                    <h3 class="mb-0">Daftar Kegiatan</h3>
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
                                    <th scope="col">Pembimbing</th>
                                    <th scope="col">Jumlah Peserta</th>
                                    <th scope="col" class="marginRight:0">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="list">
                            @foreach ($data as $key => $value)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->pembimbing }}</td>
                                <td>{{ $value->jumlah_peserta }}</td>
                                <td class="text-center">
                                    <div class="bg-info p-2">
                                    <a href="{{ route('kehadiran.show', $value->id) }}" class="text-white text-md">
                                        <i class="fas fa-edit"></i>Kehadiran
                                    </a>
                                    </div>
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