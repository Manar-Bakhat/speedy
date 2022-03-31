<?php

namespace App\Http\Controllers;

use App\Models\Jobber;
use App\Models\JobberCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class JobberController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->jobber) {
            Alert::toast('You already have a jobber!', 'info');
            return $this->edit();
        }
        $categories = JobberCategory::all();
        return view('jobber.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateJobber($request);

        $jobber = new jobber();
        if ($this->jobberSave($jobber, $request)) {
            Alert::toast('Your Profile created! Now you can add posts.', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::toast('Failed!', 'error');
        return redirect()->route('account.authorSection');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $jobber = auth()->user()->jobber;
        $categories = JobberCategory::all();
        return view('jobber.edit', compact('jobber', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $this->validateJobberUpdate($request);

        $jobber = auth()->user()->jobber;
        if ($this->jobberUpdate($jobber, $request)) {
            Alert::toast('Jobber updated!', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::toast('Failed!', 'error');
        return redirect()->route('account.authorSection');
    }

    protected function validateJobber(Request $request)
    {
        return $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'photo' => 'required|image|max:2999',
            'age' => 'required',
            'phone' => 'required',
            'category' => 'required',
            'facebook' => 'required|string',
            'cover_img' => 'sometimes|image|max:3999'
        ]);
    }
    protected function validateJobberUpdate(Request $request)
    {
        return $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'photo' => 'someiimes|image|max:2999',
            'age' => 'required',
            'phone' => 'required',
            'category' => 'required',
            'facebook' => 'required|string',
            'cover_img' => 'sometimes|image|max:3999'
        ]);
    }
    protected function jobberSave(Jobber $jobber, Request $request)
    {
        $jobber->user_id = auth()->user()->id;
        $jobber->title = $request->title;
        $jobber->description = $request->description;
        $jobber->jobber_category_id = $request->category;
        $jobber->facebook = $request->facebook;
        $jobber->age = $request->age;
        $jobber->phone = $request->phone;

        //logo
        $fileNameToStore = $this->getFileName($request->file('photo'));
        $logoPath = $request->file('photo')->storeAs('public/jobbers/logos', $fileNameToStore);
        if ($jobber->photo) {
            Storage::delete('public/jobbers/logos/' . basename($jobber->photo));
        }
        $jobber->photo = 'storage/jobbers/logos/' . $fileNameToStore;

        //cover image
        if ($request->hasFile('cover_img')) {
            $fileNameToStore = $this->getFileName($request->file('cover_img'));
            $coverPath = $request->file('cover_img')->storeAs('public/jobbers/cover', $fileNameToStore);
            if ($jobber->cover_img) {
                Storage::delete('public/jobbers/cover/' . basename($jobber->cover_img));
            }
            $jobber->cover_img = 'storage/jobbers/cover/' . $fileNameToStore;
        } else {
            $jobber->cover_img = 'nocover';
        }

        if ($jobber->save()) {
            return true;
        }
        return false;
    }

    protected function jobberUpdate(Jobber $jobber, Request $request)
    {
        $jobber->user_id = auth()->user()->id;
        $jobber->title = $request->title;
        $jobber->description = $request->description;
        $jobber->jobber_category_id = $request->category;
        $jobber->facebook = $request->facebook;
        $jobber->age = $request->age;
        $jobber->phone = $request->phone;

        //logo should exist but still checking for the name
        if ($request->hasFile('photo')) {
            $fileNameToStore = $this->getFileName($request->file('photo'));
            $logoPath = $request->file('photo')->storeAs('public/jobbers/logos', $fileNameToStore);
            if ($jobber->logo) {
                Storage::delete('public/jobbers/logos/' . basename($jobber->photo));
            }
            $jobber->photo = 'storage/jobbers/logos/' . $fileNameToStore;
        }

        //cover image
        if ($request->hasFile('cover_img')) {
            $fileNameToStore = $this->getFileName($request->file('cover_img'));
            $coverPath = $request->file('cover_img')->storeAs('public/jobbers/cover', $fileNameToStore);
            if ($jobber->cover_img) {
                Storage::delete('public/jobbers/cover/' . basename($jobber->cover_img));
            }
            $jobber->cover_img = 'storage/jobbers/cover/' . $fileNameToStore;
        }
        $jobber->cover_img = 'nocover';
        if ($jobber->save()) {
            return true;
        }
        return false;
    }
    protected function getFileName($file)
    {
        $fileName = $file->getClientOriginalName();
        $actualFileName = pathinfo($fileName, PATHINFO_FILENAME);
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        return $actualFileName . time() . '.' . $fileExtension;
    }

    public function destroy()
    {
        Storage::delete('public/jobbers/logos/' . basename(auth()->user()->jobber->photo));
        if (auth()->user()->jobber->delete()) {
            return redirect()->route('account.authorSection');
        }
        return redirect()->route('account.authorSection');
    }
}
