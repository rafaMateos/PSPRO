<?php

require_once "Controller.php";

class LoginController extends Controller
{
    public function manageGetVerb(Request $request)
    {

        $listaLibros = null;
        $userString = null;
        $response = null;
        $code = null;


        //if the URI refers to a libro entity, instead of the libro collection
        if (isset($request->getUrlElements()[2])) {
            $userString = $request->getUrlElements()[2];
        }



        $listaLibros = LoginHandlerModel::getLogin($userString);

        if ($listaLibros != null) {

            $code = '200';

        } else {

                $code = '404';
        }


        $response = new Response($code, null, $listaLibros, $request->getAccept());
        $response->generate();

    }

    public function managePostVerb(Request $request)
    {


        $login = $request->getBodyParameters();

        $filasAfectadas = null;
        $response = null;
        $code = null;

        $user = $request->getUser();
        $pass = $request->getPass();


        if (LoginHandlerModel::comprobarUsuario($user, $pass)){

            $filasAfectadas = LoginHandlerModel::postLogin($login);
        }


        if ($filasAfectadas == 1) {
            $code = '200';

        } else {

            $code = '400';

        }

        $response = new Response($code, null, null, $request->getAccept());
        $response->generate();

    }




}