@extends('layouts.admin_app')
@section('content')
    <div class="card">
        <div class="card-header">Create a new subject</div>
        <div class="card-body">
            {!! Form::open(['url'=>route('subject.store'),'method'=>'POST']) !!}
            <div class="row">
                <label>Name en</label>
                <input name="name_en" class="form-control" value="">
            </div>
            <div class="row">
                <label>Name ru</label>
                <input name="name_ru" class="form-control" value="">
            </div>
            <div class="row">
                <label>Students</label>
                {{ Form::select('students_id[]', $students, null, ['multiple' => 'multiple', 'class'=>'form-control select2']) }}
            </div>
            <div class="form-group">
                <input type="submit" value="Save" class="btn btn-success">
            </div>
            {{Form::close()}}
        </div>
    </div>
@endsection