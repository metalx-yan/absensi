@extends('main')

@section('title', '| Create')

@section('content')

  <div class="row">
      <div class="col-md-6 col-md-offset-3">
        
      
          {!!Form::open(['route' => 'ruang.store']) !!}
      
          {{ Form::label('nama', 'Nama :') }}
          {{ Form::text('nama', null, ['class' => 'form-control' ]) }}
      
          {{ Form::label('mata_kuliah', 'Mata Kuliah :', ['style' => 'margin-top:10px;'] ) }}
          {{ Form::text('mata_kuliah', null ,['class' => 'form-control']) }}
      
          {{ Form::label('jam', 'Jam Masuk :', ['style' => 'margin-top:10px;'] ) }}
          {{-- {{ Form::text('jam', null ,['class' => 'form-control']) }} --}}
          <input type="text" id="datepicker" name="datepicker" class="form-control">
      
          {{ Form::label('menit', 'Jam Keluar :', ['style' => 'margin-top:10px;'] ) }}
          {{-- {{ Form::text('menit', null ,['class' => 'form-control']) }} --}}
          <input type="text" id="timepicker" name="timepicker" class="form-control">

          
          {{ Form::submit('Create', ['class' => 'btn btn-success', 'style' => 'margin-top:20px; margin-left:78%; padding-left: 40px; padding-right: 40px;']) }}
      
        
          {!! Form::close() !!}
      
      </div>
  </div>

    <script>
    $( document ).ready(function() {
      console.log( "Load timepicker" );
      $('#datepicker').datetimepicker({
        datepicker: false,
        format: "H:i"
      });
    
      $('#timepicker').datetimepicker({
        datepicker: false,
        format: "H:i:s"
      });
    });

    </script>

@endsection
