<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function makeID()
    {
        $randomDigits = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
        $currentYear = date('Y');
        $uniqueID = $currentYear . $randomDigits;
        return $uniqueID;
    }

    public function ViewForm(){
        return view('Form');
    }

    public function ViewSignup($role)
    {
        return view('Signup', ['role' => $role]);
    }

    public function Signup(Request $request)
    {
        // validations are handled in Middleware
        $user = new User;
        $user->user_id = $this->makeID();
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;
        $user->save();

        return response()->json(['success' => "user created", "role" => $request->role], 200);
    }

    public function ViewLogin($role)
    {
        return view('Login', ['role' => $role]);
    }

    public function Login(Request $request)
    {
        // validation is in middleware
        $user = $request->user;

        $userData = [
            'user_id' => $user->user_id,
            'f_name' => $user->f_name,
            'l_name' => $user->l_name,
            'email' => $user->email,
            'role' => $user->role,
        ];
        $cookie = Cookie::make('c_user', json_encode($userData), 60);

        Auth::login($user);

        return response()->json(['success' => "user logged in"], 200)->withCookie($cookie);
    }
}
