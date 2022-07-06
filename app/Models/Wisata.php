<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Wisata extends Model
{
    public function getLokasi($id = '')
    {
        $glokasi = DB::table('wisata')
            ->select('nama', 'alamat', 'gambar', 'map')
            ->where('id_wisata', $id)
            ->get(0);
        return $glokasi;
    }

    public function getSensor($wisata = '')
    {
        $gsensor = DB::table('sensor')
            ->select('pengunjung', 'masuk', 'keluar')
            ->join('wisata', 'wisata.id_wisata', '=', 'sensor.id_wisata')
            ->where('wisata.id_wisata', $wisata)
            ->get(0);
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
