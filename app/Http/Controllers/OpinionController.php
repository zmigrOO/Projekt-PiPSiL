<?php

namespace App\Http\Controllers;

use App\Models\opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function add(Request $request)
    {

        if ($request->input('review') == null) {
            return redirect()->back()->with('error', 'Opinion cannot be empty');
        }
        //if user is seller of offer, he cannot add opinion
        if ($request->input('user_id') == $request->input('seller_id')) {
            return redirect()->back()->with('error', 'You cannot add opinion to your own offer');
        }
        //if user already added opinion to this offer, he cannot add another one
        $opinion = opinion::where('offer_id', $request->input('id'))->where('user_id', $request->input('user_id'))->first();
        if ($opinion != null) {
            return redirect()->back()->with('error', 'You already added opinion to this offer');
        }
        $opinion = new opinion();
        $opinion->offer_id = $request->input('id');
        $opinion->user_id = $request->input('user_id');
        $opinion->content = $request->input('review');
        $opinion->rating = $request->input('rating');
        $opinion->created_at = now();
        $opinion->save();
        return redirect()->back()->with('success', 'Opinion added');
    }
}