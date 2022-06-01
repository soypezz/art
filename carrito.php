<?php
session_start();
include './php/conexion.php';
if(isset($_SESSION['carrito'])){
  if(isset($_GET['id'])){
    $arreglo =$_SESSION['carrito'];
    $encontro=false;
    $numero=0;
    for($i=0;$i<count($arreglo);$i++){
      if($arreglo[$i]['Id'] == $_GET['id']){
        $encontro=true;
        $numero=$i;
      }
    }
    if($encontro == true ){
      $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
      $_SESSION['carrito']=$arreglo;
    }else{
      //no estaba el registro
      $nombre = "";
      $precio = "";
      $imagen = "";
      $res = $conexion ->query("select * from cuadros where id=".$_GET['id'])or die($conexion -> error);
      $fila = mysqli_fetch_row($res);
      $nombre=$fila['1'];
      $precio=$fila['4'];
      $imagen=$fila['5'];

      $arreglonuevo=array(
        'Id'=> $_GET['id'],
        'Nombre'=> $nombre,
        'Precio'=> $precio,
        'Imagen'=> $imagen,
        'Cantidad'=> 1
      );
      array_push($arreglo, $arreglonuevo);
      $_SESSION['carrito']=$arreglo;
    }
  }
}else{
  if(isset($_GET['id'])){
    $nombre = "";
    $precio = "";
    $imagen = "";
    $res = $conexion ->query("select * from cuadros where id=".$_GET['id'])or die($conexion -> error);
    $fila = mysqli_fetch_row($res);
    $nombre=$fila['1'];
    $precio=$fila['4'];
    $imagen=$fila['5'];
    $arreglo[]=array(
      'Id'=> $_GET['id'],
      'Nombre'=> $nombre,
      'Precio'=> $precio,
      'Imagen'=> $imagen,
      'Cantidad'=> 1
    );
    $_SESSION['carrito']=$arreglo;
  }
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
      <h1 class="titlePac">Carrito</h1>
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
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail"><FONT COLOR="white">IMAGEN </FONT></th>
                    <th class="product-name"><FONT COLOR="white">PRODUCTO </FONT></th>
                    <th class="product-price"><FONT COLOR="white">PRECIO </FONT></th>
                    <th class="product-quantity"><FONT COLOR="white">CANTIDAD </FONT></th>
                    <th class="product-total"><FONT COLOR="white">TOTAL </FONT></th>
                    <th class="product-remove"><FONT COLOR="white">ELIMINAR </FONT></th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $total =0;
                   if(isset($_SESSION['carrito'])){
                    $arreglocarrito=$_SESSION['carrito'];
                    for($i=0;$i<count($arreglocarrito);$i++){
                    $total= $total + ($arreglocarrito[$i]['Precio'] * $arreglocarrito[$i]['Cantidad']);


                  ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="imagenes/<?php echo $arreglocarrito[$i]['Imagen']; ?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $arreglocarrito[$i]['Nombre']; ?></h2>
                    </td>
                    <td>$<?php echo $arreglocarrito[$i]['Precio']; ?></td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <button class="btn btn-outline-primary js-btn-minus btnIncrementar" type="button">&minus;</button>
                        </div>
                        <input type="text" class="form-control text-center txtCantidad" 
                         data-precio="<?php echo $arreglocarrito[$i]['Precio']; ?>"
                         data-id="<?php echo $arreglocarrito[$i]['Id']; ?>"

                        value="<?php echo $arreglocarrito[$i]['Cantidad']; ?>"
                         placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                        <div class="input-group-append">
                          <button class="btn btn-outline-primary js-btn-plus btnIncrementar" type="button">&plus;</button>
                        </div>
                      </div>

                    </td>
                    <td class="cant<?php echo $arreglocarrito[$i]['Id']; ?>">
                      $<?php echo $arreglocarrito[$i]['Precio'] * $arreglocarrito[$i]['Cantidad']; ?></td>
                    <td><a href="#" class="btn btn-primary btn-sm btnEliminar" data-id="<?php echo $arreglocarrito[$i]['Id'];?>">X</a></td>
                  </tr>

                <?php } } ?>



                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              <div class="col-md-6 mb-3 mb-md-0">
                <button onclick="window.location='carrito.php'"class="btn btn-primary btn-sm btn-block">Actualizar</button>
              </div>
              <div class="col-md-6">
                <button onclick="window.location='obras.php'" class="btn btn-outline-primary btn-sm btn-block">Continuar Comprando</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Cupon</label>
                <p>Ingresa el cupon si tienes uno.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-sm">Aplicar cupon</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Total Carrito</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php echo $total;?></strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">$<?php echo $total;?></strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='check.php'">Proceso de Checkout</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <script src="js1/jquery-3.3.1.min.js"></script>
  <script src="js1/jquery-ui.js"></script>
  <script src="js1/popper.min.js"></script>
  <script src="js1/bootstrap.min.js"></script>
  <script src="js1/owl.carousel.min.js"></script>
  <script src="js1/jquery.magnific-popup.min.js"></script>
  <script src="js1/aos.js"></script>

  <script src="js1/main.js"></script>
    


  <script>
    $(document).ready(function(){
      $(".btnEliminar").click(function(event){
        event.preventDefault();
        var id = $(this).data('id');
        var boton = $(this);

        $.ajax({
          method: 'POST',
          url:'./php/eliminarCarrito.php',
          data:{
            id:id
          }
        }).done(function(respuesta){
          boton.parent('td').parent('tr').remove;
          header("Location: carrito.php");
        });
      });
      $(".txtCantidad").keyup(function(){
        var cantidad = $(this).val();
        var precio = $(this).data('precio');
        var id = $(this).data('id');
        incrementar(cantidad, precio, id);

      });
      $(".btnIncrementar").click(function(){
       var precio= $(this).parent('div').parent('div').find('input').data('precio');
       var id= $(this).parent('div').parent('div').find('input').data('id');
       var cantidad= $(this).parent('div').parent('div').find('input').val();
       incrementar(cantidad, precio, id);
      });
      function incrementar(cantidad, precio, id){
        
        var mult = parseFloat(cantidad) * parseFloat(precio);
        $(".cant"+id).text(mult);
      }
    });

  </script>

  </body>
</html>