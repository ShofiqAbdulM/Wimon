@extends('layouts.back')

@section('content')
    <div class="container">
        @include('layouts/aset/flash')
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header pb-0">
                            <h3 class="card-title">ADD Wisata</h3>

                        </div>
                        <form action="{{ route('add.wisata') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label for="kode">Kode Wisata</label>
                                            <input type="text" id="kode" name="kode_wisata" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputName">Nama Wisata</label>
                                            <input type="text" id="inputName" name="nama_wisata" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" id="gambar" name="gambar_wisata"
                                                class="form-control border-0 pl-0 pt-1">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="inputDescription">Alamat Wisata</label>
                                            <textarea id="inputDescription" name="alamat_wisata" class="form-control" rows="5"></textarea>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="map">Map Geojson</label>
                                            <div id='map' style="height:250px;"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="/home" class="btn btn-secondary">Cancel</a>
                                            <input type="submit" value="Create new Wisata "
                                                class="btn btn-success float-right">
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
        </section>
    </div>

    <script>
        var peta1 = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: '<a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
            });
        var map = L.map('map', {
            center: [-7.884550294687469, 112.52448965839899],
            zoom: 14,
            layers: [peta1]
        });

        $('.swalDefaultSuccess').click(function() {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: 'Data Telah Di Tambahkan',
                footer: '<a href="">Why do I have this issue?</a>'
            })
        });
        $('.swalDefaultError').click(function() {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
                footer: '<a href="">Why do I have this issue?</a>'
            })
        });
    </script>
@endsection
