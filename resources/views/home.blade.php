@extends('layouts.back')

@section('content')
    <div class="container">
        <h1 class="m-0">{{ $tittle }}</h1>

        @if (session('success'))
            <div class="alert alert-success border-left-success alert-dismissible fade show mt-2 mb-0" role="alert">
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
                            <div class="card-tools text-right pb-0">
                                <a href="{{ route('view.add.wisata') }}" class="text-white">
                                    <button type="button" class="btn btn-primary btn-sm btn-flat">
                                        <i class="fas fa-plus mr-2"></i>ADD
                                    </button>
                                </a>
                            </div>
                            <table id="example1" class="table table-bordered table-striped mt-2">

                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keyword as $no => $keey)
                                        <tr>
                                            <td style="width: 1em">{{ $no + 1 }}</td>
                                            <td style="max-width:5em">{{ $keey->nama }}</td>
                                            <td>{{ $keey->alamat }}</td>
                                            <td style="width: 10em"> <img
                                                    src="{{ asset('gambar') }}/{{ $keey->gambar }}"
                                                    alt="{{ $keey->nama }}" style="max-width: 10em"></td>
                                            <td style="max-width: 5px">
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('view.edit.wisata', [$keey->id_wisata]) }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                @csrf
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ route('delete.wisata', [$keey->id_wisata]) }}"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </section>
            </div>
        </div>
    </div>
    <script>
        const inputs = document.querySelectorAll(".input");


        function addcl() {
            let parent = this.parentNode.parentNode;
            parent.classList.add("focus");
        }

        function remcl() {
            let parent = this.parentNode.parentNode;
            if (this.value == "") {
                parent.classList.remove("focus");
            }
        }


        inputs.forEach(input => {
            input.addEventListener("focus", addcl);
            input.addEventListener("blur", remcl);
        });
    </script>
@endsection
