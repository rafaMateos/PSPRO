<?php

require_once "Controller.php";

class NotAuthorizationController extends Controller
{
    public function manage(Request $req)
    {
        $response = new Response('401',null, 'No authorization nene flama flecha', $req->getAccept());
        $response->generate();
    }

}