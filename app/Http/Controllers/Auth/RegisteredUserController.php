<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return View
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Create a new user instance.
     *
     * @param array $data
     * @return User
     */
    protected function createUser(array $data): User
    {
        return User::create([
            'first_name' => $data['first_name'],
            'pseudo' => $data['pseudo'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'pseudo' => ['required', 'string', 'max:255', 'unique:users,pseudo'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $data = $request->only('first_name', 'pseudo', 'email', 'password');
        $user = $this->createUser($data);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
