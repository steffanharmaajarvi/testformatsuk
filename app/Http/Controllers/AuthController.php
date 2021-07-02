<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    /**
     * Отображаем форму регистрации
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function register ()
    {

        return view('register');

    }

    /**
     * Валидация данных и отправка их в БД
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function proceedRegister (RegisterRequest $request)
    {

        $validated = $request->validated();

        $user = new User();

        $user->password = Hash::make($validated['password']);
        $user->first_name = $validated['first_name'];
        $user->last_name = $validated['last_name'];
        $user->email = $validated['email'];

        $registration = $user->save();

        if ( $registration ) {

            return redirect()->route('dashboard')->with('success', 'Вы успешно зарегистрировались!');

        }

        return false;


    }


    /**
     * Отображаем форму авторизации
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function login ()
    {

        return view('login');

    }

    /**
     * Валидация данных и проверка пользователя в БД
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function proceedLogin (LoginRequest $request)
    {

        $validated = $request->validated();

        if ( Auth::attempt( $validated ) ) {

            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'Неправильный логин и/или пароль!',
        ]);


    }

    /**
     * Выход из аккаунта
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function logout ()
    {

        Auth::logout();

        return redirect('/');

    }

}
