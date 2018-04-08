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
    
    protected $codas_no;


    public function __construct()
    {
         $this->middleware('auth');
         $this->codas_no = Auth::user()->codas_num()->get();

    }

    
    public function index(Request $request)
    {
    	
    	$user = Auth::user()->account()->get();
    	
    	return response()->json(['status' =>'success', 'result' => $user]);
    
    }


    public function checkSubscription()
    {

        //write curl function to consume microservice

        
        $mostRecentSubscription = strtotime($api->getSubscriptionDate());

        if ($mostRecentSubscription < strtotime('-31 days')) {
            return true;

        }
                
        return false;


    }

}
