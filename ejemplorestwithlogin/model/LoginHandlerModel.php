<?php

require_once 'JWT.php';


class LoginHandlerModel
{

    public static  function generateToken($user){

        $time = time();
        $key = 'my_secret_key';

        $token = array(
            'iat' => $time, // Tiempo que inició el token
            'exp' => $time + (60*60), // Tiempo que expirará el token (+1 hora)
            'data' => [ // información del usuario
                'id' => 1,
                'name' => 'Eduardo'
            ]
        );




    }



    public static function getLogin($userString)
    {

        $listaLogin = null;
        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();

            $query = "SELECT user, pass FROM Logins";


            if ($userString != null) {

                $query = $query . " WHERE user = ? ";

            }

            $prep_query = $db_connection->prepare($query);


            if ($userString != null) {

                $prep_query->bind_param('s', $userString);
            }

            $prep_query->execute();

            $lineasAfectadas = $prep_query->affected_rows;



            $prep_query->bind_result($user, $pass);

            if ($lineasAfectadas ==-1){

            if($userString != null){

                while ($prep_query->fetch()) {

                    $user = utf8_encode($user);
                    $pass = utf8_encode($pass);
                    $listaLogin = new LoginModel($user, $pass);
                }


            }else

                {

                while ($prep_query->fetch()) {
                    $user = utf8_encode($user);
                    $pass = utf8_encode($pass);
                    $login = new LoginModel($user, $pass);

                    $listaLogin[] = $login;
                }

                }
            }


        $db->closeConnection();

        return $listaLogin;
    }


    public static function postLogin($login)
    {

        $filasAfectadas = 0;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();

        $hashpass = password_hash($login->pass, PASSWORD_DEFAULT);

            $query = ("insert into Logins (user,pass) values (?,?)");

            $prep_query = $db_connection->prepare($query);

            $prep_query->bind_param("ss",  $login->user, $hashpass);

            $prep_query->execute();

            $filasAfectadas = $prep_query->affected_rows;

        $db->closeConnection();

        return $filasAfectadas;
    }





    //returns true if $id is a valid id for a book
    //In this case, it will be valid if it only contains
    //numeric characters, even if this $id does not exist in
    // the table of books
    public static function isValid($id)
    {
        $res = false;

        if (ctype_digit($id)) {
            $res = true;
        }
        return $res;
    }


    public static function comprobarUsuario($userIntroducido, $passIntroducido){

        $logueado = false;

        $supuestoUser = self::getLogin($userIntroducido);

        if ($supuestoUser!= null){

            $supuestoUserName = $supuestoUser->getUser();
            $supuestaPass = $supuestoUser->getPass();


            if ($supuestoUserName == $userIntroducido){


                if (password_verify($passIntroducido, $supuestaPass)){

                    $logueado = true;

                }


            }

        }
        return $logueado;
    }

}