<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Jobber;
use App\Models\CarServiceApplication;
use Carbon\Carbon;

class AuthorController extends Controller
{
    /** Author dashboard */
    public function authorSection()
    {
        $livePosts = null;
        $jobber = null;
        $applications = null;

        if ($this->hasJobber()) {
            //without the if block the posts relationship returns error
            $jobber = auth()->user()->jobber;
            $posts = $jobber->posts()->get();

            if ($jobber->posts->count()) {
                $livePosts = $posts->where('deadline', '>', Carbon::now())->count();
                $ids = $posts->pluck('id');
                $applications = CarServiceApplication::whereIn('post_id', $ids)->get();
            }
        }

        //doesnt have company
        return view('account.author-section')->with([
            'jobber' => $jobber,
            'applications' => $applications,
            'livePosts' => $livePosts
        ]);
    }

    // Author Employer panel
    //employer is company of author
    public function employer($employer)
    {
        $jobber = jobber::where('id',$employer)->first();
        return view('account.employer')->with([
            'jobber' => $jobber,
        ]);
    }

    //check if has company
    protected function hasJobber()
    {
        return auth()->user()->jobber ? true : false;
    }
}
