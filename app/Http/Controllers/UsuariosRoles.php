<?php

namespace App\Http\Controllers;

use App\User;
use App\Rol;
use App\Modulo;
use Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use View;
use Session;

class UsuariosRoles extends Controller
{
    //
    public function index()
    {
        View::share('roles', Rol::all());
        // formNewUser
        $users = User::all();
        return view('AdminUsuariosRoles.index', ['users' => $users, 'formEditUser' => false]);
    }

    public function newUser(Request $request)
    {
        try {

            $newUser = new User;
            $resultado = $request::all();
            echo "<pre>";
            print_r($resultado);
            echo "</pre>";
            $validate = Validator::make($resultado, [
                'usernombre' => 'required|string',
                'userapellido' => 'required|string',
                'usermail' => 'required|email|max:255',
                'newusername' => 'required|string|max:255',
            ]);



            if ($validate->fails()) {
                // echo"falil";
                return redirect()->back()->withErrors($validate->errors());
            } else {
                // echo"val";
                // valido
                $id = $resultado['userid'];
                $usernombre = $resultado['usernombre'];
                $userapellido = $resultado['userapellido'];
                $usermail = $resultado['usermail'];
                $newusername = $resultado['newusername'];
                $ldap = $resultado['ldap'];
                $newuserpass = $resultado['newuserpass'];
                $newuserpassconfirm = $resultado['newuserpassconfirm'];
                $userrolid = $resultado['userrolid'];

                $newUser->nombre = $usernombre;
                $newUser->apellido = $userapellido;
                $newUser->email = $usermail;
                $newUser->name = $newusername;
                $newUser->rol_id = $userrolid;

                if (isset($id)) {
                    $usuarioup = User::find($id);

                    $on = ($ldap === 'on') ? true : false;
                    $usuarioup->update([
                        'nombre' => $usernombre,
                        'apellido' => $userapellido,
                        'email' => $usermail,
                        'name' => $newusername,
                        'rol_id' => $userrolid,
                        'ldap' => $on
                    ]);
                    return redirect()->back()->with('mensajes_ok', 'Usuario Guardado');
                } else {

                    // si es ldap
                    if ($ldap === 'on') {

                        $newUser->ldap = true;
                        $newUser->password = md5($newuserpass);
                        $newUser->save();
                        return redirect()->back()->with('mensajes_ok', 'Usuario Almacenado');
                    } else {

                        $newUser->ldap = false;

                        if ($newuserpass === $newuserpassconfirm) {
                            $newUser->password = md5($newuserpass);
                            $newUser->save();
                            return redirect()->back()->with('mensajes_ok', 'Usuario Almacenado');
                        } else {
                            return redirect()->back()->withErrors('Passwords no coinciden');
                        }
                    }
                }
            }
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function editUser($id)
    {
        try {

            View::share('roles', Rol::all());

            $users = User::all();

            /*

            echo "<br> id : " . $id;
            $usuario = User::where('id', $id)->first();

            echo "<pre>";
            print_r($usuario);
            echo "</pre>";
            echo "<pre>";
            var_dump($usuario);
            echo "</pre>";
            */

            return view('AdminUsuariosRoles.usuarioRoles',  ['users' => $users, 'formEditUser' => false]);
            // return redirect()->back()->with('formEditUser',true);
        } catch (ModelNotFoundException $exception) {
            // return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function saveUser(Request $request)
    { }




    ////
    public function roles()
    {
        View::share('roles', Rol::all());

        View::share('modulos', Modulo::all());

        return view('AdminUsuariosRoles.rol');
    }

    public function rolSave(Request $request)
    {

        try {

            $newRol = new Rol;
            $resultado = $request::all();
            //echo "<pre>";
            //print_r($resultado);
            //echo "</pre>";
            $validate = Validator::make($resultado, [
                'rolnombre' => 'required|string|max:255',
                'roldescripcion' => 'required|string|max:255',
            ]);


            if ($validate->fails()) {

                return redirect()->back()->withErrors($validate->errors());
            } else {

                // valido
                $rolid = $resultado['rolid'];
                $rolnombre = $resultado['rolnombre'];
                $roldescripcion = $resultado['roldescripcion'];
                $newRol->rol_name = $rolnombre;
                $newRol->rol_description = $roldescripcion;

                if (isset($rolid)) {
                    $rolUpdate = Rol::find($rolid);
                    $rolUpdate->update([
                        'rol_name' => $rolnombre,
                        'rol_description' => $roldescripcion
                    ]);
                    return redirect()->back()->with('mensajes_ok', 'Rol Actualizado');
                } else {
                    $newRol->save();
                    return redirect()->back()->with('mensajes_ok', 'Rol Almacenado');
                }
            }
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function deleteRol($id)
    {
        try {
            $res = Rol::where('id', $id)->delete();


        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
