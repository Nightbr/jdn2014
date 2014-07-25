<?php
 
class Categorie extends Eloquent {
 
    protected $table = 'categories';

    public $timestamps = false;


    public function guests()
    {
        return $this->hasMany('Guest');
    }
 
}