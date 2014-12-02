<?php

class Student extends Eloquent {

    protected $table = 'students';

    protected $primaryKey = 'idstudent';

    public  $timestamps = false;
}