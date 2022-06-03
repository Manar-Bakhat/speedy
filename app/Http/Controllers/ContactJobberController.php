<?php

namespace App\Http\Controllers;

use App\Models\ContactJobber;
use App\Models\ContactReponse;
use App\Models\Jobber;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactJobberController extends Controller
{


    public function index(Request $request){

        $var=ContactJobber::create($request->all());
        Alert::toast('your message created successfully!', 'success');
        return back();
        }


        public function store(){
        $posts = Post::all();
        $jobber = Jobber::where('user_id', auth()->user()->id) ->first() ;
        $users =  User::all();
        $reponses = ContactReponse::all();
        return view('account.view-all-messages' , compact('posts','jobber','users','reponses'));
        }

        public function reponse(Request $request){
            ContactReponse::create($request->all());
            Alert::toast('your message created successfully!', 'success');
            return back();

        }

        public function stored(){
            $posts = Post::all();
            $jobber = Jobber::where('user_id', auth()->user()->id) ->first() ;
            $users =  User::all();
            $reponses = ContactReponse::all();
            return view('account.view-all-messagess' , compact('posts','jobber','users','reponses'));
            }

            public function delete(ContactJobber $message){

                $message->delete();
                Alert::toast('Post successfully deleted!', 'success');
                return back();

            }

            public function deleted(Request $request){
                $contact = ContactJobber::where('id',$request->message) ;
                $contact->delete() ;
                Alert::toast('Post successfully deleted!', 'success');
                return back();

            }







}
