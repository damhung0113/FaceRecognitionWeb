<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
  protected $fillable = [
    'name', 'code', 'email'
  ];

  public function subjects()
  {
    return $this->belongsToMany('App\Subject');
  }
}
