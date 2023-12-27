@extends('layouts.main_index')
@section('main_index')
    {{-- content --}}
    <div class="container-fluid py-4">
        <div class="row my-4">
            <div class="col-lg-11 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Data buku yang tersedia</h6>
                            </div>
                            <div class="col-lg-6 col-5 my-auto text-end">
                                <div class="dropdown float-lg-end pe-4">
                                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-secondary"></i>
                                    </a>
                                    {{-- <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                        <li><a class="dropdown-item border-radius-md" data-bs-toggle="modal"
                                                data-bs-target="#createModal">pinjam buku</a>
                                        </li>
                                    </ul> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @include('partials.siswa.create_modal') --}}
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Id</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Judul</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Penerbit</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Pengarang</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Stok tersisa</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Last Updated</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buku as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $data->judul }}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group">
                                                    <h6 class="mb-0 text-sm">{{ $data->penerbit }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group">
                                                    <h6 class="mb-0 text-sm">{{ $data->pengarang }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group">
                                                    <h6 class="mb-0 text-sm">{{ $data->stok_buku }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="avatar-group">
                                                    <h6 class="mb-0 text-sm">{{ $data->updated_at }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    <div class="avatar-group d-flex">
                                                        @if ($data->stok_buku > 0)
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#editModal_{{ $data->id }}"
                                                                data-buku-id="{{ $data->id }}">
                                                                Pinjam
                                                            </button>
                                                            @include('partials.siswa.pinjam_buku')
                                                        @else
                                                            <button type="button" class="btn btn-secondary" disabled>
                                                                Stok Habis
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
