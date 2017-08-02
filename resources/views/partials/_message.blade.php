@if (Session::has('berhasil'))
 
 	
 <div class="row" >
	 <div class="col-md-12">
		<div class="alert alert-success" role="alert">
			<b>Sukses:</b> {{ Session::get('berhasil') }}	
		</div>
		</div>
	</div>

@elseif (count($errors))
	
	<div class="alert alert-danger" role="alert">
		<b>Gagal:</b>
		<ul>
		@foreach ($errors->all() as $error)
			<li>
			{{ $error }}
			</li>
		@endforeach
		</ul>
	</div>

@endif