<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Prop;
use App\Models\User;
use App\Models\UserRole;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Http\Requests\Auth\RegisterRequest;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('_lvz.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request, Prop $prop): RedirectResponse
    {
        if (!(int) $prop->getProp('app_mode')) {
            return back()->withInput()->withErrors(['status' => 'Регистрация недоступна']);
        }

        $user = User::create([
            'name' => $request->registerName,
            'email' => $request->registerEmail,
            'password' => Hash::make($request->registerPassword),
        ]);

        if ($user) {
            UserRole::create([
                'user_id' => $user->id,
                'role_id' => 1
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
