@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')


    <div class="container-fluid mt--8">
        <div class="col">
            <div class="col mb-2">
                <a href="{{ route('orangtua.create') }}" class="btn bg-transparent border border-white rounded-pill text-white" onclick>Tambah data</a>
            </div>
            <div class="col">
            <div class="card shadow">
            <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Data orangtua</h3>
                </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="max-height: 520px;">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIK</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Id telegram</th>
                                    <th scope="col">Nama siswa</th>
                                    <th scope="col">Kode Siswa</th>
                                    <th scope="col">Terakhir dilihat</th>
                                    <th scope="col" class="marginRight:0">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="list">
                            @foreach ($data as $key => $value)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $value->nama }}</td>
                                <td>{{ $value->username }}</td>
                                <td>{{ $value->email }}</td>
                                <td>{{ $value->id_telegram }}</td>
                                <td>{{ $value->siswa_nama }}</td>
                                <td>{{ $value->kodeSiswa }}</td>
                                <td>{{ $value->lastSeen }}</td>
                                <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('orangtua.edit',$value->id) }}">Edit</a>
                                    <form action="{{ route('orangtua.destroy',$value->id) }}" method="POST" class="delete-form">
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-batal').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent form submission
                    const form = this.closest('.delete-form');
                    Swal.fire({
                        title: 'Hapus Orangtua!',
                        text: 'Apa kamu yakin ingin menghapus?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Tidak!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush