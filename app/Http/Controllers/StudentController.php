<?php

namespace App\Http\Controllers;

use App\Models\AssignDone;
use App\Models\ClassDone;
use App\Models\StudentSubject;
use App\Models\Subject;
use App\Models\SubjectAssign;
use App\Models\SubjectClass;
use App\Models\SubjectTest;
use App\Models\TestDone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\checkIsPublishedRule;

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
            'subjectCode' => ['required', 'exists:subject,subjectUuid', 'unique:student_subject_relation,subjectId', new checkIsPublishedRule]
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

    public function access($subjectUuid) {
        $subject = Subject::where('subjectUuid', $subjectUuid)->first();
        if($subject) {
            $tests = SubjectTest::where('subjectUuid', $subjectUuid)->orderBy('id', 'ASC')->get();
            $testDone = TestDone::where('studentid', Auth::user()->id)->orderBy('id', 'ASC')->get()->pluck('testId')->toArray();

            $classes = SubjectClass::where('subjectUuid', $subjectUuid)->orderBy('id', 'ASC')->get();
            $classDone = ClassDone::where('studentid', Auth::user()->id)->orderBy('id', 'ASC')->get()->pluck('classId')->toArray();
            
            $assigns = SubjectAssign::where('subjectUuid', $subjectUuid)->orderBy('id', 'ASC')->get();
            $assignDone = AssignDone::where('studentid', Auth::user()->id)->orderBy('id', 'ASC')->get()->pluck('assignId')->toArray();

            return view('student.access')->with(compact('tests', 'classes', 'assigns', 'testDone', 'classDone', 'assignDone'));
        }
        return redirect('teacher')->with('subject_not_found', 'Subject code is invalid');
    }

    public function markTestDone($id) {
        $test = SubjectTest::find($id);
        if($test) {
            $markDone = TestDone::create([
                'studentId' => Auth::user()->id,
                'testId'    => $id
            ]);
            if($markDone) {
                return redirect()->back()->with('test_mark_done', 'Test has been marked as done.');
            }
            return redirect()->back()->with('test_mark_not_done', 'Test can not be marked as done.');
        }
    }

    public function markClassDone($id) {
        $class = SubjectClass::find($id);
        if($class) {
            $markDone = ClassDone::create([
                'studentId' => Auth::user()->id,
                'classId'   => $id
            ]);
            if($markDone) {
                return redirect()->back()->with('class_mark_done', 'Class has been marked as done.');
            }
            return redirect()->back()->with('class_mark_not_done', 'Class can not be marked as done.');
        }
    }

    public function markAssignDone($id) {
        $test = SubjectAssign::find($id);
        if($test) {
            $markDone = AssignDone::create([
                'studentId' => Auth::user()->id,
                'assignId'  => $id
            ]);
            if($markDone) {
                return redirect()->back()->with('assign_mark_done', 'Assignment has been marked as done.');
            }
            return redirect()->back()->with('assign_mark_not_done', 'Assignment can not be marked as done.');
        }
    }
}
