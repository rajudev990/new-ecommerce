<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|',
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->user_type === 'admin') {
                return redirect()->route('admin.dashboard')->with('success','Login Successfully !!!');
            } else {
                Auth::logout();
                return back()->with('error', 'You are not authorized to access admin panel!');
            }
        }

        return back()->with('error', 'Invalid email or password.');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully!');
    }
}