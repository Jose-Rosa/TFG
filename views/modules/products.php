<?php

$server = Route::controllerServerRoute();

$url = Route::controllerRoute();

$route ="sin-categoria";

?>


<!---  B A N N E R  --->

<figure class="banner">

    <img src="http://localhost/backend/views/img/banner/default4.jpg" class="img-responsive" width="100%">

    <div class="textBanner textRight">
        <h1 style="color:#fff"> Ofertas de la semana </h1>
        <h2 style="color:#fff"><strong>35% off</strong></h1>
        <h3 style="color:#fff"> Date prisa y cómpralo ahora </h3>
    </div>

</figure>

<!--- P R O D U C T S    B A R    --->

<div class="container-fluid well well-sm productsBar">

			<div class="container">
				
				<div class="row">

                    <div class="col-sm-6 col-xs-12">

                        <div class="btn-group">

                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">

                            Ordenar artículos <span class="caret"></span></button>

                            <ul class="dropdown-menu" role="menu">

                                <li><a href="#">Nuevo</a></li>
                                <li><a href="#">Antiguo</a></li>

                            </ul>
                        
                        </div>

                    </div>

                    
					
					<div class="col-sm-6 col-xs-12 organizarProductos">

						<div class="btn-group pull-right">
							
						</div>		

					</div>

				</div>

			</div>

		</div>

<!--- P R O D U C T     L I S T   --->

<div class="container-fluid products">

    <div class="container">

        <div class="row">

            <ul class="breadcrumb backGroundBreadcrumb lead">

                <li><a href="<?php echo $url; ?>">Inicio</a></li>
                <li class="active"><?php echo $routes[0]; ?></li>


            </ul>


            <?php

            if($routes[0] == "articulos-gratuitos"){

                $item2="price";
                $valor2=0;
                $order="id";


            }else if ($routes[0] == "lo-mas-vendido"){

                $item2=null;
                $valor2=null;
                $order="solds";


            }else{

                $order="id";
                $item1 = "route";
                $valor1 = $routes[0];

                $category = ControllerProducts::controllerShowCategories($item1, $valor1);


            if(!$category){

                $subCategory = ControllerProducts::controllerShowSubCategories($item1,$valor1);

                $item2="id_subcategory";
                $valor2=$subCategory[0]["id"];

            }else{

                $item2= "id_category";
                $valor2 = $category["id"];
            }



            }



            $order = "id";

            $products = ControllerProducts::controllerShowProducts($order, $item2, $valor2);

            if(!$products){

                echo '<div class="col-xs-12 error404 text-center">

                        <h1><small>Vaya</small></h1>
                        <h2>Aún no tenemos productos en esta categoría :(</h2>
                        
                    </div>';
                
                
            }else{

                foreach ($products as $key => $value) {
					
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

				<ul class="list0" style="display:none">';

				foreach ($products as $key => $value) {

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

				echo '</ul>';

                


            }

            ?>

</div>
</div>
</div>
