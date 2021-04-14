<?php

$server = Route::controllerServerRoute();
$url = Route::controllerRoute();

?>



<!-- T O P -->

<div class="container-fluid topBar" id="top">
	
	<div class="container">
		
		<div class="row">
	
			<!-- S O C I A L   M E D I A -->

			<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 socialMedia">

                <ul>
                    <li>
                        <a href="http://instagram.com/" target="_blank">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </li>

                    <li>
                        <a href="http://facebook.com/" target="_blank">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </li>

                    <li>
                        <a href="http://twitter.com/" target="_blank">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </li>    

                </ul>

            </div>

			<!--- R E G I S T E R -->

            <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 registry">
				
				<ul>

				<?php

				if(isset($_SESSION["validateSession"])){

					if($_SESSION["validateSession"] == "ok"){

						/*Preguntamos de qué modo hizo login el usuario*/

						if($_SESSION["mode"] == "direct"){

							/**/

							if($_SESSION["photo"] != ""){

								echo '<li>
										<img class="img-circle" src="'.$url.$_SESSION["photo"].'" width="10%">
									</li>';

							}else{

								echo '<li>
								
										<img class="img-circle" src="'.$server.'views/img/users/default/anonymous.png" width="10%">
										
									</li>';


							}

							echo '<li>|</li>
								<li><a href="'.$url.'perfil">Mi Perfil</a></li>
								<li>|</li>
								<li><a href="'.$url.'logout">Salir</a></li>';								

						}


					}else{

						echo'<li><a href="#modalLogin" data-toggle="modal">Entrar</a></li>
							<li>|</li>
							<li><a href="#modalRegistry" data-toggle="modal">Crear una cuenta</a></li>';


					}


				}
				
				
				?>
					
					

				</ul>

			</div>	

		</div>	

	</div>

</div>




<!-- H E A D E R -->
				
 <header class="container-fluid">
	
	<div class="container">
		
		<div class="row" id="header">

			<!-- L O G O -->
			
			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="logo">
				
				<a href="<?php echo $url; ?>">
						
					<img src="http://localhost/backend/views/img/template/logo3.png" class="img-responsive">

				</a>
				
			</div>

			<!-- B L O C K   D I V:   C A T E G O R I E S  &  S E A R C H E R -->

			<div class="col-lg-6 col-md-6 col-sm-8 col-xs-12">
					
				<!-- C A T E G O R I E S    B U T T O N -->

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 backColor" id="buttonCategories">
					
					<p>CATEGORÍAS
					
						<span class="pull-right">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</span>
					
					</p>

				</div>

				<!-- B R O W S E R -->
				
				<div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-12" id="searcher">
					
					<input type="search" name="buscar" class="form-control" placeholder="Buscar...">	

					<span class="input-group-btn">
						
						<a href="#">

							<button class="btn btn-default backColor" type="submit">
								
								<i class="fa fa-search"></i>

							</button>

						</a>

					</span>

				</div>
			
			</div>	

        <!-- C A R R I T O  -->

			<div class="col-lg-3 col-md-3 col-sm-2 col-xs-12" id="carrito">
				
				<a href="#">

					<button class="btn btn-default pull-left backColor"> 
						
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					
					</button>
				
				</a>	

				<p>Mi cesta <span class="cantidadCesta">1</span> <br> EUR € <span class="sumaCesta">35</span></p>	

			</div>

		</div>

		<!-- C A T E G O R I E S -->

		<div class="col-xs-12 backColor" id="categories">

            <?php

				$item = null;
				$valor = null;

                $categories= ControllerProducts::controllerShowCategories($item, $valor);

                

                foreach ($categories as $key => $value){

                    echo'<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">

                            <h4>
                                <a href="'.$url.$value["route"].'" class="pointerCategories">'.$value["category"].'</a>
                            </h4>
    
                            <hr>
    
                            <ul>';

							$item = "id_category";

							$valor = $value["id"];

                            $subcategories = ControllerProducts::controllerShowSubCategories($item, $valor);

                            foreach ($subcategories as $key => $value){

                                echo'<li><a href="'.$url.$value["route"].'" class="pointerSubCategories">'.$value["subcategory"].'</a></li>';
                            }
            
                             echo' </ul>
                            
            
                        </div>';


                }

            ?>	

		</div>

	</div>

</header>	

<!--- M O D A L   W I N D O W   R E G I S T R Y --->

<div class="modal fade modalForm" id="modalRegistry" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitle">

        	<h3 class="backColor">Registrarse</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>

				<!--- F A C E B O O K   R E G I S T R Y --->

			<div class="col-sm-6 col-xs-12 facebook" id="buttonFacebookRegistry">
				
				<p>
				  <i class="fa fa-facebook"></i>
					Registro con Facebook
				</p>

			</div>

			<!--- G O O G L E   R E G I S T R Y --->

			<div class="col-sm-6 col-xs-12 google" id="buttonGoogleRegistry">
				
				<p>
				  <i class="fa fa-google"></i>
					Registro con Google
				</p>

			</div>

			<!--- D I R E C T   R E G I S T R Y --->

			<form method="post" onsubmit="return userRegister()">
				
			<hr>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-user"></i>
						
						</span>

						<input type="text" class="form-control" id="regUser" name="regUser" placeholder="Nombre Completo" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>
						
						</span>

						<input type="email" class="form-control" id="regEmail" name="regEmail" placeholder="Correo Electrónico" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-lock"></i>
						
						</span>

						<input type="password" class="form-control" id="regPassword" name="regPassword" placeholder="Contraseña" required>

					</div>

				</div>

				<?php 

					$register= new ControllerUsers();
					$register -> controllerUserRegister();
				
				?>

				<input type="submit" class="btn btn-default backColor btn-block" value="Enviar">
			</form>	

		</div>

		<div class="modal-footer">
          
			¿Ya tienes una cuenta? | <strong><a href="#modalIngreso" data-dismiss="modal" data-toggle="modal">Entrar</a></strong>

        </div>
	</div>
</div>


<!--=====================================
VENTANA MODAL PARA EL INGRESO
======================================-->

<div class="modal fade modalForm" id="modalLogin" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitle">

        	<h3 class="backColor">Entrar</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
        	
			<!--- L O G I N    F A C E B O O K --->

			<div class="col-sm-6 col-xs-12 facebook" id="btnFacebookRegister">
				
				<p>
				  <i class="fa fa-facebook"></i>
					Entrar con Facebook
				</p>

			</div>

			<!--- L O G I N    G O O G L E --->
			
			<div class="col-sm-6 col-xs-12 google" id="btnGoogleRegister">
					
					<p>
					  <i class="fa fa-google"></i>
						Entrar con Google
					</p>

			</div>

			

			<!--- D I R E C T    L O G I N --->

			<form method="post">
				
			<hr>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>
						
						</span>

						<input type="email" class="form-control" id="loginEmail" name="loginEmail" placeholder="Correo Electrónico" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-lock"></i>
						
						</span>

						<input type="password" class="form-control" id="loginPassword" name="loginPassword" placeholder="Contraseña" required>

					</div>

				</div>

				

				<?php

					$login = new ControllerUsers();
					$login -> controllerUserLogin();

				?>
				
				<input type="submit" class="btn btn-default backColor btn-block btnLogin" value="ENVIAR">	

				<br>

				<center>
					
					<a href="#modalPassword" data-dismiss="modal" data-toggle="modal">¿Olvidaste tu contraseña?</a>

				</center>

			</form>

        </div>

        <div class="modal-footer">
          
			¿No tienes una cuenta registrada? | <strong><a href="#modalRegistry" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>

        </div>
      
    </div>

</div>