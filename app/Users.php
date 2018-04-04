<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait; 


class Users extends Model implements Authenticatable
{

	use AuthenticatableTrait;
	protected $fillable = ['email','password','codas_account','business'];
	protected $hidden = ['password'];
	
}