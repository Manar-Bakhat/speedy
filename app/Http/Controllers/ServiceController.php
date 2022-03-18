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
        return view('service.index');
    }

    //api route
    public function search(Request $request)
    {
        if ($request->q) {
            $posts = Post::where('service_title', 'LIKE', '%' . $request->q . '%');
        } elseif ($request->category_id) {
            $posts = Post::whereHas('jobber', function ($query) use ($request) {
                return $query->where('jobber_category_id', $request->category_id);
            });
        } elseif ($request->job_level) {
            $posts = Post::where('service_level', 'Like', '%' . $request->service_level . '%');
        } elseif ($request->education_level) {
            $posts = Post::where('education_level', 'Like', '%' . $request->education_level . '%');
        } elseif ($request->employment_type) {
            $posts = Post::where('employment_type', 'Like', '%' . $request->employment_type . '%');
        } else {
            $posts = Post::take(30);
        }

        $posts = $posts->has('jobber')->with('jobber')->paginate(6);

        return $posts->toJson();
    }
    public function getCategories()
    {
        $categories = JobberCategory::all();
        return $categories->toJson();
    }
    public function getAllOrganization()
    {
        $jobbers = Jobber::all();
        return $jobbers->toJson();
    }
    public function getAllByTitle()
    {
        $posts = Post::where('deadline', '>', Carbon::now())->get()->pluck('id', 'service_title');
        return $posts->toJson();
    }
}
