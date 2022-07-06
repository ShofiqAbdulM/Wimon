@foreach ($sensor_masuk as $sen_masuk)
    <h3>{{ $sen_masuk->jumlah_masuk }}</h3>

    <P>{{ date('d-M-y', strtotime($sen_masuk->tgl_masuk)) }}</P>
@endforeach

@foreach ($sensor_keluar as $sen_keluar)
    <h3>{{ $sen_keluar->jumlah_keluar }}</h3>

    <P>{{ date('d-M-y', strtotime($sen_keluar->tgl_keluar)) }}</P>
@endforeach

<h3>{{ $pengunjung }}</h3>
