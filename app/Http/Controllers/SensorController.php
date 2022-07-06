<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SensorController extends Controller
{
    public function __construct()
    {
        $this->Sensor = new Sensor();
    }

    public function updateSensor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_wisata' => 'required',
            'masuk' => 'required',
            'keluar' => 'required'
        ]);
        if ($validator->fails()) {
            $respon = [
                'status_code' => 401,
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($respon, 401);
        }

        $pengunjung = $request->masuk - $request->keluar;
        $sensor = $this->Sensor->updateSensor($request->id_wisata, $request->masuk, $request->keluar, $pengunjung);
        return response()->json([
            'status_code' => 401,
            'success' => false,
            'message' => "success",
            'sensor' => $sensor
        ]);
    }
}
