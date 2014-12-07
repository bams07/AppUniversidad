<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchema extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //TABLA ROLES
        Schema::create('roles', function ($table) {

            $table->engine = 'InnoDB';
            $table->increments('idRol');
            $table->string('rol');
        });

        //TABLA USUARIOS
        Schema::create('users', function ($table) {

            $table->engine = 'InnoDB';
            $table->increments('idUser');
            $table->string('username');
            $table->string('name', 100);
            $table->string('dni', 9);
            $table->string ('password');
            $table->integer('rol')->unsigned();
        });

        //FORANEA USUARIOS -- ROLES
        Schema::table('users', function ($table) {

            $table->foreign('rol')->references('idRol')->on('roles');
        });

        //TABLA CARRERAS
        Schema::create('careers', function ($table) {

            $table->engine = 'InnoDB';
            $table->increments('idcareer');
            $table->string('career');
        });

        //TABLA HABILIDADES
        Schema::create('skills', function ($table) {

            $table->engine = 'InnoDB';
            $table->increments('idskill');
            $table->string('skill');
        });

        //TABLA TECNOLOGIAS
        Schema::create('technologies', function ($table) {

            $table->engine = 'InnoDB';
            $table->increments('idtechnology');
            $table->string('technology');
        });

        //TABLA ESTUDIANTES
        Schema::create('students', function ($table) {

            $table->engine = 'InnoDB';
            $table->increments('idstudent');
            $table->string('dni');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('image');
            $table->string('english_level');
            $table->integer('idcareer')->unsigned();
        });

        //LLAVES FORANEAS DE LA TABLA ESTUDIANTES -- CARRERA
        Schema::table('students', function ($table) {

            $table->foreign('idcareer')->references('idcareer')->on('careers');
        });

        //TABLA HABILIDADES DEL ESTUDIANTE
        Schema::create('studentskills', function ($table) {

            $table->engine = 'InnoDB';
            $table->increments('idstudentskill');
            $table->integer('idstudent')->unsigned();
            $table->integer('idskill')->unsigned();
        });

        //LLAVES FORANEAS DE LA TABLA HABILIDADES DEL ESTUDIANTE CON LA TABLA ESTUDIANTES Y LA TABLA HABILIDADES
        Schema::table('studentskills', function ($table) {
            $table->foreign('idstudent')->references('idstudent')->on('students');
            $table->foreign('idskill')->references('idskill')->on('skills');
        });

        //TABLA CURSOS
        Schema::create('courses', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('idcourse');
            $table->string('course');
        });

        //TABLA PROYECTOS DEL ESTUDIANTE
        Schema::create('projects', function ($table) {

            $table->engine = 'InnoDB';
            $table->increments('idproject');
            $table->integer('idstudent')->unsigned();
            $table->integer('idcourse')->unsigned();
            $table->string('duration');
            $table->string('description');
            $table->date('date');
            $table->integer('score');
            $table->foreign('idcourse')->references('idcourse')->on('courses');
        });



      /*  //TABLA CURSOS DE CADA PROYECTO
        Schema::create('coursesprojects', function ($table) {

            $table->engine = 'InnoDB';
            $table->increments('idcourseproject');
            $table->integer('idproject')->unsigned();
            $table->integer('idcourse')->unsigned();
            //$table->primary('idcourseproject');
            //SE CREA LA FORANEA A PROYECTOS
            $table->foreign('idproject')->references('idproject')->on('projects');
            $table->foreign('idcourse')->references('idcourse')->on('courses');
        });
        */


        //LLAVES FORANEAS DE LA TABLA PROYECTOS DEL ESTUDIANTE CON LA TABLA ESTUDIANTES
        Schema::table('projects', function ($table) {
            $table->foreign('idstudent')->references('idstudent')->on('students');
        });

        //TABLA COMENTARIOS DEL ESTUDIANTE
        Schema::create('commentaries', function ($table) {

            $table->engine = 'InnoDB';
            $table->increments('idcommentary');
            $table->integer('idstudent')->unsigned();
            $table->integer('iduser')->unsigned();
            $table->date('date');
            $table->string('commentary');
            //$table->primary('idcommentary');
        });

        //LLAVES FORANEAS DE LA TABLA COMENTARIOS DEL ESTUDIANTE CON LA TABLA ESTUDIANTES
        Schema::table('commentaries', function ($table) {
            $table->foreign('idstudent')->references('idstudent')->on('students');
            $table->foreign('iduser')->references('idUser')->on('users');
        });

        //TABLA TECNOLOGIAS USADA EN EL PROYECTO DEL ESTUDIANTE
        Schema::create('technologiesUsed', function ($table) {

            $table->engine = 'InnoDB';
            $table->increments('idtechnologyused');
            $table->integer('idtechnology')->unsigned();
            $table->integer('idproject')->unsigned();
            $table->integer('idstudent')->unsigned();
            //  $table->primary('idtechnologyused');
        });

        //LLAVES FORANEAS DE LA TABLA COMENTARIOS DEL ESTUDIANTE CON LA TABLA ESTUDIANTES
        Schema::table('technologiesUsed', function ($table) {

            $table->foreign('idtechnology')->references('idtechnology')->on('technologies');
            $table->foreign('idproject')->references('idproject')->on('projects');
            $table->foreign('idstudent')->references('idstudent')->on('students');
        });

        //TABLA DE BUSQUEDAS, SE GUARDA TODAS LAS BUSQUEDAS REALIZADAS, LISTO
        Schema::create('searchs', function ($table) {

            $table->engine = 'InnoDB';
            $table->increments('idSearch');
            $table->date('date');
            $table->string('description');
            $table->string('type');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }

}

