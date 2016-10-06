@extends('layouts.app')

@section('content')

<div class="container">

	{{ Form::open(['action' => 'CavisController@store', 'method' => 'POST']) }}
		{{Form::token()}}
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Nim</span>
			<input type="text" class="form-control" placeholder="Nim" aria-describedby="basic-addon1" name="nim">
		</div>

		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Name</span>
			<input type="text" class="form-control" placeholder="Nama" aria-describedby="basic-addon1" name="name">
		</div>

		{{Form::submit('Add', ['class' => 'btn btn-success'])}}

	{{Form::close()}}
	
	
</div>

@endsection