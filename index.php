
<!DOCTYPE html>
<html lang="en">
<?php 

session_start();

	if(!isset($_SESSION['userlogin'])){
		header("Location: login.php");
	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: login.php");
	}

?>

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
    <link rel="stylesheet" href="fonts/icomoon/style.css1">

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
    <form action="./busqueda.php" class="form-inline my-2 my-lg-0" method="GET">
      <input name ="texto" class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="buscar">
      <button class="btn btn-outline-light" type="submit">Buscar</button>
    </form>
  </div>
</nav>



  <div class="text-center" id="brandName">
    <a class="navbar-brand" href="#" id="logo">
      <img src="images/landing/Galery.jpg">
      <h1 class="titlePac">Art Gallery</h1>
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
          <a class="nav-link" href="contacto.php">CONT??CTO </a>
        </li>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="obras.php">OBRAS </a>
        </li>
        </li>

         <li class="nav-item active">
          <a class="nav-link" href="carrito.php"> CARRITO (2)
            <span class="sr-only">(current)</span>
          </a>
        </li>


      </ul>
    </div>
  </nav>
</nav>



  <!-- Categorias -->
  <section class="wow pulse" id="timeline">

    <div class="tl-item">

      <div class="tl-bg" style="background-image: url(images/Categories/david.jpg)"></div>

      <div class="tl-year">
        <p class="f2 heading--sanSerif">Esculturas</p>
      </div>

      <div class="tl-content">
        <h1 class="f3 text--accent ttu"> 4000 a.C.</h1>
        <p>Es una de las Bellas Artes en la cual el escultor se expresa creando vol??menes y conformando espacios. En la
          escultura se incluyen todas las artes de talla y cincel, junto con las de fundici??n y moldeado. Dentro de la
          escultura, el uso de diferentes combinaciones de materiales y medios ha originado un nuevo repertorio
          art??stico, que comprende procesos como el constructivismo y el assemblage. En un sentido gen??rico, se entiende
          por escultura la obra art??stica pl??stica realizada por el escultor. </p>
      </div>

    </div>

    <div class="tl-item">

      <div class="tl-bg" style="background-image: url(images/Categories/Abstract.jpg)">
      </div>

      <div class="tl-year">
        <p class="f2 heading--sanSerif">Abstracto</p>
      </div>

      <div class="tl-content">
        <h1 class="f3 text--accent ttu">Europa, siglo XIX</h1>
        <p>El arte abstracto es un estilo moderno que se opone al realismo y a la fotograf??a, de esta manera, es
          necesaria la utilizaci??n de la imaginaci??n y la comprensi??n
          m??s all?? de lo que la l??gica nos entrega para admirar una pintura u obra abstracta.</p>
      </div>

    </div>

    <div class="tl-item">

      <div class="tl-bg" style="background-image: url(images/Categories/Hist??rico.jpg)"></div>

      <div class="tl-year">
        <p class="f2 heading--sanSerif">Hist??rico</p>
      </div>

      <div class="tl-content">
        <h1 class="f3 text--accent ttu">Historia del Arte</h1>
        <p>La historia del arte es el relato de la evoluci??n del arte a trav??s del tiempo, entendido como cualquier
          actividad o producto realizado por el ser humano con
          finalidad est??tica o comunicativa, a trav??s de la cual se expresan ideas, emociones o, en general, una visi??n
          del mundo, empleando diversos recursos, como los
          pl??sticos, ling????sticos, sonoros o mixtos.</p>
      </div>

    </div>

    <div class="tl-item">

      <div class="tl-bg" style="background-image: url(images/Categories/realismo.jpg)"></div>

      <div class="tl-year">
        <p class="f2 heading--sanSerif">Realismo</p>
      </div>

      <div class="tl-content">
        <h1 class="f3 text--accent ttu">Francia, 1850</h1>
        <p>El realismo es una forma de expresi??n en que se retienen las impresiones b??sicas de la realidad, adem??s de
          relatar e interpretar la realidad que se esconde debajo
          de la apariencia de las cosas. Al arte realista se le considera aquel estilo de arte que intenta representar y
          exponer temas que est??n conformes con las reglas
          emp??ricas y seculares, es decir, este estilo de arte representan obras en las cuales sus contenidos pueden
          explicarse por causas naturales y que no haya ning??n
          tipo de participaci??n divina o sobre natural.
      </div>

    </div>
  </section>

  <!-- Secci??n de esculturas -->



  <!-- Carrito de compras -->
  <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="modelCart" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modelCart">Tu Galeria</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="small-container">
            <table>
              <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
              </tr>
              </tr>
              <tr>
                <td>
                  <div class="cart-info">
                    <img class="cartImg" src="images/Imagen_Cuadros_abstractos/cuadro4.jpg">
                    <div>
                      <p>Cuandro Abstracto</p>
                      <small>Precio :$50.00</small>
                      <br>
                      <a href=""> Eliminar </a>
                    </div>
                  </div>
                </td>
                <td><input type="number" value="1"></td>
                <td>$50.00</td>
              </tr>
              <tr>
                <td>
                  <div class="cart-info">
                    <img class="cartImg" src="images/Imagen_Cuadros_Historicos/h4.jpg">
                    <div>
                      <p>Cuadro Hist??rico</p>
                      <small>Precio:$450.00</small>
                      <br>
                      <a href=""> Eliminar </a>
                    </div>
                  </div>
                </td>
                <td><input type="number" value="1"></td>
                <td>$450.00</td>
              </tr>
              <tr>
                <td>
                  <div class="cart-info">
                    <img class="cartImg" src="images/Imagen_Cuadros_realismo/r4.jpg">
                    <div>
                      <p>Cuadro realismo</p>
                      <small>Precio:$150.00</small>
                      <br>
                      <a href=""> Eliminar </a>
                    </div>
                  </div>
                </td>
                <td><input type="number" value="1"></td>
                <td>$150.00</td>
              </tr>
            </table>

            <div class="total-price">
              <table>
                <tr>
                  <td>Subtotal</td>
                  <td>$650.00</td>
                </tr>
                <tr>
                  <td>Tax</td>
                  <td>$35.00</td>
                </tr>
                <tr>
                  <td>Total</td>
                  <td>$685.00</td>
                </tr>
              </table>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Continuar Compra</button>
        </div>
      </div>
    </div>
  </div>

    <?php include("./layouts/footer.php"); ?> 

  <div class="page-foot wow lightSpeedIn" id="subscribe">
    <footer class="page-footer font-small unique-color-dark pt-4">
      <div class="container">
        <ul class="list-unstyled list-inline text-center py-2">
          <li class="list-inline-item">
            <h5 class="mb-1">??Quieres publicar tus obras?</h5>
          </li>
          <li class="list-inline-item" id="footer-button">
            <a href="#registerModal" data-toggle="modal" class="btn btn-outline-white">Subscr??bete</a>
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

  ???
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