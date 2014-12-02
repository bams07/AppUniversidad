<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

        $user = new User;
        $user->username = "admin";
        $user->name = "Bryan Miranda Salazar";
        $user->dni = "207140842";
        $user->password = Hash::make('123');
        $user->rol = '1';

        $user->save();


    }

}
