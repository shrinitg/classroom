<?php

namespace App\Http\Controllers;

use App\Models\StudentSubject;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //
    public function index() {
        $subjects = StudentSubject::where('studentId', Auth::user()->id)->get()->pluck('subjectId')->toArray();
        $subjects = Subject::whereIn('id', $subjects)->get();
        return view('student.homepage')->with(compact('subjects'));
    }

    public function joinSubject(Request $request) {
        
    }
}
