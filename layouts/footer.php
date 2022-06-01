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
if(isset($_POST['btn_send'])){
  $email    = strip_tags($_POST['email']);
  

  try{
     if($id != null){
       $id = null;
     }else{
       if($objUser->insertSub($email)){
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

<footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navegación</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="index.php">Inicio</a></li>
                  <li><a href="contacto.php">Contacto</a></li>
                  <li><a href="carrito.php">Carro de compras</a></li>
                  
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="obras.php">Obras</a></li>
                  <li><a href="#">About</a></li>
                  <li><a href="https://www.instagram.com/uninorteco/?hl=es">Instagram</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="estructuras.php">Esculturas</a></li>
                  <li><a href="abstractos.php">Abstractos</a></li>
                  <li><a href="realismo.php">Realismo</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
            <h3 class="footer-heading mb-4">Promo</h3>
            <a href="obras.php" class="block-6">
              <img src="imagenes/cuadro5.jpg" alt="Image placeholder" class="img-fluid rounded mb-4">
              <h3 class="font-weight-light  mb-0">Encuentra tu cuadro ideal</h3>
              <p>Promo de  mayo 15 &mdash; 25, 2022</p>
            </a>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">Área metropolitana de Barranquilla, Kilómetro 5 Vía, Puerto Colombia, Atlántico</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">artgallery@gmial.com</li>
              </ul>
            </div>

            <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Subscribe</label>
                <div class="form-group">
                  <input type="email" class="form-control" id="email" name="email" placeholder="">
                  <input type="submit" class="btn btn-sm btn-primary" name="btn_send" value="Send">
                </div>
                
              </form>
            </div>

          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
         
            Copyright &copy;
            <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
            <script>document.write(new Date().getFullYear());</script> All rights reserved | 
            Art Gallery <i class="icon-heart" aria-hidden="true"></i>
        
            </p>
          </div>
          
        </div>
      </div>
    </footer>