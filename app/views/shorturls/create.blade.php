@extends('layouts.scaffold')

@section('main')

<h1>Create Shorturl</h1>

{{ Form::open(array('route' => 'shorturls.store')) }}
    <ul>
        <li>
            {{ Form::label('long_url', 'Long Url:') }}
            {{ Form::text('long_url') }}
        </li>

        <li>
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </li>
    </ul>
{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif

@stop


