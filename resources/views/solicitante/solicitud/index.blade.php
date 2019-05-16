@extends('plantilla.solicitante')
@section('content')

 <hr/>
 
 <div>
 <h3>Paso 1: Datos del Proceso</h3>  
 </div>
 <hr/>
 @foreach($procesos as $proc)
 <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <tr>
            
            <th>Numero</th>            
            <th>Fecha Inicio</th>            
            
        </tr>
        </thead>
        <tbody class="buscar">         
                
                <tr>
                <td>{!! $proc->numero !!}</td>                          
               <td>{!! $proc->fechaInicio !!}</td>
                </tr>                  

            </tr>
       

        </tbody>
    </table>
{!! Form::open(['id' => 'dataForm', 'method' => 'PATCH', 'url' => 'solicitante/procesos/' . $proc->id ]) !!}
    
	<div class="form-group">
        {!! Form::label('name', 'Descripcion del Proceso'); !!}		
        {!! Form::text('descripcion', $proc->descripcion , ['placeholder' => '', 'class' => 'form-control']); !!}
    </div>
	
	<div class="form-group">
        {!! Form::label('name', 'Departamento'); !!}		
        {!! Form::text('departamento', $proc->departamento , ['placeholder' => '', 'class' => 'form-control']); !!}
    </div>
	
	<div class="form-group">
        {!! Form::label('name', 'Municipio'); !!}		
        {!! Form::text('municipio', $proc->municipio , ['placeholder' => '', 'class' => 'form-control']); !!}
    </div>	
	
    <div class="form-group" align="center">
        {!! Form::submit('Siguiente', ['class' => 'btn btn-outline btn-primary']); !!}
    </div>
        
    

    {!! Form::close() !!}
	
              
    
	
    
	@endforeach
	
	
	
	
	@endsection