<?php

namespace App\Http\Controllers;

use App\Models\Jobber;
use App\Models\JobberCategory;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(200)->with('jobber')->get();
        $categories = JobberCategory::take(5)->get();
        $topEmployers = Jobber::latest()->take(3)->get();
        return view('service.index')->with([
            'posts' => $posts,
            'categories' => $categories,
            'topEmployers' => $topEmployers,

        ]);
    }

    public function search(){
        $q = request()->input('q');

        $posts = Post::where('service_title', 'like' , "%$q%")
               ->orWhere('service_ville' , 'like',"%$q%")
               ->orWhere('service_zone' , 'like',"%$q%")->get();
        $count = $posts->count();


        return view('post.search', compact('posts','count'));


    }

}
