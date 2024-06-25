@extends('layouts.app', ['title' => __('Dashboard')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Assalamualaikum') . ' '. auth()->user()->name,
        'description' => __('Selamat datang di sistem manajemen ekstrakurikuler SMP IT ALKAFFAH'),
        'class' => 'col-lg-7'
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                <div class="card-header border-0">
                    <h3 class="mb-0">Daftar Pengguna</h3>
                </div>
                <div class="table-responsive" style="max-height: 620px;">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="name">Nama</th>
                        <th scope="col" class="sort" data-sort="lastSeen">Terakhir dilihat</th>
                    </tr>
                    </thead>
                    <tbody class="list">
                        @foreach ($allUsers as $data)
                        <tr>
                            <td>{{ $data['nama'] }}</td>
                            <td>{{ $data['lastSeen'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        @include('layouts.corosel.slider')
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
