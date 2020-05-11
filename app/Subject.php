<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name', 'code'
    ];

    public function scopeFindByName($query, $name)
    {
        if ($name) {
        return $query->where('name', 'like', '%' . $name . '%');
    }
    }

    public function scopeFindByCode($query, $code)
    {
        if ($code) {
            return $query->where('code', 'like', '%' . $code . '%');
        }
    }

    public function scopeFindByCondition($query, $request)
    {
        return $query->findByName($request->get('name'))
                    ->findByCode($request->get('code'));
    }

    public function teachers() {
        return $this->belongsToMany('App\User', 'user_subject')->where('role', TEACHER);
    }

    public function students() {
        return $this->belongsToMany('App\User', 'user_subject')->where('role', STUDENT);
    }
}
