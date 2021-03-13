<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDataRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest'); // if user is logged in prevent for new registeration
    }
    //
    public function register(){
        return view('register.register');
    }
    public function store(StoreDataRequest $request){
     $request->validated();//this is the validation function
     User::create([
         'name' => $request->name,
         'username' => $request->username,
         'email' => $request->email,
         'password' => Hash::make($request->password),
     ]);
     
     // sign in 
    Auth::attempt($request->only('email', 'password'));
     return redirect()->route('dashboard');
    }
}
