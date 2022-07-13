<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PengunjungController extends Controller
{
    public function index()
    {
        $keyword = DB::table('sensor_masuk')->selectRaw('distinct(DATE(tgl_masuk)) as tgl, COUNT(*) as jml_pengunjung')->groupBy('tgl')->get();
        return view('pengunjung', ['keyword' => $keyword]);
    }
}
