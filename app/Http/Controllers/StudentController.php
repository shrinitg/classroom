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
        $subjects = Subject::whereIn('subjectUuid', $subjects)->get();
        return view('student.homepage')->with(compact('subjects'));
    }

    public function joinSubject(Request $request) {
        $validated = $request->validate([
            'subjectCode' => 'required|exists:subject,subjectUuid|unique:student_subject_relation,subjectId'
        ]);
        $createRelation = StudentSubject::create([
            'studentId' => Auth::user()->id,
            'subjectId' => $validated['subjectCode']
        ]);
        if($createRelation) {
            return redirect('student')->with('subject_added', 'Subject has been added to your list');
        }
        return redirect('student')->with('subject_not_added', 'Subject can not added to your list');
    }

    public function unsubscribe($subjectUuid) {
        $subject = Subject::where('subjectUuid', $subjectUuid)->first();
        if($subject) {
            $deleteRelation = StudentSubject::where('subjectId', $subjectUuid)->where('studentId', Auth::user()->id)->delete();
            if($deleteRelation) {
                return redirect('student')->with('subject_unsubscribed', 'Subject has been unsubscribed successfully.');
            }
            return redirect('student')->with('subject_not_unsubscribed', 'Subject can not be unsubscribed.');
        }
        return redirect('teacher')->with('subject_not_found', 'Subject code is invalid');
    }
}
