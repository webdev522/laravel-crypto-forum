<?php

namespace App\Http\Controllers;

use App\post;
use App\thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiControllerController extends Controller
{

    public function fetch_forum()
    {
        return view('home');
    }
}