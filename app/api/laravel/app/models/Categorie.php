<?php
 
class Categorie extends Eloquent {
 
    protected $table = 'categories';

    public $timestamps = false;

    public static $rules = array(
      'title'             => 'required',
      'isInternal'        => 'required|boolean',
   );


    public function guests()
    {
        return $this->hasMany('Guest');
    }
 
}