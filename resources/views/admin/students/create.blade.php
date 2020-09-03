@extends('layouts.admin_app')
@section('content')
    <div class="card">
        <div class="card-header">Add new student</div>
        <div class="card-body">
            {!! Form::open(['url'=>route('student.store'),'method'=>'POST']) !!}
            @if($errors->any())
                <div style="color: red;">
                    {!!  implode('', $errors->all('<div>:message</div>')) !!}
                </div>

            @endif
            <div class="row">
                <label>Name</label>
                <input name="name" class="form-control" value="">
            </div><br>
            <div class="row">
                <label>Email</label>
                <input name="email" class="form-control" value="">
            </div><br>
            <div class="row">
                <label>Password</label>
                <input name="password" type="password" class="form-control">
            </div><br>
            <div class="row">
                <label>Password confirmation</label>
                <input name="password_confirmation" type="password" class="form-control">
            </div><br>
            <div class="row">
                <label>Subjects</label>
                {{ Form::select('subjects_id[]', $subjects, null, ['multiple' => 'multiple', 'class'=>'form-control select2']) }}
            </div>
            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-success">
            </div>
            {{Form::close()}}
        </div>
    </div>
@endsection