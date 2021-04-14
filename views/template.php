<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Proyecto Ilerna</title>

    <?php

        session_start();
    
        /*  S E R V E R    R O U T E  */

        $server = Route::controllerServerRoute();

        /*  S T A T I C    R O U T E  */
        
        $url = Route::controllerRoute(); 

    ?>

    <!---  C S S    P L U G I N S  --->

    <link rel="stylesheet" href="<?php echo $url; ?>views/css/plugins/font-awesome.min.css">
    
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/plugins/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
	<link rel="stylesheet" href="<?php echo $url; ?>views/css/plugins/sweetalert.css">

    <!--- S T Y L E S H E E T S    P E R S O N A L I Z E D  --->

    <link rel="stylesheet" href="<?php echo $url; ?>views/css/template.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/header.css">
    <link rel="stylesheet" href="<?php echo $url; ?>views/css/products.css">  


    <!---  J A V A S C R I P T    P L U G I N S  ---> 
    
    <script src="<?php echo $url; ?>views/js/plugins/jquery.min.js"></script>
    <script src="<?php echo $url; ?>views/js//plugins/bootstrap.min.js"></script>
	<script src="<?php echo $url; ?>views/js//plugins/sweetalert.min.js"></script>
    
</head>

<body>

<?php


/*S T A T I C    C O N T E N T*/

include "modules/header.php";


/*D I N A M I C    C O N T E N T*/

$routes = array();
$route = null;
$productInfo = null;

if(isset($_GET["route"])){

	$routes = explode("/", $_GET["route"]);

	$item = "route";
	$valor =  $routes[0];


	/* F R I E N D L Y    U R L S :   C A T E G O R I E S */

	$routeCategories = ControllerProducts::controllerShowCategories($item, $valor);

	if($routes[0] == $routeCategories["route"]){

		$route = $routes[0];

	}

    /*F R I E N D L Y    U R L S :   S U B C A T E G O R I E S*/


    $routeSubCategories = ControllerProducts::controllerShowSubCategories($item, $valor);

	foreach ($routeSubCategories as $key => $value) {
		
		if($routes[0] == $value["route"]){

			$route = $routes[0];

		}

	}


	/*F R I E N D L Y    U R L S :    P R O D U C T S */

	$routeProducts = ControllerProducts::controllerShowProductInfo($item, $valor);
	
	if($routes[0] == $routeProducts["route"]){

		$productInfo = $routes[0];

	}

	/*F R I E N D L Y    U R L S :     W H I T E L I S T*/

	if($route != null || $routes[0] == "articulos-gratuitos" || $routes[0] == "lo-mas-vendido"){

		include "modules/products.php";

	}else if($productInfo != null){

		include "modules/productInfo.php";

	}else if($routes[0] == "logout"){

		include "modules/".$routes[0].".php";

	}else{

		include "modules/error404.php";

	}


}else{

	include "modules/featured.php";

}


?>

<input type="hidden" value="<?php echo $url; ?>" id="rutaOculta">


<!--- J A V A S C R I P T    P E R S O N A L I Z E D --->

<script src="<?php echo $url; ?>views/js/header.js"></script>
<script src="<?php echo $url; ?>views/js/users.js"></script>


</body>

</html>
