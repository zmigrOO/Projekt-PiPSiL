<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\image;
use App\Models\Offer;
use App\Models\WatchedOffer;
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
        //get all offers and to each offer add category, image where order == 0 and boolean if offer is watched by current user
        $offers = Offer::all();
        foreach ($offers as $offer) {
            $offer->category = Category::where('id', $offer->category_id)->first();
            $offer->image = image::where('offer_id', $offer->id)->where('order', 0)->first();
            $offer->watched = WatchedOffer::where('offer_id', $offer->id)->where('user_id', Auth::user()->id)->exists();
        }

        return view('offers', ['offers' => $offers]);
    }

    public function showMine()
    {
        $offers = Offer::where('seller_id', Auth::user()->id)->get();
        foreach ($offers as $offer) {
            $offer->category = Category::where('id', $offer->category_id)->first();
            $offer->image = image::where('offer_id', $offer->id)->where('order', 0)->first();
            $offer->watched = WatchedOffer::where('offer_id', $offer->id)->where('user_id', Auth::user()->id)->exists();
        }

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
    public function details($id)
    {
        //to offer add images and category
        $offer = Offer::where('id', $id)->first();
        $offer->category = Category::where('id', $offer->category_id)->first();
        $offer->images = image::where('offer_id', $offer->id)->get();
        // $offer->images = DB::table('images')->where('offer_id', $offer->id)->get();
        dd($offer);

        // return view('offer-layout', ['offer' => $offer]);
    }
    public function wishlist()
    {
        // select all offer ids from watched offers where user id is current user id
        $watchedOffersIds = WatchedOffer::where('user_id', Auth::user()->id)->get('offer_id');
        // dd($watchedOffersIds);
        $offers = Offer::whereIn('id', $watchedOffersIds)->get();
        foreach ($offers as $offer) {
            $offer->category = Category::where('id', $offer->category_id)->first();
            $offer->image = image::where('offer_id', $offer->id)->where('order', 0)->first();
            $offer->watched = WatchedOffer::where('offer_id', $offer->id)->where('user_id', Auth::user()->id)->exists();
        }


        // select all offers where id is in previous result


        return view('watched-offers', ['offers' => $offers]);
    }
    public function wishChange($id)
    {
        //if offer is watched by current user, delete it from watched offers, else add it to watched offers
        if (WatchedOffer::where('offer_id', $id)->where('user_id', Auth::user()->id)->exists()) {
            WatchedOffer::where('offer_id', $id)->where('user_id', Auth::user()->id)->delete();
        } else {
            $watchedOffer = new WatchedOffer();
            $watchedOffer->offer_id = $id;
            $watchedOffer->user_id = Auth::user()->id;
            $watchedOffer->save();
        }
        //redirect to the view user came from
        return redirect()->back();
    }
}
