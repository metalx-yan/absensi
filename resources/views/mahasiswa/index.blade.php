@extends('main')

@section('title', '| Home')

@section('content')

  <div class="row">
      <div class="col-md-8">
        <h1>Mahasiswa</h1>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Nim</th>
                <th>Nama</th>
              </tr>
            </thead>
            
            <tbody>
        @forelse ($mahasis as $mahasiswa)
              <tr>
                <th>{{ $mahasiswa->id }}</th>
                <td>{{ $mahasiswa->nim }}</td>
                <td>{{ $mahasiswa->nama }}</td>
              </tr>
          @empty
          <tr><td>Mahasiswa kosong</td></tr>
        @endforelse
            </tbody>  
          </table>
      </div>

    </div>

@endsection
