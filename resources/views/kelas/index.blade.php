@extends('main')

@section('title', '| Kelas')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h1>Semua Kelas</h1>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Mata Kuliah</th>
                <th>Aksi</th>
              </tr>
            </thead>
            
           @foreach ($kelas as $kelases)
            <tbody>
              <tr>
                <td>{{ $kelases->id }}</td>
                <td>{{ $kelases->nama }}</td>
                <td>{{ $kelases->mata_kuliah }}</td>
                <td>
                    {!! Html::linkRoute('ruang.show', 'View', [$kelases->id] , ['class' => 'btn btn-default btn-sm']) !!}

                    @if ($kelases->mahasiswa->find(Auth::user()->mahasiswa->id))

                    {!! Html::linkRoute('ruang.keluar', 'Keluar', [$kelases->id, Auth::user()->mahasiswa->nim] ,  ['class' => 'btn btn-warning btn-sm']) !!}
                    @else
                    {!! Html::linkRoute('ruang.masuk', 'Tambah', [$kelases->id, Auth::user()->mahasiswa->nim] ,  ['class' => 'btn btn-warning btn-sm']) !!}

                    @endif
                </td>
              </tr>
            </tbody>  
           @endforeach

          </table>
       
      </div>

    </div>
  </div>

@endsection
