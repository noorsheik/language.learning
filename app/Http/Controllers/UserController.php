<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Elevel;
use App\Models\Tlevel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function show()
    {
        return view('register.signup');
    }

    public function Create()
    {
        
            request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:8|confirmed',// This checks
            // if password matches confirm_password
            ]);

            // Create a new user instance
            $user = User::create([
                'name'=> request('name'),
                'email'=>request('email'),
                'password'=>Hash::make(request('password'))
            ]);

            if (request()->has('remember')) {
                cookie()->queue('remember_user', $user->id, 60 * 24 * 7); // 7 days
            }
            $user->addRole('user');
            //how to see the cookie
            //Right-click your page → Inspect → Application tab
            //Go to Storage → Cookies → your site
            //Look for a cookie named remember_user
             Auth::login($user);
            Session::put('email',request('email'));
            Session::put('name',request('name'));
            return redirect('/')->with('success', 'User registered successfully!');
    }

      public function Out()
    {
         Session::flush();
        return redirect('/')->with('success', 'User Unregistered successfully!');
    }

    public function Show2()
    {
         return view('register.Login');
    }

    public function Enter(Request $request)
    {
                    $log =request()->validate([
                        'email' => 'required|string|email',
                        'password' => 'required|string',
                    ]);
                   
                    if(!Auth::attempt($log)){
                    //    $admin = Admin::where('email',request('email'))->first();
                    //    if($admin){
                    //      if(Hash::check(request('password'), $admin->password)&& $admin->name == request('name')){
                    //         Session::put('email',request('email'));
                    //         Session::put('name',request('name'));
                    //         return view('admin.dashboard',['users'=>MyUser::All(),'finishs'=>finish::All(),'rates'=>rate::All(), 'contacts'=>AdminRate::All(),'images'=>Adminprofile::all()]);
                    //      }
                    //    }

                        throw ValidationException::withMessages([
                        'email' =>'sorry you dont have ana account',
                        
                        ]);
                    };
                    if (request()->has('remember')) {
                        cookie()->queue('remember_user', $user->id, 60 * 24 * 7); // 7 days
                    }
                    $user = User::where('email', request('email'))->first();
                    if (!$user->hasRole($request->role)) {
                                return response()->json(["message" => "user not found"], 404);
                    }

                     $eLevel = elevel::where('email',request('email'))->first();
                    if($eLevel){
                        Session::put('eLevel', $eLevel->level);
                    }
                    $TLevel = Tlevel::where('email',request('email'))->first();
                    if($TLevel){
                        Session::put('TLevel', $TLevel->level);
                    }


                    //how to see the cookie
                    //Right-click your page → Inspect → Application tab
                    //Go to Storage → Cookies → your site
                    //Look for a cookie named remember_user
         
                    
                    request()->session()->regenerate();
                    Session::put('email',request('email'));
                    Session::put('name',request('name'));
                    return redirect('/')->with('success', 'User registered successfully!');
      

    }

}