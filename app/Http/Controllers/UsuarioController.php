<?php

namespace App\Http\Controllers;
use App\User;
use App\Proceso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Auth;
//use AuthenticatesUsers;
class UsuarioController extends Controller
{
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
	 	
	
    public function index()
    {
		//crear usuario por primera vez
		//return view('aprobador/usuarios.create');
		
		$user = Auth::user();                  

         if($user->role=='Aprobador'){

            $users = User::orderBy('id')->get();
		
            return view('aprobador/usuarios.index', ['users' => $users]);

            
         }
		
        //sino es aprobador	es solicitante	
        return view('solicitante/solicitud.index');		
        
        	
		
    }
	
	public function create()
    {		
		
        return view('aprobador/usuarios.create');
    }
	
	public function store(Request $request)
    {
		$user = new User;
        $user->name = $request->input('name');
		$user->lastname = $request->input('lastname');
		$user->role = $request->input('role');
		$user->email = $request->input('email');
		$user->password = Hash::make($request->input('password'));
        $user->save();
		
		//$id_usuario=$user->last();
		//$id_usuario = User::select('id')->orderby('created_at','DESC')->first();
		$id_usuario =$user->id;
		$timestamp = now();
		
		if($request->input('role')=='Solicitante'){
		DB::insert('insert into procesos (created_at, updated_at ,numero, estado, descripcion,fechaInicio,fechaFin,departamento,municipio,aprobado,comentarios,id_usuario) values (?,?,?,?,?,?,?,?,?,?,?,?)',[$timestamp,null,rand(1, 1000000),0,'Inicio del Proceso',$timestamp,null,'','',0,'',$id_usuario]);
        $id_proceso = Proceso::select('id')->orderby('created_at','DESC')->first();
		DB::insert('insert into movimientos (created_at, updated_at ,id_usuario, id_proceso,id_estado, descripcion) values (?,?,?,?,?,?)',[$timestamp,null,$id_usuario,$id_proceso->id,'0','']);		
		}
		
				
        return redirect('aprobador/procesos');
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
    public function edit(Proceso $proceso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proceso  $proceso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proceso $proceso)
    {
        //
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
