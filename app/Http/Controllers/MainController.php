<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function Dashboard(){
        $user = Cookie::get('c_user');
        return view('Dashboard', ['user' => json_decode($user, true)]);
    }

    public function Consult(){
        $user = Cookie::get('c_user');

        $apt_sched = DB::table('conschedules')
        ->join('users', 'conschedules.instructor_id', '=', 'users.user_id')
        ->select('conschedules.date_time', 'users.user_id', 'users.f_name', 'users.l_name')
        ->get();
    

        return view('Consult', [
            'user' => json_decode($user, true), 
            'apt_sched' => $apt_sched
        ]);
    }
}
