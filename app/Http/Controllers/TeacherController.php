<?php

namespace App\Http\Controllers;

use App\Models\AssignDone;
use App\Models\ClassDone;
use App\Models\StudentSubject;
use App\Models\Subject;
use App\Models\SubjectAssign;
use App\Models\SubjectClass;
use App\Models\SubjectTest;
use Illuminate\Http\Request;
use App\Models\TeacherSubject;
use App\Models\TestDone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

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
        $subject = Subject::where('subjectUuid', $subjectUuid)->first();
        if($subject) {
            $subject = Subject::where('subjectuuid', $subjectUuid)->first();
            $deleteSubject = Subject::where('subjectUuid', $subjectUuid)->delete();
            $deleteTeacherRelation = TeacherSubject::where('subjectId', $subject->id)->delete();
            $deleteStudentRelation = StudentSubject::where('subjectid', $subject->id)->delete();
            $deleteTest = SubjectTest::where('subjectUuid', $subjectUuid)->delete();
            $deleteClass = SubjectClass::where('subjectUuid', $subjectUuid)->delete();
            $deleteAssign = SubjectAssign::where('subjectUuid', $subjectUuid)->delete();
            if($deleteSubject && $deleteTeacherRelation && $deleteStudentRelation && $deleteTest && $deleteAssign && $deleteClass)
                return redirect('teacher')->with('subject_deleted', 'Subject is deleted!');
            else
                return redirect('teacher')->with('subject_not_deleted', 'Subject is not deleted!');
        }
        return redirect('teacher')->with('subject_not_found', 'Subject code is invalid');
    }

    public function access($subjectUuid) {
        $subject = Subject::where('subjectUuid', $subjectUuid)->first();
        if($subject) {
            $subjectTests = SubjectTest::where('subjectUuid', $subjectUuid)->get();
            $subjectClasses = SubjectClass::where('subjectUuid', $subjectUuid)->get();
            $subjectAssignments = SubjectAssign::where('subjectUuid', $subjectUuid)->get();
            return view('teacher.access')->with(compact('subjectTests', 'subjectClasses', 'subjectAssignments', 'subjectUuid'));
        }
        return redirect('teacher')->with('subject_not_found', 'Subject code is invalid');
    }

    public function addTest(Request $request) {
        $validated = $request->validate([
            'name'         => 'required',
            'datetime'     => 'required|date|after_or_equal:today',
            'link'         => 'required|url',
            'subject_code' => 'required'
        ]);
        $validated['datetime'] = Carbon::parse($request->datetime)->isoFormat('LLLL');
        $test = [
            'subjectUuid' => $validated['subject_code'],
            'test_name'   => $validated['name'],
            'test_date'   => $validated['datetime'],
            'test_link'   => $validated['link']
        ];
        $add = SubjectTest::insert($test);
        if($add)
            return redirect('teacher/access/'.$validated['subject_code'])->with('test_added', 'Test has been added Successfully');
        else
            return redirect('teacher/access/'.$validated['subject_code'])->with('test_not_added', 'Test can not be added.');
    }

    public function addClass(Request $request) {
        $validated = $request->validate([
            'name'         => 'required',
            'datetime'     => 'required|date|after_or_equal:today',
            'link'         => 'required|url',
            'subject_code' => 'required'
        ]);
        $validated['datetime'] = Carbon::parse($request->datetime)->isoFormat('LLLL');
        $test = [
            'subjectUuid' => $validated['subject_code'],
            'class_title'   => $validated['name'],
            'class_date'   => $validated['datetime'],
            'class_link'   => $validated['link']
        ];
        $add = SubjectClass::insert($test);
        if($add)
            return redirect('teacher/access/'.$validated['subject_code'])->with('class_added', 'Class has been added Successfully');
        else
            return redirect('teacher/access/'.$validated['subject_code'])->with('class_not_added', 'Class can not be added.');
    }

    public function addAssignment(Request $request) {
        $validated = $request->validate([
            'name'         => 'required',
            'datetime'     => 'required|date|after_or_equal:today',
            'link'         => 'required|url',
            'subject_code' => 'required'
        ]);
        $validated['datetime'] = Carbon::parse($request->datetime)->isoFormat('LLLL');
        $test = [
            'subjectUuid' => $validated['subject_code'],
            'assignment_title'   => $validated['name'],
            'assignment_date'   => $validated['datetime'],
            'assignment_link'   => $validated['link']
        ];
        $add = SubjectAssign::insert($test);
        if($add)
            return redirect('teacher/access/'.$validated['subject_code'])->with('assignment_added', 'Assignment has been added Successfully');
        else
            return redirect('teacher/access/'.$validated['subject_code'])->with('assignment_not_added', 'Assignment can not be added.');
    }

    public function publish($subjectUuid) {
        $subject = Subject::where('subjectUuid', $subjectUuid)->first();
        if($subject)
            $publish = Subject::where('subjectUuid', $subjectUuid)->update([
                'isPublished' => 1
            ]);
            if($publish)
                return redirect('teacher')->with('subject_published', 'Subject has been published');
            else
                return redirect('teacher')->with('subject_not_published', 'Subject can not be published');
        return redirect('teacher')->with('subject_not_found', 'Subject code is invalid');
    }

    public function deleteTest($id) {
        $test = SubjectTest::find($id);
        $subject_code = $test->subjectUuid;
        if($test && $test->delete()) {
            $deleteTestRelation = TestDone::where('testId', $id)->delete();
            return redirect('/teacher/access/'.$subject_code)->with('test_deleted', 'Test has been deleted');
        }
        return redirect('/teacher/access/'.$subject_code)->with('test_not_deleted', 'Test can not be deleted');
    }

    public function deleteClass($id) {
        $class = SubjectClass::find($id);
        $subject_code = $class->subjectUuid;
        if($class && $class->delete()) {
            $deleteClassRelation = ClassDone::where('classId', $id)->delete();
            return redirect('/teacher/access/'.$subject_code)->with('class_deleted', 'Class has been deleted');
        }
        return redirect('/teacher/access/'.$subject_code)->with('class_not_deleted', 'Class can not be deleted');
    }

    public function deleteAssignment($id) {
        $assign = SubjectAssign::find($id);
        $subject_code = $assign->subjectUuid;
        if($assign && $assign->delete()) {
            $deleteAssignRelation = AssignDone::where('assignId', $id)->delete();
            return redirect('/teacher/access/'.$subject_code)->with('assignment_deleted', 'Assignment has been deleted');
        }
        return redirect('/teacher/access/'.$subject_code)->with('assignment_not_deleted', 'Assignment can not be deleted');
    }


}
