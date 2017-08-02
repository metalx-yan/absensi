<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? 'active' : "" }}"><a href="/">Home</a></li>
        <li class="{{ Request::is('ruang') ? 'active' : "" }}"><a href="{{route('ruang.index') }}">Kelas</a></li>
      </ul>
      
      @if (Auth::check())
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
           
              <li class="dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  Hi {{ Auth::user()->name }} <span class="caret"></span>
                 </a>

               <ul class="dropdown-menu" role="menu">
                 <li><a href="{{ route('ruang.index') }}">Ruang</a></li>
                 <li><a href="{{ route('mahasiswa.index') }}">Mahasiswa</a></li>
                 <li><a href="{{ route('mahasiswa.profile') }}">Profile</a></li>


                 <li class="divider"></li>
                  <li>
                 <a href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                 Logout
                 </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     {{ csrf_field() }}
               </form>
              </li>
            </ul>
          </li>
          </ul>
        </li>
      </ul>
      @else
        <a href="{{ route('login') }}" class="btn btn-default navbar-right " style="margin-top:8px;">Login</a>
      @endif

    </div>
  </div>
</nav>