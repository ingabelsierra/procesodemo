<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
		
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
			'lastname' => ['required', 'string', 'max:255'],
			'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //$user =  
		/*return User::create([
            'name' => $data['name'],
			'lastname' => $data['lastname'],
			'role' => $data['role'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);*/
		//$user = Auth::user();
		
		$user = Auth::user();
		
		if($user){
			return view('procesos.index');
		}
		
		/*$user = new User;
        $user->name = $data['name'];
		$user->lastname = $data['lastname'];
		$user->role = $data['role'];
		$user->email = $data['email'];
		$user->password = Hash::make($data['password']);
        $user->save();*/
		
		return view('procesos.index');

		//return view('procesos.index', ['procesos' => $user]);
		//return '/procesos/';
    }
	
	/*protected function authenticated(Request $request, $user)
   {
    if ($user->status=='lock') {
        auth()->logout();
        return back()->with('warning', 'Your account is locked');
    }
    return redirect()->intended($this->redirectPath());
   }*/
}
