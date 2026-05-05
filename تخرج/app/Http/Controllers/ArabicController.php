<?php

namespace App\Http\Controllers;
use App\Models\Arabic;
use App\Models\Arab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ArabicController extends Controller
{
     public function show(){
        return view('arabic.prepare');
    }

     public function test(){
        return view('arabic.atest');
    }

     
    public function store(Request $request)
    {
      
        if ((int) request('beginnerScore') < 3) {
            Arabic::create([
                'email' => Session::get('email'),
                'level' => 'beginner',
                'mark' => (int)request('totalScore')  // fixed typo: "marl" → "mark"
            ]);
             Session::put('ALevel', 'beginner');
        }elseif((int) request('intermediateScore')<3 && (int) request('beginnerScore')>3){
            Arabic::create([
                'email' => Session::get('email'),
                'level' => 'intermediate',
                'mark' => (int)request('totalScore')  // fixed typo: "marl" → "mark"
            ]);
            Session::put('ALevel', 'intermediate');
        }elseif((int) request('expertScore')<3 && (int) request('intermediateScore')>3){
            Arabic::create([
                'email' => Session::get('email'),
                'level' => 'expert',
                'mark' => (int)request('totalScore')  // fixed typo: "marl" → "mark"
            ]);
            Session::put('ALevel', 'expert');
        }else{
            Arabic::create([
                'email' => Session::get('email'),
                'level' => 'passed',
                'mark' => (int)request('totalScore')  // fixed typo: "marl" → "mark"
            ]);
            Session::put('ALevel', 'passed');
        }

         return response()->json(['status' => 'success', 'session' => session('yes')]);
 
    }

    public function main(){
       $games =  Arab::All();
        return view('arabic.main',['tests'=>$games]);
    }

    public function letters(){
        return view('arabic.letters');
    }

    public function letters2(){
        return view('arabic.letters2');
    }

    public function Grammer1(){
        return view('arabic.grammer1');
    }

    public function GrammerOne(){
         if(request('option1')=='1' &&request('option2')=='3'
         &&request('option3')=='2' &&request('option4')=='1'
          ){        
               session()->flash('message321', 'You succeeded ');
                       
            }else{
             
                session()->flash('message321', 'You failed ');
            }
            return redirect()->back();
    
    }

    public function listen(){
        return view('arabic.listening');
    }
    
    public function listenn()
    {
           if(request('option1')=='منزل كبير ذو إطلالة خلابة وسماء زرقاء وطيور مغردة'  ){
              session()->flash('message3211', 'You succeeded ');
            
            }else{
              session()->flash('message3211', 'You failed ');
            }
            return redirect()->back();
    }
   
}
