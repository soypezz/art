<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title> Registracion de usuario | PHP</title>
	<link rel="stylesheet" type="text/css"href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

<div>
	<?php

	?>
</div>


	<div class="container h-100">
		
			<form action="registracion.php" method="post">
				<div class="container">

				  <div class="row">
				  	    <div class="col-sm-3">
							<h1 style="color:#FFFFFF">Registrarse</h1>
							<p style="color:#FFFFFF">Llena los espacios con los datos correctos.</p>
							<hr class="mb-3">

							<!-- Comenzamos con los cuadros de textos y boton -->
							

			                <label style="color:#F4EED0" for="primernombre"><b>Primer nombre</b></label>
			                <div class="input-group mb-3">
			                	<div class="input-group-append">
							          <span class="input-group-text"><i class="fas fa-user"></i></span>					
						        </div>
							<input class="form-control" id="primernombre"type="text" name="primernombre" required>
						   </div>


                            
							<label style="color:#F4EED0" for="apellido"><b>Apellido</b></label>
							 <div class="input-group mb-3">
			                	<div class="input-group-append">
							          <span class="input-group-text"><i class="fas fa-user"></i></span>					
						        </div>
							<input class="form-control" id="apellido"type="text" name="apellido" required>
						    </div>


							<label style="color:#F4EED0" for="email"><b>Email</b></label>
							<div class="input-group mb-3">
			                	<div class="input-group-append">
							          <span class="input-group-text"><i class="far fa-envelope-open"></i></span>					
						        </div>
							<input class="form-control" id="email" type="email" name="email" required>
						    </div>




							<label style="color:#F4EED0" for="telefono"><b>Telefono</b></label>
							<div class="input-group mb-3">
			                	<div class="input-group-append">
							          <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>					
						        </div>
							<input class="form-control" id="telefono"type="text" name="telefono" required>
						    </div>



							<label style="color:#F4EED0" for="contraseña"><b>Contraseña</b></label>
							<div class="input-group mb-3">
			                	<div class="input-group-append">
							          <span class="input-group-text"><i class="fas fa-key"></i></span>					
						        </div>
							<input type="password" class="form-control input_pass" id="contraseña" name="contraseña" required>
						    </div>
							<hr class="mb-3">

							<input class="btn btn-primary" type="submit" id="registro" name="crear" value="Guardar">
					    </div>
				   </div>
				</div>
			</form>

	</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

	//se mira que los datos sean validos 

	$(function(){
		$('#registro').click(function(e){

			var valid= this.form.checkValidity();


			if (valid) {

			var primernombre   = $('#primernombre').val();
			var apellido       = $('#apellido').val();
			var email          = $('#email').val();
			var telefono       = $('#telefono').val();
			var contraseña     = $('#contraseña').val();	

               // se asegura que el usuario se haya registrado correctamente

				e.preventDefault();
				$.ajax({
					type: 'POST',    
					url: 'process.php', // se llama el proceso que guarda a el usuario en la base de datos 
					
					data: {primernombre:primernombre, apellido:apellido, email:email, telefono:telefono, contraseña:contraseña},

					success:function(data){
					Swal.fire(
							  'Registro Exitoso!',
							  data,
							  'success'
							   )
					},
					error:function(data){
					Swal.fire(
							  'Error en Registro!',
							  'ocurrio un error al guardar los datos!',
							  'error'
					          )
					}


				});

				

			}else{
				
			}


		});


	});
</script>
</body>	
</html>
