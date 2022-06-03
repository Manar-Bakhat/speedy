<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{

    public function create(Request $request ){

        Contact::create($request->all());
        Alert::toast('your message created successfully!', 'success');
        return back();
    }
}
