<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    
    public function index(){
    //return 'Ruta /usuarios resuelta por UserController@index';

    	$users = User::where('role',1)->get();

    	return view('admin.users.index')->with(compact('users'));
    }

    public function store(Request $request){

		$rules=[
			'name' => 'required|max:255',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|min:6',
		];

		$messages=[
				'name'=>'Es necesario ingresar un nombre de usuario',
				'name.max' =>'El nombre excede el numero de caracteres permitidos',
				'email.required' =>'Es necesario ingresar email para el usuario',
				'email.email'=>'El E-mail ingresado es un formato inválido',
				'email.max' =>'El email es extenso',
				'email.unique'=>'Email ya registrado',
				'password.required' =>'Ingrese una contraseña',
				'password.min' =>'Al menos ingresar 6 caracteres para la contraseña'

		];

		$this->validate($request,$rules,$messages);

		$user= new User();
		$user->name = $request->input('name');
		$user->email= $request->input('email');
		$user->password = bcrypt($request->input('password'));
	    $user->role = 1;

	    $user->save();

		//dd($request,all())
    	return back()->with('notification','Usuario registrado');
    }

    public function edit($id){

	     $user = User::find($id);
    	 return view('admin.users.edit')->with(compact('user'));
    }

    public function update(Request $request,$id){
    		$rules=[
			'name' => 'required|max:255',
			'password' => 'min:6',
		];

		$messages=[
				'name'=>'Es necesario ingresar un nombre de usuario',
				'name.max' =>'El nombre excede el numero de caracteres permitidos',
				'password.min' =>'Al menos ingresar 6 caracteres para la contraseña'

		];

    	$user = User::find($id);

    	$this->validate($request,$rules,$messages);
    	$user->name= $request->input('name');
    	$password = $request->input('password');

    	if($password)
    		$user->password=bcrypt($password);

    	$user->save();
    	return back()->with('notification','Usuario actualizado con éxito');
    }

    public function delete($id){

    	$user = User::find($id);

    	$user->delete();

    	return back()->with('notification','Eliminado correctamente');

    }

}
