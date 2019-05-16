@extends('plantilla.aprobador')
@section('content')

 
    <div class="alert alert-danger">
                                Aprobar Proceso.
    </div>
 
    {!! Form::open(['id' => 'dataForm', 'method' => 'PATCH', 'url' => 'aprobador/procesos/' . $procesos->id ]) !!}
    <div class="form-group">
        {!! Form::label('name', 'aprobado'); !!}
        {!! Form::text('aprobado', $procesos->aprobado , ['placeholder' => 'Ingrese Nombre', 'class' => 'form-control']); !!}
    </div>

        
    {!! Form::submit('Aprobar', ['class' => 'btn btn-outline btn-primary']); !!}

    {!! Form::close() !!}
@endsection
