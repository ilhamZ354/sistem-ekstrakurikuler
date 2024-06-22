@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')


    <div class="container-fluid mt--8">
        <div class="col">
            <div class="col mb-2">
                <button type="button" class="btn bg-transparent border border-white rounded-pill text-white"  data-bs-toggle="modal" data-bs-target="#inputModal">Tambah data</button>
                <!-- Modal -->
                <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn bg-gradient-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>
                
            </div>
            <div class="col">
            <div class="card shadow">
            <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Data guru</h3>
                </div>
                <div class="col text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="form-check mr-3">
                            <input class="form-check-input mt-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Select all
                            </label>
                                    </div>
                                    <Button type="submit" class="btn btn-info">Hapus</Button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive" style="max-height: 520px;">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col" class="marginRight:0">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">Andi</th>
                                <td>9012812922</td>
                                <td>andi@gmail.com</td>
                                <td>andi123</td>
                                <td>
                                    <button type="button" class="btn btn-dark"><i class="fas fa-edit"></i></button>
                                    <button type="button" class="btn btn-warning"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Budi</th>
                                <td>9012812923</td>
                                <td>budi@gmail.com</td>
                                <td>budi123</td>
                            </tr>
                            <tr>
                                <th scope="row">Cici</th>
                                <td>9012812924</td>
                                <td>cici@gmail.com</td>
                                <td>cici123</td>
                            </tr>
                            <tr>
                                <th scope="row">Dodi</th>
                                <td>9012812925</td>
                                <td>dodi@gmail.com</td>
                                <td>dodi123</td>
                            </tr>
                            <tr>
                                <th scope="row">Edi</th>
                                <td>9012812926</td>
                                <td>edi@gmail.com</td>
                                <td>edi123</td>
                            </tr>
                            <tr>
                                <th scope="row">Fani</th>
                                <td>9012812927</td>
                                <td>fani@gmail.com</td>
                                <td>fani123</td>
                            </tr>
                            <tr>
                                <th scope="row">Gina</th>
                                <td>9012812928</td>
                                <td>gina@gmail.com</td>
                                <td>gina123</td>
                            </tr>
                            <tr>
                                <th scope="row">Hani</th>
                                <td>9012812929</td>
                                <td>hani@gmail.com</td>
                                <td>hani123</td>
                            </tr>
                            <tr>
                                <th scope="row">Iwan</th>
                                <td>9012812930</td>
                                <td>iwan@gmail.com</td>
                                <td>iwan123</td>
                            </tr>
                            <tr>
                                <th scope="row">Joni</th>
                                <td>9012812931</td>
                                <td>joni@gmail.com</td>
                                <td>joni123</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                    <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                        <a class="page-link" href="javascript:;" tabindex="-1">
                            <i class="fa fa-angle-left"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="javascript:;">1</a></li>
                        <li class="page-item active"><a class="page-link" href="javascript:;">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="javascript:;">
                            <i class="fa fa-angle-right"></i>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                    </ul>
                    </nav>
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