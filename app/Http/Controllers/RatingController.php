<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Rating;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RatingController extends Controller
{

    public function add(Request $request){




        Rating::create([
            'post_id'=> $request->post_id,
            'user_id' => $request->user_id,
            'stars_rated' => $request->product_rating,
            'message' => $request->message,
        ]);
        Alert::toast('Review created Successfully!', 'success');
        return back();

}

public function update(Request $request){

    $var = Rating::where('post_id','=',$request->post_id)->where('user_id','=', $request->user_id)->first();

    $var->post_id = $request->post_id;
    $var->user_id = $request->user_id;
    $var->stars_rated = $request->product_rating;
    $var->message = $request->message;

    $var->save();
    Alert::toast('Review updated Successfully!', 'success');



    return back();

}





}


