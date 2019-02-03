<?php

require_once "Controller.php";
require_once dirname(dirname(__FILE__))."/Security.php";
require_once dirname(dirname(__FILE__))."/SignatureInvalidException.php";


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
        $authorized = true;

        $user = $request->getUser();
        $pass = $request->getPass();
        $token = getBearerToken();


        if ($token != null){
            try{

                $dios = Security::decodeToken($token);

            }catch (Exception $e){

                $authorized = false;

            }

            if ($e == null){

                $filasAfectadas = LoginHandlerModel::postLogin($login);
            }


        }elseif (LoginHandlerModel::comprobarUsuario($user, $pass)){

            $filasAfectadas = LoginHandlerModel::postLogin($login);
            $token = Security::generateToken();

        }


        if ($filasAfectadas == 1) {
            $code = '200';

        } elseif (!$authorized) {

            $code = '401';

        }else{

            $code = '400';
        }

        $response = new Response($code, array('Authorization'=>'Bearer '.$token), null, $request->getAccept());
        $response->generate();

    }




}