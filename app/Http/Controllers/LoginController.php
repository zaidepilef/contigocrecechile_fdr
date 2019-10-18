<?php

namespace App\Http\Controllers;

use App\User;
use App\Rol;
use PhpParser\Node\Stmt\TryCatch;
use Request;
use Session;

class LoginController extends Controller
{
    //

    public function index()
    {
        return view('login');
    }


    public function save(Request $request)
    {

        try {

            $valores = $request::all();
            $nombre_usuario = $valores['nombre_usuario'];
            $pass_usuario = md5($valores['pass_usuario']);

            $usuario = User::where('name', $nombre_usuario)->first();

            if ($usuario) {

                $this->getRolUser($usuario->rol_id);

                $pass = $usuario->password;
                $isldap = $usuario->ldap;

                if ($isldap == 1) {

                    $resp_ldap = $this->VerifyLdap($nombre_usuario, $pass_usuario);
                    /*
                    echo "<pre>";
                    print_r($resp_ldap);
                    echo "</pre>";
                    exit;
                    */

                    if ($resp_ldap === 'OK') {
                        
                        Session::put('username', $usuario->name);
                        Session::put('userapellido', $usuario->apellido);
                        Session::put('usernombre', $usuario->nombre);
                        Session::put('usermail', $usuario->email);
                        Session::put('userrol', $usuario->rol_id);

                        return redirect('/');
                    } else {

                        return redirect()->back()->withErrors($resp_ldap);
                    }
                } else {

                    if ($pass == $pass_usuario) {

                        Session::put('username', $usuario->name);
                        Session::put('userapellido', $usuario->apellido);
                        Session::put('usernombre', $usuario->nombre);
                        Session::put('usermail', $usuario->email);
                        Session::put('userrol', $usuario->rol_id);

                        return redirect('/');
                    } else {

                        return redirect()->back()->withErrors('Password Incorrecto, Vuelva a Intentarlo.');
                    }
                }
            } else {

                return redirect()->back()->withErrors('No Existe Usuario en el Sistema.');
            }
        } catch (ModelNotFoundException $exception) {

            return back()->withError($exception->getMessage())->withInput();
        }
    }


    public function getRolUser($rolid)
    {
        try {

            $rol = Rol::where('id', $rolid)->first();
            
             Session::put('idrolusuario', $rol->id);
             Session::put('nombrerolusuario', $rol->rol_name);
             Session::put('descripcionrolusuario', $rol->rol_descripcion);

        } catch (ModelNotFoundException $exception) {

            return back()->withError($exception->getMessage())->withInput();
        }
    }

    public function VerifyLdap($userLdap, $passLdap)
    {

        try {

            $_resp = "";
            $servidor_LDAP = "servidorldap";
            $servidor_dominio = "dominioldap.cl";
            $ldap_dn = "dc=nombre_dominio_servidor,dc=com";
            $usuario_LDAP = $userLdap;
            $contrasena_LDAP = $passLdap;

            /*
            $conectado_LDAP = ldap_connect($servidor_LDAP);
            ldap_set_option($conectado_LDAP, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($conectado_LDAP, LDAP_OPT_REFERRALS, 0);

            if ($conectado_LDAP) {

                $autenticado_LDAP = ldap_bind($conectado_LDAP, $usuario_LDAP . "@" . $servidor_dominio, $contrasena_LDAP);

                if ($autenticado_LDAP) {

                    $_resp = "OK";
                } else {

                    $_resp = "Usuario LDAP no Válido";
                }
            } else {

                $_resp = "Servidor LDAP no Conectado";
            }
            */
            $_resp = "Servidor LDAP no Conectado";
        } catch (ModelNotFoundException $exception) {

            $_resp = $exception;
        }

        return $_resp;
    }



    public function out()
    {

        Session::forget('username');
        Session::forget('usermail');
        Session::forget('userrol');
        return redirect('/');
    }
}
