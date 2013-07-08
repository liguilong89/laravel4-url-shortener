@extends('layouts.scaffold')

@section('main')

<h1>All shorturls</h1>

<p>{{ link_to_route('shorturls.create', 'Add new shorturl') }}</p>

@if ($shorturls->count())
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Long URL</th>
				<th>Short Code</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($shorturls as $shorturl)
                <tr>
                    <td>{{{ $shorturl->long_url }}}</td>
					<td>{{ HTML::link($shorturl->short_code) }}</td>
                    <td>{{ link_to_route('shorturls.edit', 'Edit', array($shorturl->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'route' => array('shorturls.destroy', $shorturl->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    There are no shorturls
@endif

@stop