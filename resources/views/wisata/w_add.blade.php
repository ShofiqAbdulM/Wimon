@extends('layouts.back')

@section('content')
    <div class="container">
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header pb-0">
                            <h3 class="card-title">ADD Wisata</h3>

                            <div class="card-tools pt-0 mt-0">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <form action="tambahwisata">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="inputName">Nama Wisata</label>
                                            <input type="text" id="inputName" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <input type="file" id="gambar" class="form-control border-0 pl-0 pt-1">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group ">
                                            <label for="inputDescription">Alamat Wisata</label>
                                            <textarea id="inputDescription" class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group ">
                                            <label for="map">Map Geojson</label>
                                            <textarea id="map" class="form-control" rows="8"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-12">
                                        <a href="#" class="btn btn-secondary">Cancel</a>
                                        <input type="submit" value="Create new Wisata " class="btn btn-success float-right">
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
@endsection
