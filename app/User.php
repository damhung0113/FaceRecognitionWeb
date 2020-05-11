<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Student;
use App\Recognition;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'code'
    ];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subjects()
    {
        return $this->belongsToMany('App\Subject', 'user_subject');
    }

    public function groupByDate($subject_id)
    {
        return Recognition::where('subject_id', $subject_id)->get()->groupBy(function($item){ return $item->created_at->format('d-m-yy'); });
    }

    public function dateAbsence($subject_id) {
        $dateAbsence = Array();
        $user_id = Array();
        $recognitions_group = $this->groupByDate($subject_id);
        foreach ($recognitions_group as $date => $recognitions) {
            foreach ($recognitions as $index => $recognition) {
                $user_id[$recognition->user_id] = $recognition->user_id;
            }
            if (!array_key_exists($this->id, $user_id)) {
                array_push($dateAbsence, $date);
            }
        }
        return $dateAbsence;
    }
}
