@extends('layouts.admin_app')
@section('content')
    <div class="card">
        <div class="card-header">Our subjects</div>
        <div class="card-body">
            <div class="row">
                <a href="{{route('subject.create')}}" style="float: right" class="btn btn-primary">Add new</a>
            </div><br>
            <table>
                <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Students
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>

                </thead>
                <tbody>
                @foreach($subjects as $subject)
                    <tr>
                        <td>{{$subject->name_en}}</td>
                        <td>
                            @foreach($subject->students as $student)
                                <p>{{$student->name}}</p>
                            @endforeach
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{route('subject.edit', $subject->id)}}">Edit</a>
                            {{Form::open(['route'=>['subject.destroy', $subject->id], 'method'=>'delete'])}}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            {{Form::close()}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection