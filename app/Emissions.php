<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emissions extends Model
{

	protected $table = 'emissions';
	protected $fillable= ['master_account','sub_account','invoice','co2','ch4','n2o','total',];

} 