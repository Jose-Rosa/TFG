<?php

class ControllerUsers{

    public function controllerUserRegister(){

        /*Solo pido name=regUser, porque es el primero y al ser requerido*/

        if(isset($_POST["regUser"])){


            if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regUser"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])){

				$encrypt = crypt($_POST["regPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			   	

				$data = array("name"=>$_POST["regUser"],
							   "password"=> $encrypt,
							   "email"=> $_POST["regEmail"],
							   "mode"=> "direct",
							   "verification"=> 1);

				$table = "users";

				$response = ModelUsers::modelUserRegister($table, $data);

				/**Si se ha registrado bien, pues he creado otro SweetAlert de "success" concantenando el email que nos viene por $_POST */

				if($response == "ok" ){

					echo '<script> 

							swal({
								  title: "¡GENIAL!",
								  text: "¡Por favor revisa la bandeja de entrada o de SPAM de tu correo electrónico '.$_POST["regEmail"].' para verificar la cuenta!",
								  type:"success",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
								},

								function(isConfirm){

									if(isConfirm){
										history.back();
									}
							});

						</script>';
				}

			}else{

				/* S W E E T   A L E R T */

				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡Error al registrar el usuario, no se permiten caracteres especiales!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';
			}
			
		}	
	}	
	
	/* U S E R    L O G I N */

	public function controllerUserLogin(){

		if(isset($_POST["loginEmail"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["loginEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["loginPassword"])){

				$encrypt = crypt($_POST["loginPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				/*Le pedimos al modelo que haga la búsqueda en la BBDD de la tabla "users"*/

				$table = "users";
				$item = "email";
				$valor = $_POST["loginEmail"];

				$response = ModelUsers::modelShowUser($table, $item, $valor);

				if($response["email"] == $_POST["loginEmail"] && $response["password"] == $encrypt){

					if($response["verification"] == 1){

						echo'<script>

							swal({
								  title: "¡NO HA VERIFICADO SU CORREO ELECTRÓNICO!",
								  text: "¡Por favor revise la bandeja de entrada o la carpeta de SPAM de su correo para verififcar la dirección de correo electrónico '.$respuesta["email"].'!",
								  type: "error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    history.back();
									  } 
							});

							</script>';

					}else{

						$_SESSION["validateSession"] = "ok";
						$_SESSION["id"] = $response["id"];
						$_SESSION["name"] = $response["name"];
						$_SESSION["photo"] = $response["photo"];
						$_SESSION["email"] = $response["email"];
						$_SESSION["password"] = $response["password"];
						$_SESSION["mode"] = $response["mode"];

						/*Redireccionamos a donde se encuentre actualmente y así no te lleva a la página de inicio */

						echo '<script>
							
							window.location = localStorage.getItem("actualRoute");

						</script>';

					}

				}else{

					echo'<script>

							swal({
								  title: "¡ERROR AL INGRESAR!",
								  text: "¡Por favor revise que el email exista o la contraseña coincida con la registrada!",
								  type: "error",
								  confirmButtonText: "Cerrar",
								  closeOnConfirm: false
							},

							function(isConfirm){
									 if (isConfirm) {	   
									    window.location = localStorage.getItem("actualRoute");
									  } 
							});

							</script>';

				}

			}else{

				echo '<script> 

						swal({
							  title: "¡ERROR!",
							  text: "¡Error al ingresar al sistema, no se permiten caracteres especiales!",
							  type:"error",
							  confirmButtonText: "Cerrar",
							  closeOnConfirm: false
							},

							function(isConfirm){

								if(isConfirm){
									history.back();
								}
						});

				</script>';

			}

		}

	}


	

}

	




    


    