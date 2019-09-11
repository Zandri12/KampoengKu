@extends('layouts.app')
@section('head')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection
@section('content')

<div class="container">
		<center>
			<h4>Laporan Hasil Pemungutan suara</h4>
			
		</center>
		<br/>
		<a href="/voting/cetak_pdf" class="btn btn-primary" target="_blank">CETAK</a>
		<table class='table table-bordered'>
			<thead>
				<tr>
						<th>No</th>
						<th>Kandidat 1</th>
						<th>Kandidat 2</th>
						<th>Kandidat 3</th>
				</tr>
			</thead>
			<tbody>
				@php $i=1 @endphp
				@foreach($hasils as $data)
				<tr>
						<td>{{ $i++ }}</td>
						<td>{{$data['data1']}}</td>
						<td>{{$data['data2']}}</td>
						<td>{{$data['data2']}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<div>
			<p>Note :</p>
		</div>
		
	</div>
@endsection