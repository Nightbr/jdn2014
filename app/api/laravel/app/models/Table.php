<?php
 
class Table extends Eloquent {
 
    protected $table = 'tables';

    public $timestamps = false;

    public static $rules = array(
      'title'             => 'required',
      'max_chairs'        => 'required|integer',
      'available_chairs'        => 'required|integer',
      'is_full'           => 'required|boolean',
   );


    public function guests()
    {
        return $this->hasMany('Guest');
    }
 
}