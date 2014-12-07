<?php

class StudentsController extends \BaseController {


    public function __construct()
    {
        // comprueba si se esta autenficado
        $this->beforeFilter('auth');

    }

    /**
	 * Display a listing of the resource.
	 * GET /students
	 *
	 * @return Response
	 */
	public function index()
	{
		// obtiene los estudiantes
        $students = Student::join('careers','students.idcareer','=','careers.idcareer')->
        select('students.idstudent','students.dni','students.firstname','students.lastname','students.image','careers.career')->get();

        // consulta los datos de roles
        $careers = Career::all();

        // los envia a la vista
        return View::make('students.index',array('students'=>$students,'careers'=>$careers));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /students/create
	 *
	 * @return Response
	 */
	public function create()
	{
        // redirecciona a la vista de crear
        Return View::make('students.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /students
	 *
	 * @return Response
	 */
	public function store()
	{
        // guarda la informacion del usuario con sus datos

         $student = new Student;
         $student->dni = Input::get('dni'); // toma los datos del formulario por su name

        $contador=0;
        //VALIDAMOS SI EXISTE ALGUN ESTUDIANTE CON ESE NUMERO DE CEDULA
        $validar = DB::table('students')->select('dni')->where('dni', '=' , $student->dni)->get();

        //RECORREMOS EL RESULTADO DE LA BASE DE DATOS
        foreach($validar as $pru) {
            $contador++;
          }
        //VALIDA QUE SI ENTRA AL FOREACH ES QUE YA ESTA HAY UN ESTUDIANTE INGRESADO CON ESE NUMERO DE CEDULA
         if ($contador >0){
             // mensaje
             Session::flash('error', 'The student has been previously entered');
             // redirecciona a la pantalla principal de students
             return Redirect::to('/admin/students');

         }else{
              $student->firstname = Input::get('firstname');
              $student->lastname = Input::get('lastname');
              $student->idcareer = Input::get('career');
             //VALIDA QUE SI LOS CAMPOS VIENEN EN BLANCO
               if ($student->firstame==='' ||$student->lastname==='' ||$student->dni==='')
               {
                   // mensaje
                   Session::flash('error', 'Error blank fields');
                   // redirecciona a la pantalla principal de students
                   return Redirect::to('/admin/students');
               }else{
                   // comprueba si se viene un archivo
                   if (Input::hasFile('image-file'))
                   {
                       $student->image = $student->dni;
                       Input::file('image-file')->move(public_path()."/images/students/",$student->dni);

                   }else{
                       $student->image = 'student_pic.png';
                   }
                   // guarda los datos
                   $student->save();
                   // mensaje
                   Session::flash('message', 'Successfully created student');
                   // redirecciona a la pantalla principal de students
                   return Redirect::to('/admin/students');
               }
         }
	}

	/**
	 * Display the specified resource.
	 * GET /students/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $student = Student::join('careers','students.idcareer','=','careers.idcareer')->where('students.idstudent','=',$id)->
        select('students.idstudent','students.dni','students.firstname','students.lastname','students.image','careers.career')->get();

        // envia los datos a la vista
        return $student;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /students/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        // devuelve los datos de studiante
        $students = Student::join('careers','students.idcareer','=','careers.idcareer')->where('students.idstudent','=',$id)->
        select('students.idstudent','students.dni','students.firstname','students.lastname','students.image','careers.career')->get();

        // envia los datos a la vista
        return $students;
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /students/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        // buscar la informacion del estudiante
        $student = Student::find($id);

        // actualiza la informacion del usuario con sus datos
        $student->dni = Input::get('dni'); // toma los datos del formulario por su name
        $student->firstname = Input::get('firstname');
        $student->lastname = Input::get('lastname');
        $student->idcareer = Input::get('career');

        if (Input::hasFile('image-file-edit'))
        {
            $student->image = $student->dni;
            Input::file('image-file-edit')->move(public_path()."/images/students/",$student->dni);

        }

        // guardar los datos
        $student->save();

        // mensaje
        Session::flash('message', 'Successfully updated student');

        // redirecciona a la pantalla principal de students
        return Redirect::to('/admin/students');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /students/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        // buscar la informacion del estudiante
        $student = Student::find($id);

        // elimina el usuario
        $student->delete();

        // mensaje
        Session::flash('message', 'Successfully deleted  student');

        // redirecciona a la pantalla principal de students
        return Redirect::to('/admin/students');
	}

    // guarda los comentarios
    public function saveComments()
    {

        $comment = new Comment();

        $comment->idstudent = Input::get('idStudent');
        $comment->iduser = Input::get('idUser');
        $comment->date = Input::get('date');
        $comment->commentary = Input::get('comment');

        $comment->save();

        Session::flash('message', 'Comment added by '.Auth::user()->name);

        // redirecciona a la pantalla principal de students
        return Redirect::to('/admin/students');


    }

    // obtiene todos los comentarios de un estudiante
    public function  getCommentsStudent($id)
    {

        $comments = Comment::where('idstudent','=',$id)->get();


        return View::make('students.comments.comments',array('comments'=>$comments));


    }

    // obtiene un comentarion en especifico
    public function getComment($id)
    {
        $comments = Comment::find($id);

        return $comments;


    }

    // elimina los comentarios
    public function deleteComments($id)
    {
        $comments = Comment::find($id);

        $comments->delete();

        Session::flash('message', 'Comment deleted by '.Auth::user()->name);

        // redirecciona a la pantalla principal de students
        return Redirect::to('/admin/students');

    }

    // actualiza los comentarios
    public function updateComments($id)
    {

        $comment = Comment::find($id);

        $comment->date = Input::get('date');
        $comment->commentary = Input::get('comment');

        $comment->save();

        Session::flash('message', 'Comment edited by '.Auth::user()->name);

        // redirecciona a la pantalla principal de students
        return Redirect::to('/admin/students');



    }




}