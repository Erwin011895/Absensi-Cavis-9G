@extends('layouts.app')

@section('content')
<div class="container">
	
	<table class="table table-bordered">
		<tr>
			<td>#</td>
			<td>Nim</td>
			<td>Nama</td>
			<td>Total Menit</td>
		</tr>

		@foreach($data['cavis'] as $c)
			<tr>
				<td>{{$loop->iteration}}</td>
				<td>{{$c->nim}}</td>
				<td>{{$c->name}}</td>
				<td>{{$data['menit'][$loop->index]}}</td>
			</tr>
		@endforeach
	</table>
</div>
@endsection