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

	public function setPasswordAttribute($value)
    {
		$this->attributes['password'] = Hash::make($value);
	}

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    } 
  
    public function getRememberToken()
    {
        return $this->remember_token;
    }
  
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }
  
    public function getRememberTokenName()
    {
        return "remember_token";
    }
  
    public function getReminderEmail()
    {
        return $this->email;
    }

    /**
    *
    * verify which role the user has
    *
    * @var string
    * @return boolean
    */
    public function hasRole($strRole)
    {
        if($this->original['role'] == $strRole)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}
