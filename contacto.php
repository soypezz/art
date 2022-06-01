<?php
// Show PHP errors
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once 'classes/user.php';

$objUser = new User();
// GET
if(isset($_GET['edit_id'])){
    $id = $_GET['edit_id'];
    $stmt = $objUser->runQuery("SELECT * FROM datos WHERE id=:id");
    $stmt->execute(array(":id" => $id));
    $rowUser = $stmt->fetch(PDO::FETCH_ASSOC);
}else{
  $id = null;
  $rowUser = null;
}


// POST
if(isset($_POST['btn_save'])){
  $nombre    = strip_tags($_POST['nombre']);
  $apellido  = strip_tags($_POST['apellido']);
  $subject  = strip_tags($_POST['subject']);
  $mensaje   = strip_tags($_POST['mensaje']);
  $email    = strip_tags($_POST['email']);
  

  try{
     if($id != null){
       $id = null;
     }else{
       if($objUser->insert($nombre, $apellido, $subject, $mensaje, $email)){
         $objUser->redirect('contacto.php?inserted');
       }else{
         $objUser->redirect('contacto.php?error');
       }
     }
  }catch(PDOException $e){
    echo $e->getMessage();
  }
}

?>

<?php
    if(isset($_GET['updated'])){
      echo '<div class="alert alert-info alert-dismissable fade show" role="alert">
      <strong>registro!<trong> actualizado con exito.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"> &times; </span>
        </button>
      </div>';
    }else if(isset($_GET['deleted'])){
      echo '<div class="alert alert-info alert-dismissable fade show" role="alert">
      <strong>registro!<trong> eliminado con exito.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"> &times; </span>
        </button>
      </div>';
    }else if(isset($_GET['inserted'])){
      echo '*********** CONTACTO EXITOSO **********';
    }else if(isset($_GET['error'])){
      echo '<div class="alert alert-info alert-dismissable fade show" role="alert">
      <strong>DB Error!<trong> Ocurrio algo. Intentalo de nuevo
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"> &times; </span>
        </button>
      </div>';
    }else if(isset($_GET['insertadaventa'])){
      echo '<div class="alert alert-info alert-dismissable fade show" role="alert">
      <strong>Venta!<trong> Insertada correctamente.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"> &times; </span>
        </button>
      </div>';
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
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="buscar">
      <button class="btn btn-outline-light" type="submit">Buscar</button>
    </form>
  </div>
</nav>



  <div class="text-center" id="brandName">
    <a class="navbar-brand" href="index.php" id="logo">
      <img src="images/landing/Galery.jpg">
      <h1 class="titlePac">Art Gallery</h1>
      <hr class="style-one">
    </a>
  </div>
  
  <div class="site-wrap">


    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h3 mb-3 text-black">Get In Touch</h2>
          </div>
          <div class="col-md-7">

            <form action="#" method="post">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-6">
                    <label for="nombre" class="text-black">First Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                  </div>
                  <div class="col-md-6">
                    <label for="apellido" class="text-black">Last Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="apellido" name="apellido">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="subject" class="text-black">Subject </label>
                    <input type="text" class="form-control" id="subject" name="subject">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="mensaje" class="text-black">Message </label>
                    <textarea name="mensaje" id="mensaje" cols="30" rows="7" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" name ="btn_save" class="btn btn-primary btn-lg btn-block" value="Send Message">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-5 ml-auto">
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">Barranquilla</span>
              <p class="mb-0">Área metropolitana de Barranquilla, Kilómetro 5 Vía, Puerto Colombia, Atlántico.</p>
            </div>
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">Bogota</span>
              <p class="mb-0">Calle 27 d sur # 27 c 51.</p>
            </div>
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">Canada</span>
              <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
            </div>

          </div>
        </div>
      </div>
    </div>

    <?php include("./layouts/footer.php"); ?> 
  </div>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="js1/jquery-3.3.1.min.js"></script>
  <script src="js1/jquery-ui.js"></script>
  <script src="js1/popper.min.js"></script>
  <script src="js1/bootstrap.min.js"></script>
  <script src="js1/owl.carousel.min.js"></script>
  <script src="js1/jquery.magnific-popup.min.js"></script>
  <script src="js1/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>