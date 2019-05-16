<?php

namespace App\Http\Controllers;

use App\Proceso;
use Illuminate\Http\Request;

class ProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function __construct(){
		 $this->middleware('auth');
	 }
	 
    public function index()
    {
		$procesos = Proceso::orderBy('id')->get();
        return view('aprobador/procesos.index', ['procesos' => $procesos]);
        //return view('procesos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

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
	
	public function procesoUsuario()
    {
            
		
        return view('solicitante/solicitud.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function show(Proceso $proceso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $procesos = Proceso::find($id);
        return view('aprobador/procesos/edit', ['procesos' => $procesos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $procesos = Proceso::find($id);
        $data = $request->all();
        $procesos->update($data);

        //Session::flash('message', $curso['grado'] . ' actualizado satisfactoriamente');
        return redirect('aprobador/procesos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proceso $proceso)
    {
        //
    }
}
