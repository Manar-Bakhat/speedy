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
        $company = auth()->user()->company;

        if ($company) {
            $ids =  $company->posts()->pluck('id');
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

        $company = $post->company()->first();
        return view('service-application.show')->with([
            'applicant' => $applicant,
            'post' => $post,
            'company' => $company,
            'application' => $application
        ]);
    }
    public function destroy(Request $request)
    {
        $application = CarServiceApplication::find($request->application_id);
        $application->delete();
        Alert::toast('Company deleleted', 'warning');
        return redirect()->route('serviceApplication.index');
    }
}
