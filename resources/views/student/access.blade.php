@extends('../layout') @section('content')

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @elseif(session('test_mark_done'))
    <div class="alert alert-success" role="alert">
        Test has been marked as done successfully.
    </div>
    @elseif(session('test_marked_not_done'))
    <div class="alert alert-danger" role="alert">
        Test cannot be marked as done. Please try again.
    </div>
    @elseif(session('class_mark_done'))
    <div class="alert alert-success" role="alert">
        Class has been marked as taken successfully.
    </div>
    @elseif(session('class_marked_not_done'))
    <div class="alert alert-danger" role="alert">
        Class cannot be marked as taken. Please try again.
    </div>
    @elseif(session('assign_mark_done'))
    <div class="alert alert-success" role="alert">
        Assignment has been marked as done successfully.
    </div>
    @elseif(session('assign_marked_not_done'))
    <div class="alert alert-danger" role="alert">
        Assignment cannot be marked as done. Please try again.
    </div>
    @endif

<div class="row" style="margin-top: 20px; width: 90%; margin-right: auto; margin-left: auto;">
    <div class="col-12">
        <h3>Your tests</h3>
        <div style="height: 300px; overflow: auto;">
            <table class="table table-success" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Test Name</th>
                        <th scope="col">Test Date</th>
                        <th scope="col">Open</th>
                        <th scope="col">Mark as Done</th>
                    </tr>
                </thead>
                <tbody>
                    @if(sizeof($tests) > 0)
                        @foreach($tests as $k=>$test)
                        <tr>
                            <th scope="row">{{$k+1}}</th>
                            <td>{{$test->test_name}}</td>
                            <td>{{$test->test_date}}</td>
                            <td><a href="{{$test->test_link}}"><button class="btn btn-primary btn-sm">Open</button></a></td>
                            @if( in_array($test->id, $testDone) )
                            <td><span class="badge bg-success">Already marked as Done</span></td>
                            @else
                            <td><button onclick="markTestDone('{{ $test->id }}')" class="btn btn-success btn-sm">Mark Done</button></td>
                            @endif
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
        <h3>Your classes</h3>
        <div style="height: 300px; overflow: auto;">
            <table class="table table-success" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Class Name</th>
                        <th scope="col">Class Date</th>
                        <th scope="col">Open</th>
                        <th scope="col">Mark as Taken</th>
                    </tr>
                </thead>
                <tbody>
                    @if(sizeof($classes) > 0)
                        @foreach($classes as $k=>$class)
                        <tr>
                            <th scope="row">{{$k+1}}</th>
                            <td>{{$class->class_title}}</td>
                            <td>{{$class->class_date}}</td>
                            <td><a href="{{$class->class_link}}"><button class="btn btn-primary btn-sm">Open</button></a></td>
                            @if( in_array($class->id, $classDone) )
                            <td><span class="badge bg-success">Already marked as Done</span></td>
                            @else
                            <td><button onclick="markClassDone('{{ $class->id }}')" class="btn btn-success btn-sm">Mark Taken</button></td>
                            @endif
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
        <h3>Your tests</h3>
        <div style="height: 300px; overflow: auto;">
            <table class="table table-success" style="margin-top: 20px;">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Assignment Name</th>
                        <th scope="col">Assignment Date</th>
                        <th scope="col">Open</th>
                        <th scope="col">Mark as Done</th>
                    </tr>
                </thead>
                <tbody>
                    @if(sizeof($assigns) > 0)
                        @foreach($assigns as $k=>$assign)
                        <tr>
                            <th scope="row">{{$k+1}}</th>
                            <td>{{$assign->assignment_title}}</td>
                            <td>{{$assign->assignment_date}}</td>
                            <td><a href="{{$assign->assignment_link}}"><button class="btn btn-primary btn-sm">Open</button></a></td>
                            @if( in_array($assign->id, $assignDone) )
                            <td><span class="badge bg-success">Already marked as Done</span></td>
                            @else
                            <td><button onclick="markAssignDone('{{ $assign->id }}')" class="btn btn-success btn-sm">Mark Done</button></td>
                            @endif
                        </tr>
                        @endforeach
                    @else
                    <tr>
                        <td colspan="6" style="text-align: center;">This Subject don't have any assignment schedule yet.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

    function markTestDone(id) {
        if(window.confirm('Confirm to mark this test as done?')) {
            window.location.href = 'markTestDone/'+id;
        }
    }

    function markClassDone(id) {
        if(window.confirm('Confirm to mark this class as taken?')) {
            window.location.href = 'markClassDone/'+id;
        }
    }

    function markAssignDone(id) {
        if(window.confirm('Confirm to mark this assignment as done?')) {
            window.location.href = 'markAssignDone/'+id;
        }
    }

</script>

@endsection