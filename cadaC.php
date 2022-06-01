<?php
  include('./php/conexion.php');
  if( isset($_GET['id'])){
    $resultado = $conexion ->query("select * from cuadros where id=".$_GET['id'])or die($conexion -> error);
    if(mysqli_num_rows($resultado) > 0){
     $fila = mysqli_fetch_row($resultado);
    }else{
      header("Location: ./index.php");
    }
  }else{
    header("Location: ./index.php");
  }


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

<nav class="navbar navbar-expand-sm justify-content-center navbar-light" style="background-color: #cce8e4;">
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
          <div class="col-md-6">
            <img src="imagenes/<?php echo $fila[5]; ?>" alt="<?php echo $fila[1]; ?>" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $fila[1]; ?></h2>
            <p class="mb-4"><?php echo $fila[7]; ?></p>
            <h5 class="text-black"><?php echo $fila[2]; ?></h5>
            <h5 class="text-black"><?php echo $fila[3]; ?></h5>
            <p class="mb-4"> </p>
            <p><strong class="text-primary h4">$<?php echo $fila[4]; ?></strong></p>
            
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>

            </div>
            <p><a href="carrito.php?id=<?php echo $fila[0]; ?>" class="buy-now btn btn-sm btn-primary">Añadir al carrito</a></p>

          </div>
        </div>
      </div>
    </div>


  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>