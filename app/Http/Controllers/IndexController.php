<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function note_index(){

      return view('pages.note');

    }
}
