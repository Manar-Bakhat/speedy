<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class savedServiceController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->posts;
        return view('account.saved-service', compact('posts'));
    }
    public function store($id)
    {
        $user = User::find(auth()->user()->id);
        $hasPost = $user->posts()->where('id', $id)->get();
        //check if the post is already saved
        if (count($hasPost)) {
            Alert::toast('You already have saved this service!', 'success');
            return redirect()->back();
        } else {
            Alert::toast('Service successfully saved!', 'success');
            $user->posts()->attach($id);
            return redirect()->route('savedService.index');
        }
    }
    public function destroy($id)
    {
        $user = User::find(auth()->user()->id);
        $user->posts()->detach($id);
        Alert::toast('Deleted Saved service!', 'success');
        return redirect()->route('savedService.index');
    }
}
