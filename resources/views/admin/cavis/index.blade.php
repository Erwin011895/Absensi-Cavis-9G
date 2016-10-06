@extends('layouts.app')

@section('content')
<div class="container">
	
	<a href="{{action('CavisController@create')}}">Add New</a>

	<table class="table table-bordered">
		<tr>
			<td>#</td>
			<td>Nama</td>
			<td>Nim</td>
			<td>Action</td>
		</tr>

		@foreach($cavis as $c)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$c->nim}}</td>
				<td>{{$c->name}}</td>
				<td>
					{{Form::open(['action' => ['CavisController@destroy', $c->id]])}}
					<a href="{{action('CavisController@edit', $c->id)}}" class="btn btn-info">Edit</a>

					{{ method_field('DELETE') }}
					{{Form::submit("Delete")}}
					{{Form::close()}}
				</td>
			</tr>
		@endforeach
	</table>
</div>
@endsection