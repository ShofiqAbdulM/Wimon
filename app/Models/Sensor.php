<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class Sensor extends Model
{

    public function updateSensor($wisata = '', $masuk, $keluar, $pengunjung)
    {
        $gsensor = DB::table('sensor')
            ->where('id_wisata', $wisata)
            ->update(['masuk' => $masuk, 'keluar' => $keluar, 'pengunjung' => $pengunjung]);
        return $gsensor;
    }
}
