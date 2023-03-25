<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfferController extends Controller
{
    //create offer
    public function create()
    {
        return view('offers.create');
    }
    //show offer
    public function show()
    {
        return view('offers.show');
    }
}
