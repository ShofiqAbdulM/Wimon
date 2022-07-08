<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Wisata extends Model
{
    public function getLokasi($id = '')
    {
        $glokasi = DB::table('wisata')
            ->select('id_wisata', 'nama', 'alamat', 'gambar', 'map')->get();

        // ->select('nama', 'alamat', 'gambar', 'map')
        // ->where('id_wisata', $id)
        // ->get();
        return $glokasi;
    }

    public function getSensorMasuk($wisata = '')
    {
        $gsensor = DB::table('sensor_masuk')
            ->join('wisata', 'wisata.id_wisata', '=', 'sensor_masuk.id_wisata')
            ->where('wisata.id_wisata', $wisata)
            ->whereDate('sensor_masuk.tgl_masuk', Carbon::now())
            ->count();
        return $gsensor;
    }

    public function getSensorKeluar($wisata = '')
    {
        $gsensor = DB::table('sensor_keluar')
            ->join('wisata', 'wisata.id_wisata', '=', 'sensor_keluar.id_wisata')
            ->where('wisata.id_wisata', $wisata)
            ->whereDate('sensor_keluar.tgl_keluar', Carbon::now())
            ->count();
        return $gsensor;
    }

    public function userLokasi($user = '')
    {
        $keyword = DB::table('wisata')
            ->select('id_wisata', 'nama', 'alamat', 'gambar', 'map')->where('id_user', '=', $user)->get();
        return $keyword;
    }
    public function allLokasi()
    {
        $keyword = DB::table('wisata')
            ->select('id_wisata', 'nama', 'alamat', 'gambar', 'map')->get();
        return $keyword;
    }
    public function updateWisata(Request $request)
    {
    }
}
