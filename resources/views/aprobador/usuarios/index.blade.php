@extends('plantilla.aprobador')
@section('content')

 <hr/>
    
   
    <a class="btn btn-primary" href="{{ url('aprobador/usuarios/create') }}" style="margin-bottom: 15px;">Nuevo Usuario</a>

    <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
        <tr>
            
            <th>Nombre</th>
            <th>Email</th>
            
            
            
        </tr>
        </thead>
        <tbody class="buscar">

        @foreach($users as $user)
            
                
                <tr>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->email !!}</td>                
               
                </tr>                    

             

            </tr>
        @endforeach

        </tbody>
    </table>
	


@endsection()