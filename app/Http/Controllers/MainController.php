<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cookie;


class MainController extends Controller
{
    public function Dashboard(){
        $user = Cookie::get('c_user');
        return view('Dashboard', ['user' => json_decode($user, true)]);
    }

    public function Consult(){
        $user = Cookie::get('c_user');
        return view('Consult', ['user' => json_decode($user, true)]);
    }
}
