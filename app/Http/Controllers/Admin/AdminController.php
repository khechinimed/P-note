<?php


namespace App\Http\Controllers\Admin;

use App\Http\Middleware\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
		    $this->middleware('admin');
    }

    /**
     * Show the Admin Login Page.
     *
     * @return \Illuminate\Http\App
     */
    public function index()
    {
        return view('admin/index');
    }


}
