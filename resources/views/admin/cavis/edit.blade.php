@extends('layouts.app')

@section('content')
<div class="container">
	{{ Form::model($cavis, ['action' => ['CavisController@update', $cavis->id], 'method' => 'POST']) }}
		{{ method_field('PUT') }}
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Nim</span>
			{{Form::text('nim')}}
			<!-- <input type="text" class="form-control" placeholder="Nim" aria-describ	edby="basic-addon1" name="nim"> -->
		</div>

		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Name</span>
			{{Form::text('name')}}
			<!-- <input type="text" class="form-control" placeholder="Nim" aria-describedby="basic-addon1" name="name"> -->
		</div>

		{{Form::submit('Update', ['class' => 'btn btn-success'])}}

	{{Form::close()}}
</div>
@endsection