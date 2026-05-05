<?php

namespace App\Http\Controllers;
use App\Models\Tlevel;
use App\Models\Turkey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TurkeyController extends Controller
{
    public function show(){
        return view('turkey.prepare');
    }

    public function test(){
        return view('turkey.ttest');
    }

     
    public function store(Request $request)
    {
      
        if ((int) request('beginnerScore') < 3) {
            Tlevel::create([
                'email' => Session::get('email'),
                'level' => 'beginner',
                'mark' => (int)request('totalScore')  // fixed typo: "marl" → "mark"
            ]);
             Session::put('TLevel', 'beginner');
        }elseif((int) request('intermediateScore')<3 && (int) request('beginnerScore')>3){
            Tlevel::create([
                'email' => Session::get('email'),
                'level' => 'intermediate',
                'mark' => (int)request('totalScore')  // fixed typo: "marl" → "mark"
            ]);
            Session::put('TLevel', 'intermediate');
        }elseif((int) request('expertScore')<3 && (int) request('intermediateScore')>3){
            Tlevel::create([
                'email' => Session::get('email'),
                'level' => 'expert',
                'mark' => (int)request('totalScore')  // fixed typo: "marl" → "mark"
            ]);
            Session::put('TLevel', 'expert');
        }else{
            Tlevel::create([
                'email' => Session::get('email'),
                'level' => 'passed',
                'mark' => (int)request('totalScore')  // fixed typo: "marl" → "mark"
            ]);
            Session::put('TLevel', 'passed');
        }

         return response()->json(['status' => 'success', 'session' => session('yes')]);
 
    }

    public function main(){
       $games = Turkey::All();
        return view('Turkey.main',['tests'=>$games]);
    }

    public function letters(){
        return view('Turkey.letters');
    }
    
    public function present(){
        return view('Turkey.present');
    }

    public function irregular(){
        return view('Turkey.irregularverbs');
    }

}
