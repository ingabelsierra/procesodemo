@extends('plantilla.aprobador')
@section('content')

 <hr/>
      
   

    <table class="table table-bordered">
        <thead>
        <tr>
            
            <th>Proceso</th>
            <th>Incio</th>            
			<th>Aprobado</th>
			<th>Estado</th>
			<th>Descripción</th>
			<th>Fin</th>
            <th width="110px;">Gestionar</th>
            
        </tr>
        </thead>
        <tbody>
            
          @foreach($procesos as $proceso)
            <tr>
                
                <td>{!! $proceso->numero !!}</td>
				<td>{!! $proceso->fechaInicio !!}</td>                                
                <td>{!! $proceso->aprobado !!}</td>
				<td>{!! $proceso->estado !!}</td>
				<td>{!! $proceso->descripcion !!}</td>
				<td>{!! $proceso->fechaFin !!}</td>
                <td>
                    <a class="btn btn-success btn-sm" href="procesos/{!! $proceso->id !!}/edit">Gestionar</a>

                </td>

             
            </tr>
        @endforeach  

        </tbody>
    </table>

@endsection()
