<?php

require_once "connection.php";

class ModelProducts{

    /* S H O W    C A T E G O R I E S */

    static public function modelShowCategories($table, $item, $valor){

       if($item != null){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();


       }else{

            $stmt = Connection::connect()->prepare("SELECT * FROM $table");

            $stmt -> execute();

            return $stmt -> fetchAll();

        
       }

        $stmt -> close();

        $stmt = null;

    }


    /* S H O W    S U B C A T E G O R I E S */


    static public function modelShowSubCategories($table, $item, $valor){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
        
    }


    /* S H O W    P R O D U C T S */


    static public function modelShowProducts($table, $order, $item, $valor){

        if($item != null){

            $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item ORDER BY $order DESC LIMIT 8");

            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

            $stmt -> execute();

             return $stmt -> fetchAll();

        }else{

            $stmt = Connection::connect()->prepare("SELECT * FROM $table ORDER BY $order DESC LIMIT 8");

            $stmt -> execute();

             return $stmt -> fetchAll();

        }

        $stmt -> close();

        $stmt = null;
         

    }



    /* S H O W    P R O D U C T   I N F O */

    static public function modelShowProductInfo($table, $item, $valor){

        $stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

        $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
        
    }


}