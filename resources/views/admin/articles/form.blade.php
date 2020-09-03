@extends('layouts.admin_app')
@section('content')
    <div class="card">
        <div class="card-header">{{$title}}</div>
        <div class="card-body">
            {!! Form::model($model,['url'=>route('article.'.($model->id ?'update':'store'),$model->id),'method'=>$model->id ?'PUT':'POST','class'=>'', 'files'=>true]) !!}
            @if($errors->any())
                <div style="color: red;">
                    {!!  implode('', $errors->all('<div>:message</div>')) !!}
                </div>

            @endif
            <div class="row">
                <label>Name</label>
                <input name="name" class="form-control" value="{{$model->name}}">
            </div>
            <div class="row">
                <label>Short description</label>
                <textarea name="short_description" class="form-control">{{$model->short_description}}</textarea>
            </div><br>
            <div class="row">
                <label>Description</label>
                <textarea name="description" class="form-control">{{$model->description}}</textarea>
            </div><br>
            <div class="row">
                <label>Image</label>
                {{ Form::file('image', null,['class'=>'form-control upload_image']) }}
                <div class="col-md-4">
                    <img id="holder" style="width:100px;" src="{{$model->image}}">
                </div>
                <br>
            </div>
            <input type="submit" value="Save" class="btn btn-success">
            {{Form::close()}}
        </div>
    </div>
@endsection
@section('script')
    <script>
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    console.log(e.target.result)
                    $('#holder').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        //previewing of images before uploading
        $("input[name='image']").change(function() {
            console.log('change');
            readURL(this);
        });
    </script>
@endsection