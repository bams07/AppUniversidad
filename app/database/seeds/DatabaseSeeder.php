<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        //INSERT POR DEFECTO DE EL ROL DE ADMINISTRADOR
        $rol = new Rol;
        $rol->idRol = "1";
        $rol->rol="Administrador";
        $rol->save();

        $rol = new Rol;
        $rol->idRol = "2";
        $rol->rol="Director de Carrera";
        $rol->save();

        $rol = new Rol;
        $rol->idRol = "3";
        $rol->rol="Estudiante";
        $rol->save();

        //INSERT DEL USUARIO POR DEFECTO
        $user = new User;
        $user->username = "admin";
        $user->name = "Bryan Miranda Salazar";
        $user->dni = "207140842";
        $user->password = Hash::make('123');
        $user->rol = '1';

        $user->save();


        //INSERT POR DEFECTO DE SKILS
        DB::insert('insert into skills (skill) values (?)', array('Programador'));
        DB::insert('insert into skills (skill) values (?)', array('Diseñador'));
        DB::insert('insert into skills (skill) values (?)', array('QA'));
        DB::insert('insert into skills (skill) values (?)', array('DBA'));
        DB::insert('insert into skills (skill) values (?)', array('Testing'));

        //INSERTS POR DEFECTO DE LA TABLA CURSOS
        DB::insert('insert into courses (course) values (?)', array('Programacion Ambiente Web 1'));
        DB::insert('insert into courses (course) values (?)', array('Principios de Programacion'));
        DB::insert('insert into courses (course) values (?)', array('Programacion 1'));
        DB::insert('insert into courses (course) values (?)', array('Programacion 2'));
        DB::insert('insert into courses (course) values (?)', array('Programacion 3'));

        //INSERTS POR DEFECTO DE LA TABLA TECNOLOGIAS
        DB::insert('insert into technologies (technology) values (?)', array('PHP'));
        DB::insert('insert into technologies (technology) values (?)', array('HTML'));
        DB::insert('insert into technologies (technology) values (?)', array('JAVA'));
        DB::insert('insert into technologies (technology) values (?)', array('C#'));
        DB::insert('insert into technologies (technology) values (?)', array('MVC'));




    }

}
