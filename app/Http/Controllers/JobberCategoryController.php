<?php

namespace App\Http\Controllers;

use App\Models\JobberCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class JobberCategoryController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|min:5'
        ]);
        JobberCategory::create([
            'category_name' => $request->jobber_name
        ]);
        Alert::toast('Category Created!', 'success');
        return redirect()->route('account.dashboard');
    }

    public function edit(JobberCategory $jobber)
    {
        return view('jobber-category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|min:5'
        ]);
        $category = JobberCategory::find($id);
        $category->update([
            'category_name' => $request->category_name
        ]);
        Alert::toast('Category Updated!', 'success');
        return redirect()->route('account.dashboard');
    }

    public function destroy($id)
    {
        $category = JobberCategory::find($id);
        $category->delete();
        Alert::toast('Category Delete!', 'success');
        return redirect()->route('account.dashboard');
    }
}
