<?php
session_start();
include './php/conexion.php';
if(!isset($_SESSION['carrito'])){
  header('Location: ./index.php');
}
$arreglo = $_SESSION['carrito'];
$total= 0;

for($i=0;$i<count($arreglo);$i++){
  $total= $total + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']);
}
$id_usuario = $conexion ->insert_id;
$fecha= date('y-m-d h:m:s');
$conexion -> query("insert into ventas(id_usuario,total,fecha) values($id_usuario,$total,'$fecha')")or die($conexion -> error);

$id_venta = $conexion ->insert_id;
for($i=0;$i<count($arreglo);$i++){
$conexion -> query("insert into productos_ventas (id_venta, id_producto, cantidad, precio, subtotal) 
  values(
  $id_venta, 
  ".$arreglo[$i]['Id'].",
  ".$arreglo[$i]['Cantidad'].",
  ".$arreglo[$i]['Precio'].",
  ".$arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio']."
  )")or die($conexion -> error);
}

$conexion -> query("insert into envios(pais, company, direccion, estado, cp, id_venta, email, telefono, nombre, apellido) 
  values(
  '".$_POST['country']."',
  '".$_POST['c_companyname']."',
  '".$_POST['c_address']."',
  '".$_POST['c_state_country']."',
  '".$_POST['c_postal_zip']."',
  $id_venta,
  '".$_POST['c_email_address']."',
  '".$_POST['c_phone']."',
  '".$_POST['c_fname']."',
  '".$_POST['c_lname']."'
  ) 

  ")or die($conexion -> error);
unset($_SESSION['carrito']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Art Gallery</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link
      href="https://fonts.googleapis.com/css?family=Cinzel+Decorative|DM+Serif+Display|Libre+Barcode+39|Manjari|Nixie+One|Raleway|UnifrakturCook:700&display=swap"
      rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/style.css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="images/logo/icon.png" type="img/jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css1?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css1/bootstrap.min.css">
    <link rel="stylesheet" href="css1/magnific-popup.css">
    <link rel="stylesheet" href="css1/jquery-ui.css">
    <link rel="stylesheet" href="css1/owl.carousel.min.css">
    <link rel="stylesheet" href="css1/owl.theme.default.min.css">


    <link rel="stylesheet" href="css1/aos.css">

    <link rel="stylesheet" href="css1/style.css">

  </head>
  <body>
    <div class="alert alert-secondary alert-dismissible fade show" role="alert" id="myAlert">
    <p id="response"></p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <nav class="navbar navbar-expand-sm justify-content-center navbar-light" style="background-color: #63948d;">
  

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link navbar-light" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
          <a class="nav-link" href="index.php?logout=true">SALIR </a>
        </li> 
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="buscar">
      <button class="btn btn-outline-light" type="submit">Buscar</button>
    </form>
  </div>
</nav>


  <div class="text-center" id="brandName">
    <a class="navbar-brand" href="index.php" id="logo">
      <img src="images/landing/Galery.jpg">

      <hr class="style-one">
    </a>
  </div>
  <!-- Barra de herramientas  -->

<nav class="navbar navbar-expand-sm justify-content-center navbar-light" style="background-color: #edfcfa;">
  <nav class="navbar navbar-expand-lg sticky-top navShadow wow fadeIn">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#pageNav" aria-controls="pageNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="pageNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item active">
          <a class="nav-link" href="obras.php">TODAS LAS OBRAS
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="abstractos.php">ABASTRACTOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="realismo.php">REALISMO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="historicos.php">HISTORICOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="estructuras.php">ESTRUCTURA</a>
        </li>
        </li>
      </ul>
    </div>
  </nav>
</nav>


 <div class="site-wrap">


    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">Gracias!</h2>
            <p class="lead mb-5">Tu orden fue completada con exito.</p>
            <p><a href="obras.php" class="btn btn-sm btn-primary">Seguir comprando</a></p>
          </div>
        </div>
      </div>
    </div>

    <?php include("./layouts/footer.php"); ?> 

  </div>

  
  <script src="js1/jquery-3.3.1.min.js"></script>
  <script src="js1/jquery-ui.js"></script>
  <script src="js1/popper.min.js"></script>
  <script src="js1/bootstrap.min.js"></script>
  <script src="js1/owl.carousel.min.js"></script>
  <script src="js1/jquery.magnific-popup.min.js"></script>
  <script src="js1/aos.js"></script>

  <script src="js1/main.js"></script>
    


 
  </body>
</html>