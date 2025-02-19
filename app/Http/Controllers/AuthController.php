<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\Table;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function index()
    {   
        $table = Table::paginate(5);
        return view('login', ['datas'=>$table]);
    }

    function signup()
    {
        return view('signup');
    }

    function validate_signup(AuthRequest $request)
    {
        $data = $request->all();
        User::create([
            'name'  =>  $data['name'],
            'email' =>  $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return redirect('login')->with('success', 'signup Completed, now you can login');
    }

    function validate_login(AuthRequest $request)
    {
        // $request->validate([
        //     'email' =>  'required',
        //     'password'  =>  'required'
        // ]);

        $credit = $request->only('email', 'password');

        if(Auth::attempt($credit))
        {
            return redirect('dashboard');
        }

        return redirect('login')->with('failed', 'Login details are not valid');
    }

    function dashboard()
    {
        if(Auth::check())
        {
            return view('students.table',[
                'datas' => Table::paginate(5),
            ]);
        }

        return redirect('login')->with('failed', 'you are not allowed to access');
    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
