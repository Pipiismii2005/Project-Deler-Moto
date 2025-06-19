<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function login(){
        return view('login');
    }
    public function register(){
        return view('register');
    }
    public function submitregister(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login');
    }
    public function submitlogin(Request $request){
        $user = $request->only('email', 'password');
       
        if(Auth::attempt($user)){
            $role = Auth::user()->role;
            if($role == 'admin'){
                return redirect()->route('admin.lihatuser');
                
            }else if($role == 'penjual'){
                return redirect()->route('penjual.lihatkategori');
            }else{
                return redirect()->route('halamanpembeli');
        }
        
    }
    }
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
}
    public function admin(){
        return view('admin.halamanadmin');
    }

     public function penjual(){
        return view('penjual.halamanpenjual');
    }
    public function pembeli(){
        return view('pembeli.prefix');
    }

}