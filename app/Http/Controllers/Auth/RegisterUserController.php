<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255','unique:users'],
            'email'=> ['required','string','confirmed','email','max:255', 'unique:users'],
            'password'=> ['required','confirmed', Rules\Password::defaults()],
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)    
        ]);

        return to_route('login')->with('status', '¡Cuenta creada exitosamente!');
    }
}