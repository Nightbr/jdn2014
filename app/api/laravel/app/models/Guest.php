<?php
 
class Guest extends Eloquent {
 
    protected $table = 'guests';

    public static $rules = array(
      'firstname'       => 'required',
      'lastname'        => 'required',
      'email'           => 'required|email',
      'categorie_id'    => 'required|integer'
   );

    public function categorie()
    {
        return $this->belongsTo('Categorie');
    }
 
}