@extends('../layout') @section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @elseif(session('subject_added'))
    <div class="alert alert-success" role="alert">
        Subject has been added to your list successfully.
    </div>
    @elseif(session('subject_not_added'))
    <div class="alert alert-danger" role="alert">
        Subject cannot be added. Please try again.
    </div>
    @elseif(session('subject_unsubscribed'))
    <div class="alert alert-success" role="alert">
        Subject has been unsubscribed from your list successfully.
    </div>
    @elseif(session('subject_not_unsubscribed'))
    <div class="alert alert-danger" role="alert">
        Subject cannot be unsubscribed. Please try again.
    </div>
    @elseif(session('subject_not_found'))
    <div class="alert alert-danger" role="alert">
        Subject does not exist.
    </div>
    @endif

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="row">
            <div class="col-6">
                <h3>Your Subjects</h3>
            </div>
            <div class="col-6 join-subject">
                <button type="button" class="btn btn-primary join-subject-button" data-bs-toggle="modal" data-bs-target="#joinSubject">
                    Join Subject &nbsp<i class="fa fa-plus-circle"></i>
                </button>
            </div>
        </div>
        @if(sizeof($subjects) > 0)
            @foreach ($subjects as $subject)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button style="background-color: red; color: #fff;" class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$subject->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                            {{$subject->name}}
                        </button>
                    </h2>
                    <div id="flush-collapseOne{{$subject->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <a href="student/access/{{$subject->subjectUuid}}"><button class="btn btn-primary">Access</button></a>
                        <button onclick="unsubscribe('{{$subject->subjectUuid}}')" class="btn btn-danger">Remove</button>
                    </div>
                    </div>
                </div>
            @endforeach
        @else
        <h4 style="text-align: center;">You don't have any subjects subscribed.</h4>
        @endif
    </div>

    <div class="modal fade" id="joinSubject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter Subject code to enroll</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="student/joinSubject" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputSubjectCode" class="form-label">Subject Code</label>
                            <input type="text" class="form-control" id="exampleInputSubjectCode" name="subjectCode" placeholder="Enter Subject Code">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function unsubscribe(subjectCode) {
            if(window.confirm('Are you sure you want to unsubscribe this subject?')) {
                window.location.href = 'student/unsubscribe/'+subjectCode;
            }
        }
    </script>

@endsection