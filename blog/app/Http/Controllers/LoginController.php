<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index( Request $request)
    {
        return view('login.index');
    }

    /**
     * Display the specified resource.
     */
    public function store(Request $request)
    {
        return redirect()->route('user');
    }


}
