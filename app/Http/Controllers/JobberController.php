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
        $this->validateCompany($request);

        $jobber = new jobber();
        if ($this->companySave($jobber, $request)) {
            Alert::toast('Company created! Now you can add posts.', 'success');
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
        $company = auth()->user()->company;
        $categories = JobberCategory::all();
        return view('jobber.edit', compact('jobber', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $this->validateCompanyUpdate($request);

        $company = auth()->user()->company;
        if ($this->companyUpdate($company, $request)) {
            Alert::toast('Jobber created!', 'success');
            return redirect()->route('account.authorSection');
        }
        Alert::toast('Failed!', 'error');
        return redirect()->route('account.authorSection');
    }

    protected function validateCompany(Request $request)
    {
        return $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'logo' => 'required|image|max:2999',
            'category' => 'required',
            'website' => 'required|string',
            'cover_img' => 'sometimes|image|max:3999'
        ]);
    }
    protected function validateCompanyUpdate(Request $request)
    {
        return $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:5',
            'logo' => 'someiimes|image|max:2999',
            'category' => 'required',
            'website' => 'required|string',
            'cover_img' => 'sometimes|image|max:3999'
        ]);
    }
    protected function companySave(Jobber $company, Request $request)
    {
        $company->user_id = auth()->user()->id;
        $company->title = $request->title;
        $company->description = $request->description;
        $company->company_category_id = $request->category;
        $company->website = $request->website;

        //logo
        $fileNameToStore = $this->getFileName($request->file('logo'));
        $logoPath = $request->file('logo')->storeAs('public/companies/logos', $fileNameToStore);
        if ($company->logo) {
            Storage::delete('public/companies/logos/' . basename($company->logo));
        }
        $company->logo = 'storage/companies/logos/' . $fileNameToStore;

        //cover image
        if ($request->hasFile('cover_img')) {
            $fileNameToStore = $this->getFileName($request->file('cover_img'));
            $coverPath = $request->file('cover_img')->storeAs('public/companies/cover', $fileNameToStore);
            if ($company->cover_img) {
                Storage::delete('public/companies/cover/' . basename($company->cover_img));
            }
            $company->cover_img = 'storage/companies/cover/' . $fileNameToStore;
        } else {
            $company->cover_img = 'nocover';
        }

        if ($company->save()) {
            return true;
        }
        return false;
    }

    protected function jobberUpdate(Jobber $jobber, Request $request)
    {
        $jobber->user_id = auth()->user()->id;
        $jobber->title = $request->title;
        $jobber->description = $request->description;
        $jobber->company_category_id = $request->category;
        $jobber->website = $request->website;

        //logo should exist but still checking for the name
        if ($request->hasFile('logo')) {
            $fileNameToStore = $this->getFileName($request->file('logo'));
            $logoPath = $request->file('logo')->storeAs('public/companies/logos', $fileNameToStore);
            if ($company->logo) {
                Storage::delete('public/companies/logos/' . basename($company->logo));
            }
            $company->logo = 'storage/companies/logos/' . $fileNameToStore;
        }

        //cover image
        if ($request->hasFile('cover_img')) {
            $fileNameToStore = $this->getFileName($request->file('cover_img'));
            $coverPath = $request->file('cover_img')->storeAs('public/companies/cover', $fileNameToStore);
            if ($jobber->cover_img) {
                Storage::delete('public/companies/cover/' . basename($jobber->cover_img));
            }
            $jobber->cover_img = 'storage/companies/cover/' . $fileNameToStore;
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
        Storage::delete('public/companies/logos/' . basename(auth()->user()->company->logo));
        if (auth()->user()->company->delete()) {
            return redirect()->route('account.authorSection');
        }
        return redirect()->route('account.authorSection');
    }
}
