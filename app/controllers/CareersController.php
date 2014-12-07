<?php

class CareersController extends \BaseController {



    public function __construct()
        {

            $this->beforeFilter('auth');

        }



	/**
	 * Display a listing of the resource.
	 * GET /careers
	 *
	 * @return Response
	 */
	public function index()
	{
        // consulta los datos de carreras
        $careers = Career::all();

        // los envia a la vista
        return View::make('careers.index',array('careers'=>$careers));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /careers/create
	 *
	 * @return Response
	 */
	public function create()
	{
        // Creamos la vista create
		Return View::make('careers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /careers
	 *
	 * @return Response
	 */
	public function store()
	{
        //tomamos el dato del input name que fue pasado por metodo post
        $name = Input::get('career');

        //VALIDACION DE QUE EL CAMPO NO PUEDA INGRESAR EN BLANCO
        if ($name === ''){
            // mensaje
            Session::flash('error', 'Error blank fields');

            // redirecciona a la pantalla principal de careers
            return Redirect::to('/admin/careers');
        }else{
            //Hacemos insert a la tabla carrera.
            Career::insert(array("career" => $name));//Career es el nombre del modelo.

            // mensaje
            Session::flash('message', 'Successfully created user');

            // redirecciona a la pantalla principal de careers
            return Redirect::to('/admin/careers');
        }


	}

	/**
	 * Display the specified resource.
	 * GET /careers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

        // devuelve los datos de carreras
            $careers = Career::find($id);

        // envia los datos a la vista
        return  $careers;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /careers/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        // devuelve los datos de carreras
        $careers = Career::find($id);

        // envia los datos a la vista
        return $careers;
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /careers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        // buscar la informacion del carrera
        $career = Career::find($id);

        // le insertamos el dato traido del input name al atributo de la base de datos career
        $career->career = Input::get('career');

        //Salvamos los datos guardados a la base de datos
        $career->save();

        // mensaje
        Session::flash('message', 'Successfully updated career');

        // redirecciona a la pantalla principal de careers
        return Redirect::to('/admin/careers');



	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /careers/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        // buscar la informacion del carrera
        $career = Career::find($id);

        // elimina la carrera
        $career->delete();

        // mensaje
        Session::flash('message', 'Successfully deleted  career');

        // redirecciona a la pantalla principal de careers
        return Redirect::to('/admin/careers');
	}

}