<?php

require_once "ConsCapitulosModel.php";


class CapituloHandlerModel
{

    public static function getCapitulo($id, $id2)
    {
        $listaCapitulos = null;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();



        $valid = self::isValid($id);
        $valid2 = self::isValid($id2);


        if ($valid === true || $id == null) {
            $query = "SELECT " . \ConstantesDB\ConsCapitulosModel::CODLIB . ","
                . \ConstantesDB\ConsCapitulosModel::CODCAP . ","
                . \ConstantesDB\ConsCapitulosModel::TITULO . ","
                . \ConstantesDB\ConsCapitulosModel::PAGI . ","
                . \ConstantesDB\ConsCapitulosModel::PAGF ." FROM " . \ConstantesDB\ConsCapitulosModel::TABLE_NAME;


            if ($id2 != null) {

                $query = $query . " WHERE codigoCapitulo = ? ";



            }else if ($id2 != null) {

                $query = $query . " WHERE codigoLibro = ? ";

            }


            $prep_query = $db_connection->prepare($query);


            if ($id != null) {

                $prep_query->bind_param('s', $id);
            }

            if ($id2 != null) {

                $prep_query->bind_param('s', $id2);
            }


            $prep_query->execute();
            $listaCapitulos = array();



            $prep_query->bind_result($codL, $codC , $tit, $pagI, $pagF);


                while ($prep_query->fetch()) {
                    $tit = utf8_encode($tit);
                    $capitulo = new CapituloModel($codL, $codC , $tit, $pagI, $pagF);
                    $listaCapitulos[] = $capitulo;
                }




        }
        $db->closeConnection();

        return $listaCapitulos;
    }



    public static function isValid($id)
    {
        $res = false;

        if (ctype_digit($id)) {
            $res = true;
        }
        return $res;
    }

}