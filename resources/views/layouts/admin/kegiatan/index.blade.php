@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--8">
        <div class="col">
            <div class="col mb-2">
                <a href="{{ route('kegiatan.create') }}" class="btn bg-transparent border border-white rounded-pill text-white">Tambah data</a>
            </div>
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Data kegiatan</h3>
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
                                    <th scope="col">PJ</th>
                                    <th scope="col">Jumlah peserta</th>
                                    <th scope="col" class="text-right"></th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @foreach ($data as $key => $value)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $value->nama }}</td>
                                        <td><textarea name="deskripsi" style="width: 450px; min-height:70px; border:0;" class="text-body" readonly>{{ $value->deskripsi }}</textarea></td>
                                        <td>{{ $value->pembimbing }}</td>
                                        <td>{{ $value->tempat }}</td>
                                        <td>{{ $value->penanggungjawab }}</td>
                                        <td>{{ $value->jumlah_peserta }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                    <a class="dropdown-item" href="{{ route('kegiatan.edit', $value->id) }}">Edit</a>
                                                    <form action="{{ route('kegiatan.destroy', $value->id) }}" method="POST" class="delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item btn-batal">Delete</button>
                                                    </form>
                                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-batal').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const form = this.closest('.delete-form');
                    Swal.fire({
                        title: 'Hapus kegiatan!',
                        text: 'Apa kamu yakin ingin menghapus ?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Tidak !'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
@endpush
