<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
  protected $fillable = [
    'name', 'code', 'email'
  ];

  public function subjects()
  {
    return $this->hasManyThrough('App\Subject', 'App\TeacherSubject');
  }

  public function student()
  {
    return $this->hasManyThrough('App\Student', 'App\TeacherSubject');
  }
}
