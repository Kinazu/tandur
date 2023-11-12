<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    public function register()
    {
        return view('auth/register');
    }

    //
    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ])->validate();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'Admin'
        ]);
        
        return redirect()->route('login');
    }

    public function login() 
    {
return view('auth/login');
    }
    
    public function loginAction(Request $request)
    {
    $input = $request->all();

    $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
        if (auth()->user()->type == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (auth()->user()->type == 'supplier') {
            return redirect()->route('supplier.dashboard');
        } else {
            return redirect()->route('dashboard');
        }
    } else {
        return redirect()->route('login')
            ->with('error', 'Email-Address And Password Are Wrong.');
    }
}

    public function logout (Request $request) 
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function profile ()
    {
        return view('profile');
    }

    public function karyawan ()
    {
        return view('users');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }
}