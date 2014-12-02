<?php

class LoginController extends \BaseController {


    // Esta funcion carga la vista del login y valida si el usuario ya ha iniciado session
    public function  index()
    {
        if (Auth::check()) {
            return Redirect::to('/admin');
        }
        return View::make('login.backLogin');

    }

	public  function login()
    {

        // valor que envia el usuario para ser verificados
        $user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
        // comprueba los valores con los guardados en la BD
        if (Auth::attempt($user)) {

            // Redirecciona y envia un mensaje de confirmacion por medio de la session
            return Redirect::to('/admin')
                ->with('success_login', 'You are successfully logged in.');
        }

        // Redirecciona al login de nuevo si la validacion fallan y envia mensaje de error de login
            return Redirect::to('/admin/login')
                ->with('error_login', 'Username/password was incorrect');

    }

    public function logout()
    {
        // Cierra la session de un usuario y lo redirecciona al login
        Auth::logout();
        return Redirect::to('/admin');


    }




}