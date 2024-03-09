<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cookie;


class MainController extends Controller
{
    public function Main(){
        $user = Cookie::get('user_data');
        return view('Main', ['user' => json_decode($user, true)]);
    }
}
