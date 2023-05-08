<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\image;
use App\Models\Offer;
use App\Models\Opinion;
use App\Models\User;
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
    public $conditions = [
        'Brand new',
        'Like new',
        'Very good',
        'Good',
        'Acceptable',
        'Used',
        'For parts or not working'
    ];
    public function create()
    {
        return view('offers.create');
    }
    public function showAll()
    {
        //get all offers and to each offer add category, image where order == 0 and boolean if offer is watched by current user
        $offerIDs = Offer::where('active', true)->get('id');
        $offers = Offer::whereIn('id', $offerIDs)->get();
        foreach ($offers as $offer) {
            $offer->category = Category::where('id', $offer->category_id)->first();
            $offer->image = image::where('offer_id', $offer->id)->where('order', 0)->first();
            //check if user is logged in
            if (Auth::check()) {
                $offer->watched = WatchedOffer::where('offer_id', $offer->id)->where('user_id', Auth::user()->id)->exists();

            } else {
                $offer->watched = false;
            }
            $offer->auth = Auth::check() ? Auth::user()->id : null;
        }
        $categories = Category::all();
        $attributes = [
            'offers' => $offers,
            'categories' => $categories,
            'conditions' => $this->conditions
        ];
        return view('offers', ['attributes' => $attributes]);
    }
    public function search(Request $request)
    {
        $phrase = $request->input('search');
        // dd($phrase);
        $offerIDs = Offer::where('name', 'LIKE', '%' . $phrase . '%')->get('id');
        $offers = Offer::whereIn('id', $offerIDs)->where('active', true)->get();
        foreach ($offers as $offer) {
            $offer->category = Category::where('id', $offer->category_id)->first();
            $offer->image = image::where('offer_id', $offer->id)->where('order', 0)->first();
            //check if user is logged in
            if (Auth::check()) {
                $offer->watched = WatchedOffer::where('offer_id', $offer->id)->where('user_id', Auth::user()->id)->exists();

            } else {
                $offer->watched = false;
            }
            $offer->auth = Auth::check() ? Auth::user()->id : null;
        }
        $categories = Category::all();
        $attributes = [
            'offers' => $offers,
            'categories' => $categories,
            'conditions' => $this->conditions
        ];
        return view('offers', ['attributes' => $attributes]);
    }
    public function showMine()
    {
        $offerIDs = Offer::where('seller_id', Auth::user()->id)->get('id');
        $offers = Offer::whereIn('id', $offerIDs)->get();
        foreach ($offers as $offer) {
            $offer->category = Category::where('id', $offer->category_id)->get()->first();
            $offer->image = image::where('offer_id', $offer->id)->where('order', 0)->first();
            $offer->watched = WatchedOffer::where('offer_id', $offer->id)->where('user_id', Auth::user()->id)->exists();
            $offer->auth = Auth::check() ? Auth::user()->id : null;
        }
        return view('my-offers', ['offers' => $offers]);
    }
    public function new()
    {
        $categories = Category::all();
        // attributes are composed of $conditions and $categories
        $attributes = [
            'conditions' => $this->conditions,
            'categories' => $categories
        ];
        return view('new-offer', ['attributes' => $attributes]);
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
        $offer->phone_number = str_replace('-', '', ($request->input('phone')));
        $offer->city = $request->input('city');
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
        $offer->images = image::where('offer_id', $offer->id)->orderBy('order', 'asc')->get();
        if (Auth::check()) {
            $offer->watched = WatchedOffer::where('offer_id', $offer->id)->where('user_id', Auth::user()->id)->exists();
        }else{
            $offer->watched = false;
        }
        $offer->seller = User::where('id', $offer->seller_id)->first();
        $offer->opinions = Opinion::where('offer_id', $offer->id)->get();
        foreach ($offer->opinions as $opinion) {
            $opinion->user = User::where('id', $opinion->user_id)->first();
        }
        $offer->auth = Auth::check() ? Auth::user()->id : null;
        // dd($offer);
        return view('components.offer-layout', ['offer' => $offer]);
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
            $offer->auth = Auth::check() ? Auth::user()->id : null;
        }


        // select all offers where id is in previous result


        return view('watched-offers', ['offers' => $offers]);
    }
    public function wishChange($id)
    {
        //if offer is watched by current user, delete it from watched offers, else add it to watched offers
        if (WatchedOffer::where('offer_id', $id)->where('user_id', Auth::user()->id)->exists()) {
            WatchedOffer::where('offer_id', $id)->where('user_id', Auth::user()->id)->delete();
            $watched = false;
        } else {
            $watchedOffer = new WatchedOffer();
            $watchedOffer->offer_id = $id;
            $watchedOffer->user_id = Auth::user()->id;
            $watchedOffer->save();
            $watched = true;
        }
        return response()->json(['watched' => $watched]);
    }
    public function delete($id)
    {
        //delete offer and all its images
        Offer::where('id', $id)->delete();
        image::where('offer_id', $id)->delete();
        return redirect()->back();
    }
    public function edit($id)
    {
        if (Auth::user()->id != Offer::where('id', $id)->first()->seller_id) {
            return redirect()->back();
        }
        //get offer and its images
        $offer = Offer::where('id', $id)->first();
        $offer->images = image::where('offer_id', $offer->id)->orderBy('order', 'asc')->get();
        $offer->category = Category::where('id', $offer->category_id)->first();
        $categories = Category::all();
        // attributes are composed of $conditions and $categories
        $attributes = [
            'conditions' => $this->conditions,
            'categories' => $categories
        ];
        return view('components.edit-offer', ['offer' => $offer, 'attributes' => $attributes]);
    }
    public function saveEdit(Request $request)
    {
        //get data from request, but pass category as its id
        $offer = Offer::where('id', $request->input('id'))->first();
        $offer->name = $request->input('name');
        $offer->description = $request->input('description');
        $offer->quantity = $request->input('quantity');
        $offer->price = $request->input('price');
        $offer->condition = $request->input('condition');
        $offer->phone_number = str_replace('-', '', ($request->input('phone')));
        $offer->city = $request->input('city');
        $offer->category_id = $request->input('category');


        $offer->save();
        return redirect(route("my-offers"));
    }
    public function softDeleteToggle($id)
    {
        //soft delete offer
        $offer = Offer::where('id', $id)->first();
        if ($offer->active) {
            Offer::where('id', $id)->update(['active' => false]);
            return response()->json(['active' => false]);
        } else {
            Offer::where('id', $id)->update(['active' => true]);
            return response()->json(['active' => true]);
        }
    }

}
