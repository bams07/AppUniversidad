<?php

class Comments extends Eloquent {

    protected $table = 'commentaries';

    protected $primaryKey = 'idcommentary';

    public  $timestamps = false;
}