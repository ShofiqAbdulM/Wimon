<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventFController extends Controller
{

    public function index()
    {
        // $keyword = $this->Wisata->allLokasi();
        return view('frontend.event');
    }
}
