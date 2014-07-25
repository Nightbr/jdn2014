<?php
 
class Guest extends Eloquent {
 
    protected $table = 'guests';


    public function categorie()
    {
        return $this->belongsTo('Categorie');
    }
 
}