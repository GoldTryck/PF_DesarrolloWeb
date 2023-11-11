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
            'password' => bcrypt($request->password),
            'role_id' => 2,    
        ]);

        return to_route('login')->with('status', '¡Cuenta creada exitosamente!');
    }
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function destroy(User $user)
        {
        $user->delete();
        return to_route('users.index')->with('status', 'Usuario Eliminado!');
    }
}