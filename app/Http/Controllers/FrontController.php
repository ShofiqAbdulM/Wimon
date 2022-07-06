<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FrontController extends Controller
{
    public function __construct()
    {
        $this->Wisata = new Wisata();
    }

    public function index()
    {
        $keyword = $this->Wisata->allLokasi();

        return view('frontend.wisata', ['keyword' => $keyword]);
    }

    public function lokasi($id = '')
    {
        //$sensor = $this->Wisata->getSensor($id);
        $lokasi = $this->Wisata->getLokasi($id);

        $sensor_masuk = $this->Wisata->getSensorMasuk($lokasi[0]->id_wisata);
        $sensor_keluar = $this->Wisata->getSensorKeluar($lokasi[0]->id_wisata);
        $total_pengunjung_saat_ini = $sensor_masuk[0]->jumlah_masuk - $sensor_keluar[0]->jumlah_keluar;

        if ($total_pengunjung_saat_ini <= 0) {
            $pengunjung = 0;
        } else {
            $pengunjung = $total_pengunjung_saat_ini;
        }
        return response()->json(['lokasi' => $lokasi, 'sensor_masuk' => $sensor_masuk, 'sensor_keluar' => $sensor_keluar, 'pengunjung' => $pengunjung]);
    }
}
