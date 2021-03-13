<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);// prevent user from getting in if not logged in
    }
    // send mail
    public function index(){
        
        return view('dashboard.dashboard');
    }
    // send mail after post liked
}
