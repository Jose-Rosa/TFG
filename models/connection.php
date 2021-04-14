<?php


/* D A T A B A S E     C O N N E C T I O N */

class Connection{

    public function connect(){

        $link = new PDO("mysql:host=localhost;dbname=ecommerceilerna","root","",
        
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
                            );
        return $link;

    }

}