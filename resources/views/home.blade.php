@extends('layouts.back')

@section('content')
    <div class="container">
        <h1 class="m-0">{{ $tittle }}</h1>

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
                            <div class="card-tools text-right pb-0">
                                <button type="button" class="btn btn-primary btn-sm btn-flat">
                                    <a href="/home/add" class="text-white"><i class="fas fa-plus mr-2"></i>ADD
                                    </a>
                                </button>
                            </div>
                            <table id="example1" class="table table-bordered table-striped mt-2">
                                @foreach ($keyword as $keey)
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Image</th>
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
                                            <td>
                                                <a class="btn btn-info btn-sm" href="edit">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="#">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </a>
                                            </td>
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
        $(function() {
            /*
             * Flot Interactive Chart
             * -----------------------
             */
            // We use an inline data source in the example, usually data would
            // be fetched from a server
            var data = [],
                totalPoints = 100

            function getRandomData() {

                if (data.length > 0) {
                    data = data.slice(1)
                }

                // Do a random walk
                while (data.length < totalPoints) {

                    var prev = data.length > 0 ? data[data.length - 1] : 50,
                        y = prev + Math.random() * 10 - 5

                    if (y < 0) {
                        y = 0
                    } else if (y > 100) {
                        y = 100
                    }

                    data.push(y)
                }

                // Zip the generated y values with the x values
                var res = []
                for (var i = 0; i < data.length; ++i) {
                    res.push([i, data[i]])
                }

                return res
            }

            var interactive_plot = $.plot('#interactive', [{
                data: getRandomData(),
            }], {
                grid: {
                    borderColor: '#f3f3f3',
                    borderWidth: 1,
                    tickColor: '#f3f3f3'
                },
                series: {
                    color: '#3c8dbc',
                    lines: {
                        lineWidth: 2,
                        show: true,
                        fill: true,
                    },
                },
                yaxis: {
                    min: 0,
                    max: 100,
                    show: true
                },
                xaxis: {
                    show: true
                }
            })

            var updateInterval = 500 //Fetch data ever x milliseconds
            var realtime = 'on' //If == to on then fetch data every x seconds. else stop fetching
            function update() {

                interactive_plot.setData([getRandomData()])

                // Since the axes don't change, we don't need to call plot.setupGrid()
                interactive_plot.draw()
                if (realtime === 'on') {
                    setTimeout(update, updateInterval)
                }
            }

            //INITIALIZE REALTIME DATA FETCHING
            if (realtime === 'on') {
                update()
            }
            //REALTIME TOGGLE
            $('#realtime .btn').click(function() {
                if ($(this).data('toggle') === 'on') {
                    realtime = 'on'
                } else {
                    realtime = 'off'
                }
                update()
            })
            /*
             * END INTERACTIVE CHART
             */
        })
    </script>
@endsection
