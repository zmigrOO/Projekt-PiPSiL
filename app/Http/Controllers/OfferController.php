<?php

namespace App\Http\Controllers;

use App\Models\offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Summary of OfferController
 */
class OfferController extends Controller
{
    //create offer
    public function create()
    {
        return view('offers.create');
    }
    //show offer
    public function showAll()
    {
        
        $offers = offer::get();
        return view('offers', ['offers' => $offers]);
    }

    public function showMine()
    {
        $offers = offer::where('seller_id', Auth::user()->id)->get();
        return view('my-offers', ['offers' => $offers]);
    }

}
