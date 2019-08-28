<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'first_name',
    	'last_name',
    	'gender',
    	'email',
    	'company_id'
    ];

    /**
    * This Employee belongs to a company
    */
    public function company () {
    	return $this->belongsTo('App\Models\Company');
    }
}
