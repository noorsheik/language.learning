<?php

namespace App\Http\Controllers;
use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RateController extends Controller
{
    public function view(){
        return view('rate',['rates'=>rate::all()]);
    }

     public function rate(Request $request)
    {
   
        $validator = Validator::make($request->all(), [
            'email'   => 'required|email|max:255',
            'rating'  => 'required|integer|between:1,5',
            'comment' => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        Rate::create([
            'email'   => $request->email,
            'rate'  => $request->rating,
            'feedback' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Thank you for your rating! ❤️');
    }
}
