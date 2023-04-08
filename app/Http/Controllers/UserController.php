<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Events\UserCreated;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // $user = new User();

        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = \Hash::make($request->password);

        // $save = $user->save();


        // if ($save)
        // {
        //     return redirect('/')->with('Success','You are registered successfully');
        // }
        // else
        // {
        //     return redirect()->back()->with('failed','You are not registered successfully');

        // }

        $user = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'cpassword'=>'required|same:password',
        ]);


        event(new UserCreated($user));
        return redirect('/')->with('Success','You are registered successfully');
    }

    public function check(Request $request)
    {
        $datas = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);

        if (Auth::attempt($datas)){
            $request->session()->regenerate();
            return redirect()->intended('home');
                    }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
