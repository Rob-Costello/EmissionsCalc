<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as Authenticatable; 


class Users extends Model implements Authenticatable
{



	use AuthenticatableTrait;
	protected $fillable = ['username','email','password','account_no'];
	protected $hidden = ['password'];
	



}