<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function loginUp(){
        return view('loginUp');
    }
    public function login_post(Request $request){
        $user = User::where('email', '=', $request->email)->first();
        
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('/')->with('success' , 'welcome back admin , login has success');
            } else {
                return back()->withErrors([
                    'email'=> "Email ou mot de passe incorrect."
                ])->onlyInput('email');
            }
        } else {
            return back()->withErrors([
                'email'=> "Email Not found"
            ])->withInput();
        }
    }
    public function logout(){
        $data = array();
        if(Session::has('loginId')){
            Session::pull('loginId');
        }
        return redirect('/login');
    }

    public function password_up(Request $request)
    {
        $user = User::where('email' , 'admin')->first();
        $password = $request->password;
        $password_confirme = $request->password_confirme;
        if ($password === $password_confirme) {
            $user->update(
                [
                    'password' => $password
                ]
            );
            session()->flash('success', 'Password Modifié avec succès.');
        }else{
            session()->flash('error' , 'Passwords do not match');
        }
        return redirect('/loginUp');
    }
}
