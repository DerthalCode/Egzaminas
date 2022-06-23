<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Helpdesk;


class HelpdeskController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except'=>['index','register']]);
    }

    public function index(){
        return view('main');
    }
    public function addRequest(){
        return view('pages.add-request');
    }

    public function storeRequest(Request $request){

        //dd(request()->all());
        
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description'=>'required',
            'logo'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if(request()->hasFile('logo')){
            $path = $request->file('logo')->store('public/image');
            $fileName = str_replace('public/','',$path);
        }else{
            $fileName = NULL;
        }

        Helpdesk::create([
            'title'=>request('title'),
            'description'=>request('description'),
            'logo'=>$fileName,
            'user_id'=>Auth::id()
        ]);
        return redirect('/');
    }
}
