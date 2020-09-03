@extends('layouts.admin_app')
@section('content')
    <div class="card">
        <div class="card-header">Our students</div>
        <div class="card-body">
            <div class="row">
                <a href="{{route('student.create')}}" style="float: right" class="btn btn-primary">Add new</a>
            </div><br>
            @if(Session::has('name')&&Session::has('email'))
            <div>
                <p>Студент успешно добавлен</p>
                <p>Имя {{Session::get("name")}}</p>
                <p>Email {{Session::get("email")}}</p>
            </div>
            @endif
            <table>
                <thead>
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Subject
                    </th>
                    <th>
                        email
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>

                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{$student->name}}</td>
                        <td>
                            @foreach($student->subjects as $subject)
                                <p>{{$subject->name_en}}</p>
                            @endforeach
                        </td>
                        <td>{{$student->email}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('student.edit', $student->id)}}">Edit</a>
                            {{Form::open(['route'=>['student.destroy', $student->id], 'method'=>'delete'])}}
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