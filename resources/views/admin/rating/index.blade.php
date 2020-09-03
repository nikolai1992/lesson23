@extends('layouts.admin_app')
@section('content')
    <div class="card">
        <div class="card-header">Rating</div>
        @if($errors->any())
            <div style="color: red;">
                {!!  implode('', $errors->all('<div>:message</div>')) !!}
            </div>

        @endif
        <div class="card-body">
            <br>
            @foreach($subjects as $subject)
                <h2>{{$subject->name}}</h2>
                <table>
                    <thead>
                    <tr>
                        <th>
                            Students
                        </th>
                        <th>
                            Rating
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($subject->students as $student)
                        <tr>
                            <td>{{$student->name}}</td>
                            <td>
                                {!! Form::open(['url'=>route('rating.update'),'method'=>'POST', 'id' => 'rating_form_'.$subject->id.$student->id]) !!}
                                <input type="text" name="rating" class="form-control" value="{{$student->pivot->rating}}">
                                <input type="hidden" name="student_id" value="{{$student->id}}">
                                <input type="hidden" name="subject_id" value="{{$subject->id}}">
                                {{Form::close()}}
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success" form="rating_form_{{$subject->id}}{{$student->id}}">Save</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
@endsection