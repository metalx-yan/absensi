  <div class="col-md-4 cat">
          <div class="panel panel-default">
            <div class="panel-heading text-center">Mahasiswa Baru</div>
              <div class="panel-body">
              {{ Form::open(['route' => 'mahasiswa.store']) }}

              {{ Form::label('nim', 'Nim :') }}
              {{ Form::text('nim', null , [ 'class' => 'form-control' ]) }}

              {{ Form::label('nama', 'Nama :', ['style' => 'margin-top:10px;'] ) }}
              {{ Form::text('nama', null ,['class' => 'form-control']) }}

              {{ Form::submit('Create Mahasiswa', ['class' => 'btn btn-primary btn-block btn-style', 'style' => 'margin-top:10px;']) }}

              {{ Form::close() }}
              </div>
            </div>
          </div>
		</div>