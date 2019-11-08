<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkout;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(Checkout::all());
        return view('home', [
            'checkedbooks' => Checkout::all()
        ]);
    }

    
}
