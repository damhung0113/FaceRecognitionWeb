<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Subject;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $student = $user->findStudent();
        if ($request) {
            $subjects = Subject::findByCondition($request)->get();
        } else {
            $subjects = $student->subjects()->get();
        }
        return view('home', compact('student', 'subjects'));
    }
}
