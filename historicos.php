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
  <link href="css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <link href="css/animate.css" rel="stylesheet" type="text/css">
  <link rel="icon" href="images/logo/icon.png" type="img/jpg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
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
      <h1 class="titlePac">Historicos</h1>
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

        <li class="nav-item">
          <a class="nav-link" href="obras.php">TODAS LAS OBRAS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="abstractos.php">ABSTRACTOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="realismo.php">REALISMO</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">HISTORICOS
            <span class="sr-only">(current)</span>
          </a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link" href="estructuras.php">ESCULTURAS</a>
        </li>
        </li>
      </ul>
    </div>
  </nav>
</nav>

  <!-- Categorias -->

  <!-- Sección de todo -->
  <div class="container">
    <h2 class="text-center wow fadeIn">    </h2>    
    <h2 class="text-center wow fadeIn"></h2>

    <p class="text-center"> 
    </p>
  </div>

  
 <!-- Sección de HISTORICOS -->

 <!-- Sección de ESTRUCTURAS -->

  <!-- SE MUESTRAN LAS IMAGENES -->
<div class="row mb-5">
  <div class="container">
     <div class="card-columns">
<?php
  include('./php/conexion.php');
  $resultado = $conexion ->query("select * from cuadros where categoria = 'H'")or die($conexion -> error);
  while($fila = mysqli_fetch_array($resultado)){


?>

    <div class="block-4 text-center border">
      <div class="card view overlay zoom" data-toggle="modal" data-target="#modal32">
        <a href="cadaC.php?id=<?php echo $fila['id'];?>"><img class="card-img-top wow fadeInUp" src="./imagenes/<?php echo $fila['imagen'];?>" alt="Card image cap"></a>
        <div class="card-img-overlay" id="r1">
          <h5 class="card-title">r1</h5>
        </div>
        <div class="block-4-text p-4">
                    <h3><a href="cadaC.php?id=<?php echo $fila['id'];?>"><?php echo $fila['nombre'];?></a></h3>
                    <p class="mb-0"><?php echo $fila['dimensiones'];?></p>
                    <p class="text-primary font-weight-bold">$<?php echo $fila['precio'];?></p>
                  </div>
      </div>
      </div>

<?php } ?>
      </div>
  </div>
</div>


  <!-- Sección de Abstractos -->

  <!-- Galeria de abstractos -->


  <!-- Seccion de Historicos -->

  <!-- Galeria de historicos -->

  <!-- Sección de realismo -->

  <!-- Galeria de realismo -->

  <!-- Carrito de compras -->



  <div class="page-foot wow lightSpeedIn" id="subscribe">
    <footer class="page-footer font-small unique-color-dark pt-4">
      <div class="container">
        <ul class="list-unstyled list-inline text-center py-2">
          <li class="list-inline-item">
            <h5 class="mb-1">¿Quieres publicar tus obras?</h5>
          </li>
          <li class="list-inline-item" id="footer-button">
            <a href="#registerModal" data-toggle="modal" class="btn btn-outline-white">Subscríbete</a>
          </li>
        </ul>
        <div class="footer-copyright text-center">
          <p>
            &copy; 2021 Copyright:
            <a href="#brandName">Art Gallery</a>
          </p>
        </div>
      </div>
    </footer>

  </div>

  <div class="container">
    <div id="registerModal" class="modal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="mx-auto font-weight-bold">Ingresa tus Datos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">
            <div class="card row">
              <div class="card-body px-lg-5 pt-0 col-md-10 mx-auto">
                <form class="text-center" id="myForm">
                  <div class="form-row">
                    <div class="col">
                      <div class="md-form">
                        <input type="text" id="name" class="form-control" required>
                        <label for="materialRegisterFormFirstName">Nombre</label>
                      </div>
                    </div>
                  </div>
                  <div class="md-form mt-0">
                    <input type="email" id="email" class="form-control" required>
                    <label for="materialRegisterFormEmail">E-mail</label>
                  </div>
                  <button class="btn btn-rounded btn-block waves-effect z-depth-0 col-md-3" type="submit"
                    id="regButton">Listo</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  ​
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script src="js/script.js"></script>

  <script src="js/wow.min.js"></script>
  <script>
    new WOW().init();
  </script>

</body>

</html>