<?php

namespace App\Http\Controllers;

use App\Proceso;
use App\Solicitud;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = Auth::user();
		
		$procesos = Proceso::where('id_usuario', $user->id)->get();    
			
		foreach($procesos as $valor){
			
			if($valor->estado==0){
				
				 return view('solicitante/solicitud.index', ['procesos' => $procesos]);
			 }
			 
			 if($valor->estado==1){
				 
				 return view('solicitante/diligenciar.index', ['procesos' => $procesos]);
			 }
			 
			 if($valor->estado==2){
				 
				 return view('solicitante/finalizar.index', ['procesos' => $procesos]);
			 }
			
		}
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $procesos = Proceso::find($id);
        $data = $request->all();
        $procesos->update($data);
		
		$estadoActual=$procesos->estado;
		$estadoSiguiente=$estadoActual+1;

        //echo "id: ".$id;
		$date=date("Y-m-d H:i:s");
		$timestamp = now();
		
		DB::update('update procesos set estado = ? ,updated_at = ?  where id = ?', [$estadoSiguiente,$date,$id]);
		DB::insert('insert into movimientos (created_at, updated_at ,id_usuario, id_proceso,id_estado, descripcion) values (?,?,?,?,?,?)',[$timestamp,null,$procesos->id_usuario,$id,$estadoSiguiente,'']);		
		//echo "insertado";
        return redirect('solicitante/solicitud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        //
    }
}
