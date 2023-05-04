<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
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
        $offers = Offer::all();
        return view('offers', ['offers' => $offers]);
    }

    public function showMine()
    {
        $offers = Offer::where('seller_id', Auth::user()->id)->get();
        return view('my-offers', ['offers' => $offers]);
    }
    public function new()
    {
        $categories = Category::all();
        return view('new-offer', ['categories' => $categories]);
    }

    public function add(Request $request): RedirectResponse
    {
        //get data from request, but pass category as its id
        $offer = new Offer();
        $offer->name = $request->input('name');
        $offer->description = $request->input('description');
        $offer->quantity = $request->input('quantity');
        $offer->price = $request->input('price');
        $offer->condition = $request->input('condition');
        $offer->category_id = $request->input('category');
        $offer->offer_creation_date = now();
        $offer->seller_id = Auth::user()->id;


        $offer->save();
        return redirect(route("my-offers"));
    }
}
