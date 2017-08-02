@extends('main')

@section('title', '| Data Mahasiswa')

@section('content')

<div class="row"> 
	<div class="col-md-8 down">

	<h1>Mahasiswa Yang ada di ruang {{ $kelas->id }}</h1>

		<table class="table table-bordered">
					  <thead>
					  <th>nim</th>
					  <th>nama</th>
					  <th>absen</th>


				{{-- 	  	<th>Nama</th>
					  	<th>Mata Kuliah</th>
					  	<th>Absen</th>
					  	<th>Jumlah mahasiswa</th>
					  	<th>Ikut Kelas</th> --}}
					  </thead>

					  <tbody>
						@forelse ($kelas->mahasiswa as $mahasiswa)
						<tr>
							 <td>{{ $mahasiswa->id }}</td>
							 <td>{{ $mahasiswa->nama }}</td>

	 						@if ( Auth::check() and $mahasiswa->id == Auth::user()->mahasiswa->id)
	 					 	 	<td>
	 					 	 	@if (Auth::user()->mahasiswa->absen->where('ruang_id', $kelas->id)->first())
	 					 	 		{{-- {{ substr(Auth::user()->mahasiswa->absen->where('ruang_id', $kelas->id)->first()->waktu, 0, 4) }} --}}
	 					 	 		<form action="{{ route('absen.destroy',$kelas->absen->where('mahasiswa_id', $mahasiswa->id)->first()->id ) }}" method="post">
	 					  				{{csrf_field()}}
	 					  				{{method_field('DELETE')}}
	 					  					<input type="hidden" name="id" value="{{$kelas->absen->where('mahasiswa_id', $mahasiswa->id)->first()->id}}">
	 					  					<input type="submit" value="{{$kelas->absen->where('mahasiswa_id', $mahasiswa->id)->first() ? substr($kelas->absen->where('mahasiswa_id', $mahasiswa->id)->first()->waktu, 0,4) : null}}">
	 					  				</form>
	 					 	 		@else
	 					 	 		@if ($belumHabis)
		                  		   		<form action="{{ route('absen.store') }}" method="post">
	 					  				{{csrf_field()}}
	 					  					<input type="hidden" name="ruang_id" value="{{$kelas->id}}">
	 					  					<input type="submit" value="Absen">
	 					  				</form>
	 					 	 		@endif
	 					 	 	@endif
	 					  		</td>
	 					  		@else 
	 						@endif
						</tr>
							 @empty 
							 <tr>
							 	<td>
							 		Mahasiswa kosong
							 	</td>
							 </tr>
						@endforelse					

						
						{{ $kelas->jam->jam_masuk }}
						<br>
						{{ $kelas->jam->jam_keluar }}

						
						 {{-- <td>{{ $kelas->mata_kuliah }}</td>
						 <td>jnjn</td>
						 <td>{{ $kelas->mahasiswa->count() }}</td>
						 <td>a</td> --}}
					  </tbody>
					</table>
			</div>

	</div>
</div>


@endsection

