@extends('plantilla.aprobador')
@section('content')

 <hr/>
      
   

    <table class="table table-bordered">
        <thead>
        <tr>
            
            <th>Fecha</th>
            <th>Usuario</th>            
			<th>Proceso</th>
			<th>Estado</th>
					
            
        </tr>
        </thead>
        <tbody>
            
          @foreach($movimientos as $movimiento)
            <tr>
                
                <td>{!! $movimiento->created_at !!}</td>
				<td>{!! $movimiento->id_usuario !!}</td>                                
                <td>{!! $movimiento->id_proceso !!}</td>
				<td>{!! $movimiento->id_estado !!}</td>
				         
            </tr>
        @endforeach  

        </tbody>
    </table>

@endsection()
