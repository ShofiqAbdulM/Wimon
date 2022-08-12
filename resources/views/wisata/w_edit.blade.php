@extends('layouts.back')

@section('content')
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header pb-0">
                            <h3 class="card-title">Edit Wisata</h3>

                            <div class="card-tools pt-0 mt-0">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <form action="{{ route('edit.wisata', ['id' => $detail_wisata->id_wisata]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="kode">Kode Wisata</label>
                                            <input type="text" id="kode" value="{{ $detail_wisata->id_wisata }}"
                                                name="kode_wisata" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputName">Nama Wisata</label>
                                            <input type="text" value="{{ $detail_wisata->nama }}" id="inputName"
                                                name="nama_wisata" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" id="gambar" name="gambar_wisata"
                                                class="form-control border-0 pl-0 pt-1">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group ">
                                            <label for="inputDescription">Alamat Wisata</label>
                                            <textarea id="inputDescription" name="alamat_wisata" class="form-control"
                                                rows="5">{{ $detail_wisata->alamat }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="map">Map Geojson</label>
                                            <div id='map' style="height:250px;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="/home" class="btn btn-secondary">Cancel</a>
                                        <input type="submit" value="Update Wisata " class="btn btn-success float-right">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
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
    </script>
@endsection
