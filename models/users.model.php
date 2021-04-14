<?php

require_once "connection.php";

class ModelUsers{

	/* U S E R    R E G I S T R A T I O N */

	static public function modelUserRegister($table, $data){

		$stmt = Connection::connect()->prepare("INSERT INTO $table(name, password, email, mode, verification) VALUES (:name, :password, :email, :mode, :verification)");

		$stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $data["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $data["email"], PDO::PARAM_STR);
		$stmt->bindParam(":mode", $data["mode"], PDO::PARAM_STR);
		$stmt->bindParam(":verification", $data["verification"], PDO::PARAM_INT);

        /*Si esta conexión se ejecuta*/

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();

        /*Colocamos variable objeto en nulo*/
		$stmt = null;

	}

    

    /* S H O W    U S E R */

    static public function modelShowUser($table, $item, $valor){

		$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt-> close();

		$stmt = null;

	}


}