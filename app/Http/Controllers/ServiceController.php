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

     /*
        foreach($posts as $post){
            $sum = 0;
            echo $post->service_title .'<br/>';

            foreach($post->useres as $usere){

                $result = $usere->pivot->stars_rated;
                $sum = $sum + $result;


                echo $usere->name .'<br/>=================================================<br/>';

            }
            if($post->useres->count()>0){
            $moy = $sum/$post->useres->count();
            dump($moy);
            }

        }
        dd();
        */






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
