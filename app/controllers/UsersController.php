<?php

class UsersController extends \BaseController {


    public function __construct()
    {

        $this->beforeFilter('auth');

    }


    /**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
        // consulta los datos de usuarios
        $users = User::join('roles','users.rol','=','roles.idRol')->
            select('users.idUser','users.username','users.name','users.dni','roles.rol')->get();

        // consulta los datos de roles
        $roles = Rol::all();

        // los envia a la vista
		return View::make('users.index',array('users'=>$users,'roles'=>$roles));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
        // consulta los datos de roles
        $roles = Rol::all();

        // envia los datos a la vista
        return View::make('users.create',array('roles'=>$roles));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
        // guarda la informacion del usuario con sus datos

        $user = new User;
        $user->username = Input::get('username'); // toma los datos del formulario por su name
        $user->name = Input::get('name');
        $user->dni = Input::get('dni');
        $user->password = Hash::make(Input::get('password'));
        $user->rol = Input::get('rol');

        // guarda los datos
        $user->save();

        // mensaje
        Session::flash('message', 'Successfully created user');

        // redirecciona a la pantalla principal de users
        return Redirect::to('/admin/users');
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        // devuelve los datos de usarios
        $user = User::join('roles','users.rol','=','roles.idRol')->where('users.idUser','=',$id)->
        select('users.idUser','users.username','users.name','users.dni','users.password','roles.rol')->get()->toArray();


        // envia los datos a la vista
        return $user;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
       // devuelve los datos de usarios
        $user = User::join('roles','users.rol','=','roles.idRol')->where('users.idUser','=',$id)->
        select('users.idUser','users.username','users.name','users.dni','users.password','roles.rol')->get();

        // envia los datos a la vista
        return $user;
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        // buscar la informacion del usuario
		$user = User::find($id);

        // actualiza la informacion del usuario con sus datos
        $user->username = Input::get('username'); // toma los datos del formulario por su name
        $user->name = Input::get('name');
        $user->dni = Input::get('dni');
        $user->rol = Input::get('rol');

        // comprueba si la contrasena esta vacia, si lo esta deja la contrasena como esta en la bd
        if(Input::get('password'))
        {
            $user->password = Hash::make(Input::get('password'));
        }

        // guardar los datos
        $user->save();

        // mensaje
        Session::flash('message', 'Successfully updated user');

        // redirecciona a la pantalla principal de users
        return Redirect::to('/admin/users');

	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        // buscar la informacion del usuario
        $user = User::find($id);

        // elimina el usuario
        $user->delete();

        // mensaje
        Session::flash('message', 'Successfully deleted  user');

        // redirecciona a la pantalla principal de users
        return Redirect::to('/admin/users');

	}

}