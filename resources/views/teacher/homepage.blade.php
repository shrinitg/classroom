@extends('../layout') @section('content')

<section class="teacher-main">
    <div class="row">
        <h4>Welcome! {{Auth::user()->name}}</h4>
        <div class="col-6">
            <h5>Your Details</h5>
            <table class="table">
                <tbody>
                    <tr>
                        <th scope="row">Name</th>
                        <td>{{Auth::user()->name}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Username</th>
                        <td>{{Auth::user()->username}}</td>
                        <td><button type="button" class="btn btn-primary btn-sm">Update</button></td>
                    </tr>
                    <tr>
                    <th scope="row">Email</th>
                    <td>{{Auth::user()->email}}</td>
                    <td><button type="button" class="btn btn-primary btn-sm">Update</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            @if(session('subject_added'))
            <div class="alert alert-success" role="alert">
                Subject has been added successfully.
            </div>
            @elseif(session('subject_not_added'))
            <div class="alert alert-danger" role="alert">
                Subject cannot be added. Please try again.
            </div>
            @elseif(session('subject_deleted'))
            <div class="alert alert-success" role="alert">
                Subject has been deleted successfully.
            </div>
            @elseif(session('subject_not_deleted'))
            <div class="alert alert-danger" role="alert">
                Subject cannot be deleted. Please try again.
            </div>
            @elseif ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <h5>Your Subjects</h5>
            <button style="margin-top: -60px; margin-top: -60px; position: absolute; right: 3%; top: 9rem;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubject">Click here to add</button>
            @if(sizeof($subjects) > 0)
            <div style="height: 500px; overflow: auto;">
                <table class="table subject_table" style="margin-top: 20px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Subject Code</th>
                            <th scope="col">Access</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Published</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $key=>$subject)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$subject->name}}</td>
                                <td>{{$subject->subjectUuid}}</td>
                                <td><a href="access/{{$subject->subjectUuid}}"><button type="button" class="btn btn-primary btn-sm">Access</button></a></td>
                                <td><button type="button" onclick="deleteSubject('{{$subject->subjectUuid}}')" class="btn btn-danger btn-sm">Delete</button></td>
                                @if($subject->isPublished)
                                <td><span class="badge bg-success">Published</span></td>
                                @else
                                <td><span class="badge bg-danger">Not Published</span></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="add_subject">
                <h4 style="margin-top: 40px;">You do not have any subject at the moment</h4>
                <button style="margin-top: -60px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubject">Click here to add</button>
            </div>
            @endif
        </div>
    </div>
</section>

<div class="modal fade" id="addSubject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="addSubject" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputSubjectName" class="form-label">Subject Name</label>
                <input type="text" class="form-control" id="exampleInputSubjectName" name="name" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    function deleteSubject(subjectuuid) {
    if(confirm("Do you confirm to delete this subject?"))
        window.location.href = "delete/"+subjectuuid;
    }
</script>

@endsection