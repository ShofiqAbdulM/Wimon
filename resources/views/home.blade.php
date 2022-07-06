@extends('layouts.back')

@section('content')
    <div class="container">
        <h1 class="m-0">{{ __('Home / Wisata') }}</h1>

        @if (session('success'))
            <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    </div>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-2">
                <section class="content">

                    <!-- Default box -->
                    <div class="card card-success card-outline">
                        <div class="card-header pb-0">
                            <h3 class="card-title">Data Wisata</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body pt-2">
                            <div class="card-tools text-right mb-2">
                                <button type="button" class="btn btn-primary btn-sm btn-flat">
                                    <i class="fas fa-plus mr-2"></i>ADD
                                </button>
                            </div>
                            <table id="example1" class="table table-bordered table-striped">
                                @foreach ($keyword as $keey)
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Image</th>
                                            <th>Map</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width: 1em">{{ $keey->id_wisata }}</td>
                                            <td>{{ $keey->nama }}</td>
                                            <td>{{ $keey->alamat }}</td>
                                            <td style="width: 10em"> <img src="{{ asset('img') }}/{{ $keey->gambar }}"
                                                    alt="{{ $keey->nama }}" style="max-width: 10em"></td>
                                            <td>{{ $keey->map }}</td>

                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </section>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12 mt-2">
                <section class="content">
                    <div class="card card-primary card-outline">
                        <div class="card-header pb-0">
                            <h3 class="card-title"> <i class="far fa-chart-bar"></i>
                                Chart Data Pengunjung</h3>
                            <div class="card-tools pt-0">
                                RealTime
                                <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                                    <button type="button" class="btn btn-default btn-sm active" data-toggle="on">On</button>
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="off">Off</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="interactive" style="height: 300px;"></div>
                        </div>
                        <!-- /.card-body-->
                        <div class="card-footer">
                            <a href="" class="text-dark"><i class="fas fa-download"></i>
                                Download Excel</a>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->

                </section>
            </div>
        </div>
    </div>
@endsection
