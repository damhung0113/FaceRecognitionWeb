<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Recognition extends Model
{
	protected $fillable = [
        'user_id', 'subject_id'
    ];
//countAbsence
}
