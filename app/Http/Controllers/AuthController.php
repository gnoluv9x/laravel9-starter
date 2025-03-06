<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        try {
            $user = User::where('email', $request->get('email'))->where('password', $request->get('password'))->firstOrFail();

            $request->session()->put('name', $user->name);
            $request->session()->put('email', $user->email);
            $request->session()->put('role', $user->role);

            return redirect()->route('courses.index');
        } catch (\Throwable $th) {
            return back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    public function processLogout()
    {
        session()->flush();

        return redirect()->route('login');
    }
}
