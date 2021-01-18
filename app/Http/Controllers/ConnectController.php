<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class ConnectController extends Controller
{
    public function _Construct(){
        //cualquier funcion o metodo de este controlador que se ejecute requiere que el usuario sea un visitante
        $this->middleware('guest')->except(['getLogout']);
    }

    public function getLogin(){
    return view('connect.login');
    }

    public function postLogin(Request $request){
        // validacion de reglas para el login de usuario
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];

        //mensajes
        $messages = [
            'email.required' => 'El Correo Electronico es requerido',
            'email.email' => 'El formato del correo es invalido',
            'password.required' => 'Por favor escriba una contraseña.',
            'password.min' => 'la contraseña debe de tener al menos 8 caracteres.'
        ];

        //le decimos al validador que crea una variable con las clases validator y metodo make con los valores del formulario (reglas de validacion y mensajes).
        //nos diria que se ha producido un error + los campos en que esta el error
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'se ha producido un error')->with('typealert', 'danger');
        else:
            //condicional para autentificar al usuario cuando sus credenciales sean correctos
            //si no, mostrara un mensaje que los datos son incorrectos
            if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)):
                if(Auth::user()->status == "100"):
                    return redirect('/logout');
                else:
                    return redirect('/');
                endif;
            else:
                return back()->with('message', 'los datos ingresados no son correctos')->with('typealert', 'danger');
            endif;

        endif;
    }

    public function getRegister(){
        return view('connect.register');
        }

    public function postRegister(Request $request){
        // validacion de reglas para el registro de campos
        $rules =[
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'cpassword' => 'required|min:8|same:password',
            'phone' => 'required'
        ];

        //mensaje para la regla de validacion
        $messages = [
            'name.required' => 'El campo Nombre es obligatorio.',
            'lastname.required' => 'El campo Apellido es obligatorio.',
            'email.required' => 'El Campo Correo Electronico es obligatorio.',
            'email.email' => 'El formato del Correo Electronico es invalido.',
            'email.unique' => 'Este Correo Electronico ya se encuentra registrado.',
            'password.required' => 'Por favor escriba una contraseña.',
            'password.min' => 'la contraseña debe de tener al menos 8 caracteres.',
            'cpassword.required' => 'Es necesario confirmar la contraseña.',
            'cpassword.min' => 'La confirmacion de la contraseña debe de tener al menos 8 caracteres.',
            'cpassword.same' => 'Las contraseñas no coinciden.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()):
            return back()->withErrors($validator)->with('message', 'se ha producido un error')->with('typealert', 'danger');
        else:
            $user = new User;
            $user->name = e($request->input('name'));//con e podemos evitar ataques por inyeccion
            $user->lastname = e($request->input('lastname'));
            $user->email = e($request->input('email'));
            $user->password = Hash::make($request->input('password'));
            $user->cellphone_number = e($request->input('phone'));

            if ($user->save()):
                return redirect('/login')->with('message', 'Su usuario se ha creado con exito, ahora puede iniciar sesion')->with('typealert', 'succes');
            endif;
        endif;
    }

    public function getLogout(){
        $status = Auth::user()->status;
        Auth::logout();
        if($status == "100"):
        return redirect('/login')->with('message', 'Su usuario fue suspendido')->with('typealert', 'Danger');
        else:
            return redirect('/');
        endif;
    }
}
