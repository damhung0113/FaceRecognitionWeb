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
        if ($request == false) {
            $subjects = Subject::findByCondition($request)->get();
        } else {
            if ($user->role == ADMIN) {
                $subjects = Subject::orderBy('name')->get();
            } else {
                $subjects = $user->subjects()->get();
            }
        }
        return view('home', compact('user', 'subjects'));
    }

    public function create(Request $request)
    {
        return view('subject.detail');
    }
}
