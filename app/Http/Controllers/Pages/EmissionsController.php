<?php

namespace App\Http\Controllers\Pages;

use Illuminate\Http\Request;
use Auth;

class EmissionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth');
    }

    
    public function index(Request $request)
    {
    	
    	$user = Auth::user()->account()->get();
    	
    	return response()->json(['status' =>'success', 'result' => $user]);
    
    }
}
