<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;


class SensorController extends Controller
{
    public function __construct()
    {
        $this->Sensor = new Sensor();
        $this->Wisata = new Wisata();
    }

    public function getPengunjungMasuk()
    {
        $sensor_masuk = $this->Wisata->getSensorMasuk(1);
        return response()->json([
            'status_code' => 200,
            'success' => true,
            'message' => "success",
            'sensor' => $sensor_masuk
        ]);
    }

    public function tambahSensorMasuk(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_wisata' => 'required',
            'jumlah_masuk' => 'required'
        ]);
        if ($validator->fails()) {
            $respon = [
                'status_code' => 401,
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($respon, 401);
        }


        $tgl_masuk = Carbon::now();
        //$pengunjung = $request->masuk - $request->keluar;
        $sensor = $this->Sensor->tambahSensorMasuk($request->id_wisata, $request->jumlah_masuk, $tgl_masuk);
        return response()->json([
            'status_code' => 200,
            'success' => true,
            'message' => "success",
            'sensor' => $sensor
        ]);
    }

    public function tambahSensorKeluar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_wisata' => 'required',
            'jumlah_keluar' => 'required'
        ]);
        if ($validator->fails()) {
            $respon = [
                'status_code' => 401,
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($respon, 401);
        }


        $tgl_keluar = Carbon::now();
        //$pengunjung = $request->masuk - $request->keluar;
        $sensor = $this->Sensor->tambahSensorKeluar($request->id_wisata, $request->jumlah_keluar, $tgl_keluar);
        return response()->json([
            'status_code' => 200,
            'success' => true,
            'message' => "success",
            'sensor' => $sensor
        ]);
    }
}
