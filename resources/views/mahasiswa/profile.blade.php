@extends('main')

@section('title', '| Home')

@section('content')


@if (Auth::user()->mahasiswa == null)

@include('mahasiswa.form')

@else

	  <table class="table">
		<thead>
			<th>Nim</th>
			<th>Nama</th>
		</thead>
		
		<tbody>
			<td>{{ Auth::user()->mahasiswa->nim }}</td>
			<td>{{ Auth::user()->mahasiswa->nama }}</td>
		</tbody>
	  </table>

@endif



@endsection