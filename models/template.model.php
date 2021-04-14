<?php

require_once "connection.php";

class ModelTemplate{

    static public function modelStyleTemplate($table){

        $stmt = Connection::connect() -> prepare("SELECT * FROM $table");

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

    }
    
}

