<?php

class SearchController extends \BaseController {

    public function searchTechnology($data){

        $technology = DB::table('technologies')->select('idtechnology')->where('technology', '=' , $data)->get();

        $studentTechnology = DB::table('technologiesused')
            ->join('students', 'technologiesused.idstudent', '=', 'students.idstudent')
            ->where('technologiesused.idtechnology', '=' , $technology[0]->idtechnology)
            ->select('students.firstname', 'students.lastname', 'students.image', 'students.dni','students.idstudent')
            ->get();

        $search = DB::table('searchs')->insert(
            array('date' => Date('Y-m-d'), 'description' => $data, 'Type' => 'Technology')
        );

        return $studentTechnology;

    }

    public function searchSkill($data){


        $skills = DB::table('skills')->select('idskill')->where('skill', '=' , $data)->get();
        if($skills != null){
            DB::table('searchs')->insert(
                array('date' => Date('Y-m-d'), 'description' => $data, 'Type' => 'Skill')
            );
        }
        $studentSkill = DB::table('studentskills')
            ->join('students', 'studentskills.idstudent', '=', 'students.idstudent')
            ->where('studentskills.idskill', '=' , $skills[0]->idskill)
            ->select('students.firstname', 'students.lastname', 'students.image', 'students.dni','students.idstudent')
            ->get();

        return $studentSkill;


    }

    public function showDashboard(){

        if (Auth::check()) {
            $show = DB::table('searchs')
                ->orderBy('idSearch', 'desc')
                ->take(5)
                ->get();
            //return $show;
            return View::make('dashboard.index',array('shows'=>$show));
        }
        return View::make('login.backLogin');


    }

    public function show($id)
    {
        $students = Student::join('careers','students.idcareer','=','careers.idcareer')->where('students.idstudent','=',$id)->
        select('students.idstudent','students.dni','students.firstname','students.lastname','students.image','careers.career')->get();

        // envia los datos a la vista
        return $students;
    }

}
