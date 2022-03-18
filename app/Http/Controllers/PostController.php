<?php

namespace App\Http\Controllers;

use App\Events\PostViewEvent;
use App\Models\Jobber;
use App\Models\JobberCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->take(20)->with('jobber')->get();
        $categories = JobberCategory::take(5)->get();
        $topEmployers = Jobber::latest()->take(3)->get();
        return view('home')->with([
            'posts' => $posts,
            'categories' => $categories,
            'topEmployers' => $topEmployers
        ]);
    }

    public function create()
    {
        if (!auth()->user()->jobber) {
            Alert::toast('You must create a Jobber first!', 'info');
            return redirect()->route('jobber.create');
        }
        return view('post.create');
    }

    public function store(Request $request)
    {
        $this->requestValidate($request);

        $postData = array_merge(['jobber_id' => auth()->user()->jobber->id], $request->all());

        $post = Post::create($postData);
        if ($post) {
            Alert::toast('Post listed!', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::toast('Post failed to list!', 'warning');
        return redirect()->back();
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        event(new PostViewEvent($post));
        $jobber = $post->jobber()->first();

        $similarPosts = Post::whereHas('jobber', function ($query) use ($jobber) {
            return $query->where('jobber_category_id', $jobber->jobber_category_id);
        })->where('id', '<>', $post->id)->with('jobber')->take(5)->get();
        return view('post.show')->with([
            'post' => $post,
            'jobber' => $jobber,
            'similarJobs' => $similarPosts
        ]);
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $post)
    {
        $this->requestValidate($request);
        $getPost = Post::findOrFail($post);

        $newPost = $getPost->update($request->all());
        if ($newPost) {
            Alert::toast('Post successfully updated!', 'success');
            return redirect()->route('account.authorSection');
        }
        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        if ($post->delete()) {
            Alert::toast('Post successfully deleted!', 'success');
            return redirect()->route('account.authorSection');
        }
        return redirect()->back();
    }

    protected function requestValidate($request)
    {
        return $request->validate([
            'service_title' => 'required|min:3',
            'service_ville' => 'required',
            'service_zone' => 'required',
            'deadline' => 'required',
            'service_specification' => 'required|min:5',

        ]);
    }
}
