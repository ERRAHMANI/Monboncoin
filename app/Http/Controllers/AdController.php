<?php

namespace App\Http\Controllers;
use App\Ad;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdStore;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
// use Auth;

class AdController extends Controller
{
    use RegistersUsers;
    public function create()
    {
       return view('create');
    }

    public function store(AdStore $request)
    {
        // dd(!Auth::check());
        $validated = $request ->validated();

          if(!Auth::check()) {
            //   dd('ddddddd');
              $request->validate([
                  'name'                         => 'required|unique:users',
                  'email'                        => 'required|email|unique:users',
                  'password'                      => 'required|confirmed',
                  'password_confirmation'         =>'required',
              ]);

            $user =  User::create([
                  'name' => $request['name'],
                  'email' => $request['email'],
                  'password' => Hash::make($request['password']),
              ]);

              $this->guard()->login($user);

          }

           
            $ad = new Ad(); 
            $ad->title = $validated['title'];
            $ad->description = $validated['description'];
            $ad->price = $validated['price'];     
            $ad->localisation = $validated['localisation'];
            $ad->user_id = auth()->user()->id;

           
            //   dd($ad);
            $ad->save();

           return redirect()->route('welcome')->with('success', 'Votre annonce a été postée.');
       
    }
}
