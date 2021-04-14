<?php

class ControllerTemplate{

    /* T E M P L A T E */

    public function template(){

        include "views/template.php";
    }

    /* D Y N A M I C    S T Y L E S */

    public function controllerStyleTemplate(){

        $table = "template";

        $response= ModelTemplate::modelStyleTemplate($table);

        return $response;
    }


}