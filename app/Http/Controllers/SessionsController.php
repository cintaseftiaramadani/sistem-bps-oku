<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email'=>'required|email',
            'password'=>'required' 
        ]);

        if(Auth::attempt($attributes))
        {
            session()->regenerate();
            return redirect('beranda')->with(['success'=>'Kamu sudah masuk.']);
        }
        else{

            return back()->withErrors(['email'=>'Email atau password salah.']);
        }
    }
    
    public function destroy()
    {
        Auth::logout();

        return redirect('/login')->with(['success'=>'Kamu sudah keluar.']);
    }

    public function formPassword()
    {
        return view('session/ganti_password'); // tampilan form ganti password
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);
        
        /** @var \App\Models\User $user */
        $user = auth()->user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Kata Sandi lama salah.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Kata Sandi berhasil diperbarui.');
    }
}
