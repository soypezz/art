<?php
require_once('config.php');
?>

<?php

if(isset($_POST)){
	$primernombre    =$_POST['primernombre'];
	$apellido        =$_POST['apellido'];
	$email           =$_POST['email'];
	$telefono        =$_POST['telefono'];
	$contraseña      =$_POST['contraseña'];

	$sql= "INSERT INTO usuarios(primer_nombre, apellido, email, telefono, contraseña) VALUES(?,?,?,?,?)";
	$stmtinsert= $db->prepare($sql);
	$result= $stmtinsert->execute([$primernombre, $apellido, $email, $telefono, $contraseña]);
	if ($result) {
		echo'registro exitoso';
	}else{
		echo'ocurrio un error al guardar los datos';
	}

}else{
	echo 'No datos';
}

# =============================================
# =           PROCESO DE REGISTRO          =
# =============================================



# ======  aqui se guardan los datos ingresados por el usuario en la base de datos =======
