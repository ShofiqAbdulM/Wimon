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

        $sensor = $this->Wisata->getSensor($keyword[0]->id_wisata);


        return view('frontend.wisata', compact('keyword'), compact('sensor'));
    }


    public function lokasi($id = '')
    {
        $sensor = $this->Wisata->getSensor($id);

        $lokasi = $this->Wisata->getLokasi($id);
        return response()->json(['lokasi' => $lokasi, 'sensor' => $sensor]);
    }
}
