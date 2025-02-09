<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getSignup()
    {
        return view('Christopher_IT_Accessories.signup');
    }

    public function postSignup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $user = User::create($data);

        if ($user)
            return redirect('/Christopher_IT_Accessories/signin')->with(["success" => "register successful"]);

        else
            return back()->withErrors(['errors' => "register fail! Try again"]);
    }

    public function getSignin()
    {
        return view('Christopher_IT_Accessories.signin');
    }


    public function postSignin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where(['email' => $request->email])->first(); //email exist??

        if ($user) {
            $result = $request->only('email', 'password'); //user exist??

            if (Auth::attempt($result)) {
                $request->session()->put('user', $user);
                return redirect('/Christopher_IT_Accessories')->with(['success' => "login successful"]);
            }
            return back()->withErrors(['errors' => "email and password do not match"]);
        }
        return back()->withErrors(['errors' => "email does not exist"]);
    }

    public function logout()
    {
        session()->forget('user');
        return redirect('/Christopher_IT_Accessories/signin');
    }

    public function aboutUs()
    {
        return view('Christopher_IT_Accessories.about');
    }

    public function contactUs()
    {
        if (session()->has('user')) {
            $user = User::where('id', session()->get('user')->id)->get();
            return view('Christopher_IT_Accessories.contactus', ['users' => $user]);
        }
        return redirect('/Christopher_IT_Accessories/signin');
    }

    public function saveMessage(Request $request)
    {
        $data = new Message();
        $data->user_id = session()->get('user')->id;
        $data->message = $request->message;
        $data->save();
        return redirect('/Christopher_IT_Accessories/contactus')->withErrors(['errors' => 'Your message send']);
    }
}