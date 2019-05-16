@extends('plantilla.solicitante')
@section('content')

 <hr/>
 
 <div>
 <h3>Paso 2: Aprobación/Finalización</h3>  
 </div>
 <hr/>
@foreach($procesos as $proc)	
 <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <tr>
            
            <th>Proceso</th>       
            
        </tr>
        </thead>
        <tbody class="buscar">       
            
                
                <tr>
                <td>{!! $proc->numero !!}</td>                          
               
                </tr>      

            </tr>
        

        </tbody>
    </table>
	
	<table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <tr>
            
            <th>Fecha Inicio</th>       
            
        </tr>
        </thead>
        <tbody class="buscar">       
            
                
                <tr>
                <td>{!! $proc->fechaInicio !!}</td>                          
               
                </tr>      

            </tr>
        

        </tbody>
    </table>
	<table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <tr>
            
            <th>Departamento</th>       
            
        </tr>
        </thead>
        <tbody class="buscar">       
            
                
                <tr>
                <td>{!! $proc->departamento !!}</td>                          
               
                </tr>      

            </tr>
        

        </tbody>
    </table>
	
	<table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <tr>
            
            <th>Municipio</th>       
            
        </tr>
        </thead>
        <tbody class="buscar">       
            
                
                <tr>
                <td>{!! $proc->municipio !!}</td>                          
               
                </tr>      

            </tr>
        

        </tbody>
    </table>
	
	@if($proc->aprobado==0)
		<div class="form-group" align="center">
		<h5>Esperando Aprobacion</h5> 
		</div> 
	@endif
	
	@if($proc->aprobado==1)
    
	{!! Form::open(['id' => 'dataForm', 'method' => 'PATCH', 'url' => 'solicitante/procesos/' . $proc->id ]) !!}   
	
	
    <div class="form-group" align="center">
        {!! Form::submit('Finalizar', ['class' => 'btn btn-outline btn-primary']); !!}
    </div>       
    

    {!! Form::close() !!}
	@endif

@endforeach
@endsection()
