@extends('template.layout')
@section('titleGeneral', 'Lista de ciudades...')
@section('sectionGeneral')
<table class="table table-striped">
	<thead>
		<tr>
		    <th>DNI</th>
			<th>Nombre</th>
			<th>Apellido</th>
			<th>correo</th>
			<th>Fecha registro</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($listTUser as $value)
			<tr>
				<td>{{$value->dni}}</td>
				<td>{{$value->firstName}}</td>
				<td>{{$value->surName}}</td>
				<td>{{$value->email}}</td>
				<td>{{$value->created_at}}</td>
				<td class="text-right">
					<button class="btn btn-xs btn-default" onclick="deleteUser('{{$value->idUser}}');">Eliminar</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
@section('js')
<script src="{{asset('viewresources/user/getall.js')}}"></script>
@endsection