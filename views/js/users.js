
/* CAPTURAR ROUTA */

var actualRoute = location.href;

$(".btnLogin").click(function(){

	/*Almacenamos un item llamado "actualRoute" y se va a almacenar la variable de arriba   */

	localStorage.setItem("actualRoute", actualRoute);

})

/* V A L I D A T E   U S E R   R E G I S T E R*/

function userRegister(){

	/* V A L I D A T E   N A M E */

	var name = $("#regUser").val();

	if(name != ""){

		var expression = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;

		if(!expression.test(name)){

			$("#regUser").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No están permitidos números ni caracteres especiales</div>')

			return false;

		}

	}else{

		$("#regUser").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}

	/* V A L I D A T E   E M A I L */

	var email = $("#regEmail").val();

	if(email != ""){

		var expression = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

		if(!expression.test(email)){

			$("#regEmail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> El correo electrónico es erróneo</div>')

			return false;

		}

		if(validarEmailRepetido){

			$("#regEmail").parent().before('<div class="alert alert-danger"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente</div>')

			return false;

		}

	}else{

		$("#regEmail").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}


	/* V A L I D A T E   P A S S W O R D */

	var password = $("#regPassword").val();

	if(password != ""){

		var expression = /^[a-zA-Z0-9]*$/;

		if(!expression.test(password)){

			$("#regPassword").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> No se permiten caracteres especiales</div>')

			return false;

		}

	}else{

		$("#regPassword").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN:</strong> Este campo es obligatorio</div>')

		return false;
	}
}
