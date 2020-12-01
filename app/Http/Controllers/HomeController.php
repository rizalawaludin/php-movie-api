<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\access_log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function logTest(Request $request)
    {
        return response()->json(access_log::all(),200);
    }
}
