<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function Dashboard(){
        $user = Cookie::get('c_user');
        $subjects = DB::table('instructor_subjects as i_subject')
        ->join('users', 'i_subject.instructor_id', '=', 'users.user_id')
        ->join('subjects', 'i_subject.subject_id', '=', 'subjects.subject_id')
        ->select('users.f_name', 'users.l_name', 'subjects.sub_code', 'subjects.subject_name', 'subjects.sched_time')
        ->get();
        return view('Dashboard', [
            'user' => json_decode($user, true),
            'subjects' => $subjects 
        ]);
    }

    public function Consult(){
        $user = Cookie::get('c_user');

        $apt_sched = DB::table('conschedules')
        ->join('users', 'conschedules.instructor_id', '=', 'users.user_id')
        ->select('conschedules.date_time', 'users.user_id', 'users.f_name', 'users.l_name')
        ->get();

        $apt = DB::table('appointments as apt')
        ->join('users as usr1', 'apt.student_id', '=', 'usr1.user_id')
        ->join('users as usr2', 'apt.instructor_id', '=', 'usr2.user_id')
        ->select('apt.apt_id','apt.concern', 'usr1.f_name as sf_name', 'usr1.l_name as sl_name', 'usr2.f_name as if_name', 'usr2.l_name as il_name')
        ->get();

        return view('Consult', [
            'user' => json_decode($user, true), 
            'apt_sched' => $apt_sched,
            'apt' => $apt
        ]);
    }
}
