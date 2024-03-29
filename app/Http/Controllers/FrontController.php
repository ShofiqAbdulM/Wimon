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
        $glokasi = $this->Wisata->getLokasi($id);

        $sensor_masuk = $this->Wisata->getSensorMasuk();
        $sensor_keluar = $this->Wisata->getSensorKeluar();
        $total_pengunjung_saat_ini = $sensor_masuk - $sensor_keluar;

        if ($total_pengunjung_saat_ini <= 0) {
            $pengunjung = 0;
        } else {
            $pengunjung = $total_pengunjung_saat_ini;
        }
        return response()->json(['lokasi' => $glokasi, 'sensor_masuk' => $sensor_masuk, 'sensor_keluar' => $sensor_keluar, 'pengunjung' => $pengunjung]);
    }
}
