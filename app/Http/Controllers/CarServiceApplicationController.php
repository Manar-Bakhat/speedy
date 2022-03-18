<?php

namespace App\Http\Controllers;

use App\Models\CarServiceApplication;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CarServiceApplicationController extends Controller
{
    public function index()
    {
        $applicationsWithPostAndUser = null;
        $jobber = auth()->user()->jobber;

        if ($jobber) {
            $ids =  $jobber->posts()->pluck('id');
            $applications = CarServiceApplication::whereIn('post_id', $ids);
            $applicationsWithPostAndUser = $applications->with('user', 'post')->latest()->paginate(10);
        }

        return view('service-application.index')->with([
            'applications' => $applicationsWithPostAndUser,
        ]);
    }
    public function show($id)
    {
        $application = CarServiceApplication::find($id);

        $post = $application->post()->first();
        $userId = $application->user_id;
        $applicant = User::find($userId);

        $jobber = $post->jobber()->first();
        return view('service-application.show')->with([
            'applicant' => $applicant,
            'post' => $post,
            'jobber' => $jobber,
            'application' => $application
        ]);
    }
    public function destroy(Request $request)
    {
        $application = CarServiceApplication::find($request->application_id);
        $application->delete();
        Alert::toast('jobber deleleted', 'warning');
        return redirect()->route('serviceApplication.index');
    }
}
