<?php

namespace App\Http\Controllers;

use App\Models\Login;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:250',
    //         'email' => 'required|email|max:250|unique:users',
    //         'password' => 'required|min:8|confirmed'
    //     ]);

    //     User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password)
    //     ]);

    //     $credentials = $request->only('email', 'password');
    //     Auth::attempt($credentials);
    //     $request->session()->regenerate();
    //     return redirect()->route('dashboard')
    //     ->withSuccess('You have successfully registered & logged in!');
    // }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = Login::where('v_username', $request->username)->where('v_password', $request->password)->take(1)->get();

        if ($user)
        {
            $request->session()->regenerate();
            
            return response()->json([
                'message'   => 'Success',
                'data'      => []
            ], 200);
        }

        return response()->json([
            'message'   => 'Failed Auth',
            'data'      => []
        ], 500);

    } 
}
