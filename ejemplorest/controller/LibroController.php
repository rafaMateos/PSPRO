<?php

require_once "Controller.php";
require_once 'JWT.php';


class LibroController extends Controller
{
    public function manageGetVerb(Request $request)
    {

        $listaLibros = null;
        //$queryString = null;
        $id = null;
        $response = null;
        $code = null;

        //if the URI refers to a libro entity, instead of the libro collection
        if (isset($request->getUrlElements()[2])) {
            $id = $request->getUrlElements()[2];
        }

//        if(isset($request->getQueryString()['minpag'])){
//
//            $queryString = $request->getQueryString()['minpag'];
//        }


        $listaLibros = LibroHandlerModel::getLibro($id);

        $token = Security::generateToken();

        if ($listaLibros != null) {
            $code = '200';

        } else {

            //We could send 404 in any case, but if we want more precission,
            //we can send 400 if the syntax of the entity was incorrect...
            if (LibroHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }

        }

        $response = new Response($code,  array('Authorization'=>'Bearer '.$token), $listaLibros, $request->getAccept());
        $response->generate();

    }

    public function managePostVerb(Request $request)
    {

        $libro = $request->getBodyParameters();

        $filasAfectadas = null;
        $response = null;
        $code = null;


        $filasAfectadas = LibroHandlerModel::postLibro($libro);
        $token = Security::generateToken();

        if ($filasAfectadas == 1) {
            $code = '200';

        } else {

            $code = '400';

        }

        $response = new Response($code,  array('Authorization'=>'Bearer '.$token), null, $request->getAccept());
        $response->generate();

    }

    public function manageDeleteVerb(Request $request)
    {
        $filasAfectadas = null;
        $id = null;
        $response = null;
        $code = null;

        //if the URI refers to a libro entity, instead of the libro collection
        if (isset($request->getUrlElements()[2])) {
            $id = $request->getUrlElements()[2];
        }


        $filasAfectadas = LibroHandlerModel::deleteLibro($id);
        $token = Security::generateToken();

        if ($filasAfectadas != 0) {
            $code = '200';

        } else {

            if (LibroHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }

        }

        $response = new Response($code,  array('Authorization'=>'Bearer '.$token), null, $request->getAccept());
        $response->generate();

    }

    public function managePutVerb(Request $request)
    {
        $filasAfectadas = null;
        $libro = null;
        $id = null;
        $response = null;
        $code = null;

        $id = $request->getUrlElements()[2];

        $libro = $request->getBodyParameters();



        $filasAfectadas = LibroHandlerModel::putLibro($libro, $id);
        $token = Security::generateToken();

        if ($filasAfectadas != 0) {
            $code = '200';

        } else {

            if (LibroHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }

        }

        $response = new Response($code,  array('Authorization'=>'Bearer '.$token), null, $request->getAccept());
        $response->generate();

    }

}