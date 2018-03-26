<?php

namespace App\Http\Controllers;

use App\Object;
use App\Terminal;
use App\Tr_msg;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        return view("home");
    }

    public function test()
    {

        return rq('key');
    }


}

