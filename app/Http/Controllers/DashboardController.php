<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;

class DashboardController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('layouts.dashboard.index');
    }
    
    /**
     * Show the view to add a new event
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function newEvent()
    {
        return view('events.create');
    }
    
}
