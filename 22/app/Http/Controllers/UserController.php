<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function store(Request $request)
    {
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];

        $email = $request['email'];

        $validate = $request->validate([
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:15',
            'email' => 'email',
        ]);


        $username = "$first_name $last_name";

        // $cookie = $request->session()->put('username', $username);

        $request->session()->put('username', $username);
        $request->session()->put('last_name', $last_name);
        $request->session()->put('first_name', $first_name);
        $request->session()->put('email', $email);

        return view('info', [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
        ]);
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }

}