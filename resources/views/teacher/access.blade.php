@extends('../layout') @section('content')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @elseif(session('test_added'))
            <div class="alert alert-success" role="alert">
                Test has been scheduled successfully.
            </div>
        @elseif(session('test_not_added'))
            <div class="alert alert-danger" role="alert">
                Test cannot be scheduled. Please try again.
            </div>
        @elseif(session('class_added'))
            <div class="alert alert-success" role="alert">
                Class has been scheduled successfully.
            </div>
        @elseif(session('class_not_added'))
            <div class="alert alert-danger" role="alert">
                Class cannot be scheduled. Please try again.
            </div>
        @elseif(session('assignment_added'))
            <div class="alert alert-success" role="alert">
                Assignment has been added successfully.
            </div>
        @elseif(session('assignment_not_added'))
            <div class="alert alert-danger" role="alert">
                Assignment cannot be added. Please try again.
            </div>
        @endif

<div class="row" style="margin-top: 20px; width: 90%; margin-right: auto; margin-left: auto;">
    <div class="col-12">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTest">Add New Test</button>
        <div style="height: 300px; overflow: auto;">
            <table class="table table-success" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Test Name</th>
                        <th scope="col">Test Date</th>
                        <th scope="col">Open</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if(sizeof($subjectTests) > 0)
                    @foreach($subjectTests as $k=>$subjectTest)
                    <tr>
                        <th scope="row">{{$k+1}}</th>
                        <td>{{$subjectTest->test_name}}</td>
                        <td>{{$subjectTest->test_date}}</td>
                        <td><a href="{{$subjectTest->test_link}}"><button class="btn btn-primary btn-sm">Open</button></a></td>
                        <td><button class="btn btn-success btn-sm">Update</button></td>
                        <td><button class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" style="text-align: center;">This Subject don't have any test schedule yet.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 20px; width: 90%; margin-right: auto; margin-left: auto;">
    <div class="col-12">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClass">Add New Class</button>
        <div style="height: 300px; overflow: auto;">
            <table class="table table-danger" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Class Schedule</th>
                        <th scope="col">Open</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if(sizeof($subjectClasses) > 0)
                    @foreach($subjectClasses as $k=>$subjectClass)
                    <tr>
                        <th scope="row">{{$k+1}}</th>
                        <td>{{$subjectClass->class_title}}</td>
                        <td>{{$subjectClass->class_date}}</td>
                        <td><a href="{{$subjectClass->class_link}}"><button class="btn btn-primary btn-sm">Open</button></a></td>
                        <td><button class="btn btn-success btn-sm">Update</button></td>
                        <td><button class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" style="text-align: center;">This Subject don't have any class schedule yet.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 20px; width: 90%; margin-right: auto; margin-left: auto;">
    <div class="col-12">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAssignment">Add New Assignment</button>
        <div style="height: 300px; overflow: auto;">
            <table class="table table-success" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Assignment Name</th>
                        <th scope="col">Assignment due date</th>
                        <th scope="col">Copy Link</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @if(sizeof($subjectAssignments) > 0)
                    @foreach($subjectAssignments as $k=>$subjectAssign)
                    <tr>
                        <th scope="row">{{$k+1}}</th>
                        <td>{{$subjectAssign->assignment_title}}</td>
                        <td>{{$subjectAssign->assignment_date}}</td>
                        <td><a href="{{$subjectAssign->assignment_link}}"><button class="btn btn-primary btn-sm">Open</button></a></td>
                        <td><button class="btn btn-success btn-sm">Update</button></td>
                        <td><button class="btn btn-danger btn-sm">Delete</button></td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="6" style="text-align: center;">This Subject don't have any assignment yet.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="addTest" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Schedule New Test</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{url('teacher/newTest')}}">
            @csrf
            <input type="hidden" value="{{$subjectUuid}}" name="subject_code">
            <div class="mb-3">
                <label for="exampleInputTestName" class="form-label">Enter Test Name</label>
                <input type="text" class="form-control" id="exampleInputTestName" name="name" placeholder="Test Name" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputTestDate" class="form-label">Enter Test Date & Time</label>
                <input type="datetime-local" class="form-control" id="exampleInputTestDate" name="datetime" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputTestLink" class="form-label">Enter Test Link</label>
                <input type="url" class="form-control" id="exampleInputTestLink" name="link" placeholder="Test Link" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addClass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Schedule New Class</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{url('teacher/newClass')}}">
            @csrf
            <input type="hidden" value="{{$subjectUuid}}" name="subject_code">
            <div class="mb-3">
                <label for="exampleInputClassName" class="form-label">Enter Class Name</label>
                <input type="text" class="form-control" id="exampleInputClassName" name="name" placeholder="Class Name" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputClassDate" class="form-label">Enter Class Date & Time</label>
                <input type="datetime-local" class="form-control" id="exampleInputClassDate" name="datetime" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputClassLink" class="form-label">Enter Class Link</label>
                <input type="url" class="form-control" id="exampleInputClassLink" name="link" placeholder="Class Link" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="addAssignment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Assignment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{url('teacher/newAssignment')}}">
            @csrf
            <input type="hidden" value="{{$subjectUuid}}" name="subject_code">
            <div class="mb-3">
                <label for="exampleInputAssigName" class="form-label">Enter Assignment Name</label>
                <input type="text" class="form-control" id="exampleInputAssignName" name="name" placeholder="Assignment Name" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputAssignmentDate" class="form-label">Enter Assignment Date & Time</label>
                <input type="datetime-local" class="form-control" id="exampleInputAssignmentDate" name="datetime" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputAssignLink" class="form-label">Enter Assignment Link</label>
                <input type="url" class="form-control" id="exampleInputAssignLink" name="link" placeholder="Assignment Link" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection