<?php
//app/Http/Controllers/Pages/UserController.php

namespace App\Http\Controllers\Pages;

use App\Http\Users;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function loginForm(Request $request)
    {
        

        return View::make('login');

    }
    
}