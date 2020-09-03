@extends('layouts.admin_app')
@section('content')
    <div class="card">
        <div class="card-header">Our students</div>
        <div class="card-body">
            <div class="row">
                <a href="{{route('article.create')}}" style="float: right" class="btn btn-primary">Add new</a>
            </div><br>
            <table>
                <thead>
                <tr>
                    <th>
                        Image
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Short description
                    </th>
                    <th>
                        link
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>

                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr>
                        <td><img src="{{$article->image}}" style="width: 100px"></td>
                        <td>{{$article->name}}</td>
                        <td>
                            {{$article->short_description}}
                        </td>
                        <td><a href="#">Link</a></td>
                        <td>
                            <a class="btn btn-primary" href="{{route('article.edit', $article->id)}}">Edit</a>
                            {{Form::open(['route'=>['article.destroy', $article->id], 'method'=>'delete'])}}
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