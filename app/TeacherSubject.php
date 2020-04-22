<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherSubject extends Model
{
  protected $fillable = [
    'subject_id', 'teacher_id'
  ];

  public function students()
  {
    return $this->hasMany('App\Subject', 'App\TeacherSubject');
  }
}
