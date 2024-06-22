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
                    <tr>
                        <th scope="row">
                        <div class="media align-items-center">
                            <div href="#" class="avatar rounded-circle mr-3">
                                <img alt="Image placeholder" src="../assets/img/brand/favicon2.png">
                            </div>
                            <div class="media-body">
                            <span class="name mb-0 text-sm">Andi nova</span>
                            </div>
                        </div>
                        </th>
                        <td class="lastSeen">
                        12/07/2024
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                        <div class="media align-items-center">
                            <div href="#" class="avatar rounded-circle mr-3">
                                <img alt="Image placeholder" src="../assets/img/brand/favicon2.png">
                            </div>
                            <div class="media-body">
                            <span class="name mb-0 text-sm">Andi nova</span>
                            </div>
                        </div>
                        </th>
                        <td class="lastSeen">
                        12/07/2024
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                        <div class="media align-items-center">
                            <div href="#" class="avatar rounded-circle mr-3">
                                <img alt="Image placeholder" src="../assets/img/brand/favicon2.png">
                            </div>
                            <div class="media-body">
                            <span class="name mb-0 text-sm">Andi nova</span>
                            </div>
                        </div>
                        </th>
                        <td class="lastSeen">
                        12/07/2024
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                        <div class="media align-items-center">
                            <div href="#" class="avatar rounded-circle mr-3">
                                <img alt="Image placeholder" src="../assets/img/brand/favicon2.png">
                            </div>
                            <div class="media-body">
                            <span class="name mb-0 text-sm">Andi nova</span>
                            </div>
                        </div>
                        </th>
                        <td class="lastSeen">
                        12/07/2024
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                        <div class="media align-items-center">
                            <div href="#" class="avatar rounded-circle mr-3">
                                <img alt="Image placeholder" src="../assets/img/brand/favicon2.png">
                            </div>
                            <div class="media-body">
                            <span class="name mb-0 text-sm">Andi nova</span>
                            </div>
                        </div>
                        </th>
                        <td class="lastSeen">
                        12/07/2024
                        </td>
                    </tr><tr>
                        <th scope="row">
                        <div class="media align-items-center">
                            <div href="#" class="avatar rounded-circle mr-3">
                                <img alt="Image placeholder" src="../assets/img/brand/favicon2.png">
                            </div>
                            <div class="media-body">
                            <span class="name mb-0 text-sm">Andi nova</span>
                            </div>
                        </div>
                        </th>
                        <td class="lastSeen">
                        12/07/2024
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                        <div class="media align-items-center">
                            <div href="#" class="avatar rounded-circle mr-3">
                                <img alt="Image placeholder" src="../assets/img/brand/favicon2.png">
                            </div>
                            <div class="media-body">
                            <span class="name mb-0 text-sm">Andi nova</span>
                            </div>
                        </div>
                        </th>
                        <td class="lastSeen">
                        12/07/2024
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                        <div class="media align-items-center">
                            <div href="#" class="avatar rounded-circle mr-3">
                                <img alt="Image placeholder" src="../assets/img/brand/favicon2.png">
                            </div>
                            <div class="media-body">
                            <span class="name mb-0 text-sm">Andi nova</span>
                            </div>
                        </div>
                        </th>
                        <td class="lastSeen">
                        12/07/2024
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                        <div class="media align-items-center">
                            <div href="#" class="avatar rounded-circle mr-3">
                                <img alt="Image placeholder" src="../assets/img/brand/favicon2.png">
                            </div>
                            <div class="media-body">
                            <span class="name mb-0 text-sm">Andi nova</span>
                            </div>
                        </div>
                        </th>
                        <td class="lastSeen">
                        12/07/2024
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                        <div class="media align-items-center">
                            <div href="#" class="avatar rounded-circle mr-3">
                                <img alt="Image placeholder" src="../assets/img/brand/favicon2.png">
                            </div>
                            <div class="media-body">
                            <span class="name mb-0 text-sm">Andi nova</span>
                            </div>
                        </div>
                        </th>
                        <td class="lastSeen">
                        12/07/2024
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                        <div class="media align-items-center">
                            <div href="#" class="avatar rounded-circle mr-3">
                                <img alt="Image placeholder" src="../assets/img/brand/favicon2.png">
                            </div>
                            <div class="media-body">
                            <span class="name mb-0 text-sm">Andi nova</span>
                            </div>
                        </div>
                        </th>
                        <td class="lastSeen">
                        12/07/2024
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                        <div class="media align-items-center">
                            <div href="#" class="avatar rounded-circle mr-3">
                                <img alt="Image placeholder" src="../assets/img/brand/favicon2.png">
                            </div>
                            <div class="media-body">
                            <span class="name mb-0 text-sm">Andi nova</span>
                            </div>
                        </div>
                        </th>
                        <td class="lastSeen">
                        12/07/2024
                        </td>
                    </tr>
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
