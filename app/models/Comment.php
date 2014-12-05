<?php

class Comment extends Eloquent {

    protected $table = 'commentaries';

    protected $primaryKey = 'idcommentary';

    public  $timestamps = false;
}