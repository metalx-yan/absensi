<!DOCTYPE html>

<html lang="en">

  	  @include('partials._head')

  <body>
	
 	  @include('partials._navbar')

	<div class="container">

	  {{-- @include('partials._messages') --}}

	  {{-- {{ Auth::check() ? "Logged In" : "Logged Out" }} --}}

	  @yield('content')
	  
	  @include('partials._footer')

	  @include('partials._javascript')

	  {{-- @yield('scripts') --}}

	</div>

  </body>

</html>