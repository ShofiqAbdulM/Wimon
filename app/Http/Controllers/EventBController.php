<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventBController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->Wisata = new Wisata();
    }
    public function index()
    {
        // $keyword = $this->Wisata->allLokasi();
        return view('event');
    }
}
