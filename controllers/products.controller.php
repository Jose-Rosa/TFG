<?php

class ControllerProducts{ 

    /* S H O W    C A T E G O R I E S */

    static public function controllerShowCategories($item, $valor){

        $table="categories";

        $response= ModelProducts::modelShowCategories($table, $item, $valor);

        return $response;
    }


    /* S H O W    S U B C A T E G O R I E S */

    static public function controllerShowSubCategories($item, $valor){

        $table="subcategories";

        $response= ModelProducts::modelShowSubCategories($table, $item, $valor);

        return $response;
    }

    /* S H O W    P R O D U C T S */

	static public function controllerShowProducts($order, $item, $valor){

		$table = "products";

		$response = ModelProducts::modelShowProducts($table, $order, $item, $valor);

		return $response;
	}


    /* S H O W    P R O D U C T    I N F O */

	static public function controllerShowProductInfo($item, $valor){

		$table = "products";

		$response = ModelProducts::modelShowProductInfo($table, $item, $valor);

		return $response;

	}

	/* L I S T    P R O D U C T S */

	static public function controllerListProducts($order, $item, $valor){

		$table = "products";

		$response = ModelProducts::modelListProducts($table, $order, $item, $valor);

		return $response;

	}

}