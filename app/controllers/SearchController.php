<?php

class SearchController extends \BaseController {

    //Esta funcion hace una busqueda por tecnologias
    public function searchTechnology($data){

        //Eleccionamos el idtechnology de la tabla technologies donde la tecnologia sea igual al campo de busqueda
        $technology = DB::table('technologies')->select('idtechnology')->where('technology', 'LIKE' , '%'.$data.'%')->get();

        //Hacemos una consulta inner join para traer los datos necesarios
        $studentTechnology = DB::table('technologiesused')
            ->join('students', 'technologiesused.idstudent', '=', 'students.idstudent')
            ->where('technologiesused.idtechnology', '=' , $technology[0]->idtechnology)
            ->select('students.firstname', 'students.lastname', 'students.image', 'students.dni','students.idstudent')
            ->get();

        //agregamos la busqueda realizada
        if($technology != null) {
            $search = DB::table('searchs')->insert(
                array('date' => Date('Y-m-d'), 'description' => $data, 'Type' => 'Technology')
            );
        }
        //return $studentTechnology
        return $studentTechnology;

    }

    //Esta funcion hace una busqueda por Skills
    public function searchSkill($data){

        //Eleccionamos el idtechnology de la tabla technologies donde la tecnologia sea igual al campo de busqueda
        $skills = DB::table('skills')->select('idskill')->where('skill', 'LIKE' , '%'.$data.'%')->get();

        //agregamos la busqueda realizada
        if($skills != null){
            DB::table('searchs')->insert(
                array('date' => Date('Y-m-d'), 'description' => $data, 'Type' => 'Skill')
            );
        }
        //Hacemos una consulta inner join para traer los datos necesarios
        $studentSkill = DB::table('studentskills')
            ->join('students', 'studentskills.idstudent', '=', 'students.idstudent')
            ->where('studentskills.idskill', '=' , $skills[0]->idskill)
            ->select('students.firstname', 'students.lastname', 'students.image', 'students.dni','students.idstudent')
            ->get();

        //return $studenSkill
        return $studentSkill;


    }

    //Esta funcion me retorna todas las ultimas 10 busquedas que se realizaron
    public function showDashboard(){
        //validamos si hay un usuario conectado muestra las ultimas busquedas realizadas en el dashboard
        if (Auth::check()) {
            $show = DB::table('searchs')
                ->orderBy('idSearch', 'desc')
                ->take(10)
                ->get();
            //return $show;
            return View::make('dashboard.index',array('shows'=>$show));
        }

        //si no hay usuario conectado nos devolvemos al login para logearse.
        return View::make('login.backLogin');


    }

    //Esta funcion muestra los datos necesarios de la busqueda realizada
    public function show($id)
    {
        //hacemos la busqueda del estudiante deseado
       $students = Student::join('careers','students.idcareer','=','careers.idcareer')->where('students.idstudent','=',$id)->
        select('students.idstudent','students.dni','students.firstname','students.lastname','students.image','careers.career')->get();

        //hacemos una busqueda de los skills que se le asignaron al estudiante
       $skills = DB::table('studentskills')
           ->join('skills', 'studentskills.idskill', '=', 'skills.idskill')
           ->where('studentskills.idstudent', '=' , $id)
           ->select('skills.skill')
           ->get();


        //hacemos una busqueda de los proyectos que se le asignaron al estudiante
        $projects = DB::table('projects')
            ->join('technologiesused', 'projects.idproject', '=', 'technologiesused.idproject')
            ->join('technologies', 'technologiesused.idtechnology', '=', 'technologies.idtechnology')
            ->join('courses', 'projects.idcourse', '=', 'courses.idcourse')
            ->where('technologiesused.idstudent', '=' , $id)
            ->select('projects.idstudent', 'projects.duration', 'projects.description', 'projects.date', 'projects.score','technologies.technology','courses.course' )
            ->orderBy('technologiesused.idproject', 'asc')
            ->get();



        //hacemos una busqueda de los comentarios que se le asignaron al estudiante
        $commentaries = DB::table('commentaries')
            ->join('students', 'commentaries.idstudent', '=', 'students.idstudent')
            ->where('commentaries.idstudent', '=' , $id)
            ->join('users', 'commentaries.iduser', '=', 'users.idUser')
            ->select('commentaries.date','commentaries.commentary','students.firstname','users.username' )
            ->get();


        //creamos un arreglo con todos los datos de las consultas anteriores
        $data = array('students' => $students, 'skills' => $skills, 'projects' => $projects, 'comments'=> $commentaries);


        // envia los datos a la vista
        return $data;
    }

}
