<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wisata;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
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

        $data = [
            'tittle' => 'Home / Wisata'
        ];
        $keyword = $this->Wisata->userLokasi(Auth::user()->id);

        return view('home', compact('keyword'), $data);
    }
    public function lokasi($id = '')
    {
        $sensor = $this->Wisata->getSensor($id);

        $lokasi = $this->Wisata->getLokasi($id);
        return response()->json(['lokasi' => $lokasi, 'sensor' => $sensor]);
    }
    public function add()
    {
        $data = [
            // 'tittle' => 'ADD Wisata'
        ];
        return view('wisata.w_add', $data);
    }
}
