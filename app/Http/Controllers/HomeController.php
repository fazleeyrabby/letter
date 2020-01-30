<?php

namespace App\Http\Controllers;

use App\user_archive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $my_ac = user_archive::where('user_id',Auth::user()->id)->count();
        return view('user.index',compact('my_ac'));
    }
}
