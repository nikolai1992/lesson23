@extends('layouts.app')

@section('content')



    <div class="card">
        <div class="card-header">@lang('site_labels.subjects')</div>

        <div class="card-body">
            <h3>@lang('site_labels.list_of_subjects')</h3>
            @if(count($subjects))
                <ul>
                    @foreach($subjects as $subject)
                        <li>{{$subject->description}}</li>
                    @endforeach
                </ul>
            @else
                <p>@lang('site_labels.no_subjects')</p>
            @endif
        </div>
    </div>

@endsection