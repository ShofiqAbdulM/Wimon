<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->Wisata = new Wisata();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $key = Wisata::allLokasi();
        // $keyword = $key->pluck(request("search"));
        $keyword = $this->Wisata->allLokasi();
        return view('home', compact('keyword'));
    }
    public function lokasi($id = '')
    {

        $lokasi = $this->Wisata->getLokasi($id);
        return json_encode($lokasi);
    }
    public function sensor($id = '')
    {
        $sensor = $this->Wisata->getSensor($id);
        return json_encode($sensor);
    }
}
