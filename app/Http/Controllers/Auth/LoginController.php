<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\DashboardController;
class LoginController extends Controller
{
    public function __construct()
    {
        
        $this->middleware(['guest']);
    }
    public function index()
    {
        return view('login.login');
    }
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
            if (!Auth::attempt($request->only('email', 'password'), $request->remember)) {
                return back()->with('status', 'Invalid login details');
            }
             return redirect()->route('posts');
        }
}
