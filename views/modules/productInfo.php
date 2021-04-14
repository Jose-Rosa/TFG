<?php


$server =Route::controllerServerRoute();
$url = Route::controllerRoute();

?>

<!--- BR ---->

<div class="container-fluid well well-sm">

    <div class="container">

        <div class="row">

            <ul class="breadcrumb backGroundBreadcrumb">

                <li><a href="<?php echo $url; ?>">Inicio</a></li>
                <li class="active"><?php echo $routes[0] ?></li>

            </ul>

        </div>
        
    </div>

</div>
