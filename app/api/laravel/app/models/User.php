<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	*
	* The rules uses for the validation of the model. Use by administrator.
	*
	* @var array
	*/
	public $rules = array(
		'username' => 'required',
		'password' =>'required',
	);

	public function setPasswordAttribute($value){
		$this->attributes['password'] = Hash::make($value);
	}

}
