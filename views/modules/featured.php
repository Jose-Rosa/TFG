<?php

$server = Route::controllerServerRoute();

$route ="sin-categoria";

?>


<figure class="banner">

    <img src="http://localhost/backend/views/img/banner/default4.jpg" class="img-responsive" width="100%">

    <div class="textBanner textRight">
        <h1 style="color:#fff"> Ofertas de la semana </h1>
        <h2 style="color:#fff"><strong>35% off</strong></h1>
        <h3 style="color:#fff"> Date prisa y cómpralo ahora </h3>
    </div>

</figure>


<?php

$modulesTitles= array("Artículos Gratuitos", "Lo más vendido");
$modulesRoute = array ("articulos-gratuitos", "lo-mas-vendido");

if($modulesTitles[0] == "Artículos Gratuitos"){

    $order="id";
	$item ="price";
	$valor = 0;

    $free=ControllerProducts::controllerShowProducts($order, $item, $valor);
}


if($modulesTitles[1] == "Lo más vendido"){

    $order="solds";
	$item = null;
	$valor = null;
    $solds=ControllerProducts::controllerShowProducts($order, $item, $valor);
}

$modules = array($free, $solds);

for ($i = 0; $i < count($modulesTitles); $i ++){

    echo '<div class="container-fluid well well-sm productsBar">

			<div class="container">
				
				<div class="row">
					
					<div class="col-xs-12">

						

					</div>

				</div>

			</div>

		</div>

<div class="container-fluid products">
	
			<div class="container">
		
				<div class="row">

					<div class="col-xs-12 tituloDestacado">

						<div class="col-sm-6 col-xs-12">
					
							<h1><small>'.$modulesTitles[$i].' </small></h1>

						</div>

						<div class="col-sm-6 col-xs-12">
					
							<a href="'.$modulesRoute[$i].' ">
								
								<button class="btn btn-default backColor pull-right">
									
									Más artículos <span class="fa fa-chevron-right"></span>

								</button>

							</a>

						</div>

					</div>

					<div class="clearfix"></div>

					<hr>

				</div>

				<ul class="grid'.$i.'">';

				foreach ($modules[$i] as $key => $value) {
					
					echo '<li class="col-md-3 col-sm-6 col-xs-12">

							<figure>
								
								<a href="'.$value["route"].'" class="pixelProduct">
									
									<img src="'.$server.$value["cover"].'" class="img-responsive">

								</a>

							</figure>

							<h4>
					
								<small>
									
									<a href="'.$value["route"].'" class="pixelProduct">
										
										'.$value["title"].'<br>

										<span style="color:rgba(0,0,0,0)">-</span>';

										if($value["new"] != 0){

											echo '<span class="label label-warning fontSize">Nuevo</span> ';

										}

										if($value["deal"] != 0){

											echo '<span class="label label-warning fontSize">'.$value["dealDiscount"].'% off</span>';

										}

									echo '</a>	

								</small>			

							</h4>

							<div class="col-xs-6 price">';

							if($value["price"] == 0){

								echo '<h2><small>GRATIS</small></h2>';

							}else{

								if($value["deal"] != 0){

									echo '<h2>

											<small>
						
												<strong class="deal">EUR €'.$value["price"].'</strong>

											</small>

											<small>€'.$value["priceDeal"].'</small>
										
										</h2>';

								}else{

									echo '<h2><small>EUR €'.$value["price"].'</small></h2>';

								}
								
							}
											
							echo '</div>

							<div class="col-xs-6 links">
								
								<div class="btn-group pull-right">
									
									<button type="button" class="btn btn-default btn-xs wishlist" idProduct="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">
										
										<i class="fa fa-heart" aria-hidden="true"></i>

									</button>';

									if($value["type"] == "virtual" && $value["price"] != 0){

										if($value["deal"] != 0){

											echo '<button type="button" class="btn btn-default btn-xs addToCart"  idProduct="'.$value["id"].'" image="'.$server.$value["cover"].'" title="'.$value["title"].'" price="'.$value["priceDeal"].'" type="'.$value["type"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true"></i>

											</button>';

										}else{

											echo '<button type="button" class="btn btn-default btn-xs addToCart"  idProduct="'.$value["id"].'" image="'.$server.$value["cover"].'" title="'.$value["title"].'" price="'.$value["price"].'" type="'.$value["type"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true"></i>

											</button>';

										}

									}




									
									echo '<a href="'.$value["route"].'" class="pixelProduct">
									
										<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
											
											<i class="fa fa-eye" aria-hidden="true"></i>

										</button>	
									
									</a>

								</div>

							</div>

						</li>';
				}

				echo '</ul>

				<ul class="list'.$i.'" style="display:none">';

				foreach ($modules[$i] as $key => $value) {

					echo '<li class="col-xs-12">
					  
				  		<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
							   
							<figure>
						
								<a href="'.$value["route"].'" class="pixelProduct">
									
									<img src="'.$server.$value["cover"].'" class="img-responsive">

								</a>

							</figure>

					  	</div>
							  
						<div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">
							
							<h1>

								<small>

									<a href="'.$value["route"].'" class="pixelProduct">

										<a href="'.$value["route"].'" class="pixelProduct">
										
										'.$value["title"].'<br>';

										if($value["new"] != 0){

											echo '<span class="label label-warning">Nuevo</span> ';

										}

										if($value["deal"] != 0){

											echo '<span class="label label-warning">'.$value["dealDiscount"].'% off</span>';

										}		

									echo '</a>

								</small>

							</h1>

							<p class="text-muted">'.$value["titular"].'</p>';

							if($value["price"] == 0){

								echo '<h2><small>GRATIS</small></h2>';

							}else{

								if($value["deal"] != 0){

									echo '<h2>

											<small>
						
												<strong class="deal">EUR €'.$value["price"].'</strong>

											</small>

											<small>$'.$value["priceDeal"].'</small>
										
										</h2>';

								}else{

									echo '<h2><small>EUR €'.$value["price"].'</small></h2>';

								}
								
							}

							echo '<div class="btn-group pull-left links">
						  	
						  		<button type="button" class="btn btn-default btn-xs wishlist"  idProduct="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">

						  			<i class="fa fa-heart" aria-hidden="true"></i>

						  		</button>';

						  		if($value["type"] == "virtual" && $value["price"] != 0){

										if($value["deal"] != 0){

											echo '<button type="button" class="btn btn-default btn-xs addToCart"  idProduct="'.$value["id"].'" image="'.$server.$value["cover"].'" title="'.$value["title"].'" price="'.$value["priceDeal"].'" type="'.$value["type"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true"></i>

											</button>';

										}else{

											echo '<button type="button" class="btn btn-default btn-xs addToCart"  idProduct="'.$value["id"].'" image="'.$server.$value["cover"].'" title="'.$value["title"].'" price="'.$value["price"].'" type="'.$value["type"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true"></i>

											</button>';

										}

									}

						  		echo '<a href="'.$value["route"].'" class="pixelProduct">

							  		<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

							  		<i class="fa fa-eye" aria-hidden="true"></i>

							  		</button>

						  		</a>
							
							</div>

						</div>

						<div class="col-xs-12"><hr></div>

					</li>';

				}

				echo '</ul>

			</div>

		</div>';

}

?>

<div class="footer">

    <div class="box-container">

        <div class="box">
            <h3>Información de contacto</h3>
            <p> <i class="fas fa-map-marker-alt"></i> Ilerna Online </p>
            <p> <i class="fas fa-envelope"></i> jrosacobos@gmail.com </p>
            <p> <i class="fas fa-phone"></i> +34-600338841 </p>
        </div>

        <div class="box">
            <h3>Ubicación</h3>
            <a href="https://es.wikipedia.org/wiki/M%C3%A1laga">Málaga</a>
            <a href="https://www.ilerna.es">Ilerna Online</a>
        </div>

        <div class="box">
            <h3>Acceso Rápido </h3>
            <a href="#">Home</a>
            <a href="http://localhost/frontend/articulos-gratuitos">Artículos Gratuitos</a>
            <a href="http://localhost/frontend/lo-mas-vendido">Artículos más vendidos</a>
        </div>

        <div class="box">
            <h3>Sígueme</h3>
            <a href="#">Instagram</a>
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
        </div>

    </div>

    <h1 class="credit">Creado por <a href="#">Jose Rosa</a> para Ilerna Online. Todos los derechos reservados </h1>

</div>

<!-- footer section ends -->




