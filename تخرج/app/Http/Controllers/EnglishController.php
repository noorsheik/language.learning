<?php

namespace App\Http\Controllers;
use App\Models\Elevel;
use App\Models\English;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EnglishController extends Controller
{
    public function show(){
        return view('english.prepare');
    }

    public function test(){
        return view('english.etest');
    }

    
    public function store(Request $request)
    {
      
        if ((int) request('beginnerScore') < 3) {
            Elevel::create([
                'email' => Session::get('email'),
                'level' => 'beginner',
                'mark' => (int)request('totalScore')  // fixed typo: "marl" → "mark"
            ]);
             Session::put('eLevel', 'beginner');
        }elseif((int) request('intermediateScore')<3 && (int) request('beginnerScore')>3){
            Elevel::create([
                'email' => Session::get('email'),
                'level' => 'intermediate',
                'mark' => (int)request('totalScore')  // fixed typo: "marl" → "mark"
            ]);
            Session::put('eLevel', 'intermediate');
        }elseif((int) request('expertScore')<3 && (int) request('intermediateScore')>3){
            Elevel::create([
                'email' => Session::get('email'),
                'level' => 'expert',
                'mark' => (int)request('totalScore')  // fixed typo: "marl" → "mark"
            ]);
            Session::put('eLevel', 'expert');
        }else{
            Elevel::create([
                'email' => Session::get('email'),
                'level' => 'passed',
                'mark' => (int)request('totalScore')  // fixed typo: "marl" → "mark"
            ]);
            Session::put('eLevel', 'passed');
        }

         return response()->json(['status' => 'success', 'session' => session('yes')]);
 
    }

    public function main(){
       $games = English::All();
        return view('english.main',['tests'=>$games]);
    }

    public function letters(){
        return view('english.letters');
    }

    public function psimple(){
        return view('english.present_simple');
    }

    public function pastsimple(){
        return view('english.past_simple');
    }

    public function pastverbs(){
        return view('english.irregular');
    }

    public function pastverbsPost(){
   
        if(request('option1')=='3' &&request('option2')=='1'
         &&request('option3')=='2' &&request('option4')=='2'
          ){        
               session()->flash('message321', 'You succeeded ');
                       
            }else{
             
                session()->flash('message321', 'You failed ');
            }
            return redirect()->back();
    
    }



}
