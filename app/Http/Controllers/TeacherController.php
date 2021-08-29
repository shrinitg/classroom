<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\TeacherSubject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    //
    public function index() {
        $subjectArray = TeacherSubject::where('teacherId', Auth::user()->id)->get()->pluck('subjectId')->toArray();
        $subjects = Subject::whereIn('id', $subjectArray)->get();
        return view('teacher.homepage')->with(compact('subjects'));
    }

    public function addSubject(Request $request) {
        $validated = $request->validate([
            'name' => 'required',
        ]);
        $subjectdata = [
            'name' => $request->name,
            'subjectUuid' => Str::uuid(6)
        ];
        $subject = Subject::create($subjectdata);
        if($subject) {
            $teacherSubject = [
                'teacherId' => Auth::user()->id,
                'subjectId' => $subject->id
            ];
            $teacher_subject = TeacherSubject::create($teacherSubject);
            if($teacher_subject)
                return redirect('teacher')->with('subject_added', 'Subject added!');
        return redirect('teacher')->with('subject_not_added', 'Subject not added!');
        }
    }

    public function delete($subjectUuid) {
        $deleteSubject = Subject::where('subjectUuid', $subjectUuid)->delete();
        if($deleteSubject)
        return redirect('teacher')->with('subject_deleted', 'Subject is deleted!');
        else
        return redirect('teacher')->with('subject_not_deleted', 'Subject is not deleted!');
    }
}
