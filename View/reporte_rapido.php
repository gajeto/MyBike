<?php
session_start();
require_once (__DIR__."/../Controller/MDB/BicicletaMDB.php");

                        
?>


<!DOCTYPE html>
<html class='csstransforms csstransforms3d csstransitions' lang='en-US'>
   <head>
      <meta charset='utf-8'> 
      <meta content='width=device-width, initial-scale=1.0, user-scalable=no' name='viewport'>
      <title>MyBike</title>

      <meta content='assets/logo_black.png' property='og:image'>
      <link rel="shortcut icon" type="image/x-icon" href="assets/logo_icon2.ico"/>
      
      <link rel="stylesheet" media="all" href="css/style.css"/>
      <link rel="stylesheet" media="all" href="https:////fonts.googleapis.com/css?family=Abel"/>
      <link rel="stylesheet" media="all" href="https:////fonts.googleapis.com/css?family=Patua+One"/>
        
      <script src="https://kit.fontawesome.com/8dba173683.js" crossorigin="anonymous"></script>
      <script src="js/main.js" data-turbolinks-track="true"></script>
      <script src="js/reportar.js" data-turbolinks-track="true"></script>
   </head>
   <body>
     <?php include "templates/header.php"; ?>
     
      <div class='page-tile tile-1 top-tile' style='background-image: url(https://project529.com/garage/assets/rider_background-7c83a34ef333a1971dd8560dd110efac10388d11ddfcd6a911e74cac2ebcfb4b.jpg); background-size: cover; background-repeat: no-repeat; '>
         <div class='home-content'>
            <form action="../Controller/Actions/pasar_nombre.php" method="POST">
            <div class='frost' style='margin: 0px; margin-bottom: 100px; min-height: 545px;'>
               <div class='row'>
                  <div class='col-md-6 col-md-offset-3 no-mobile-padding'>
                     <div class='user-setting-form'>
                        <h3 class='titlecase'>Selecciona la bicicleta que fue robada</h3>
                        <select name="bike" class="form-control">
                            <?php if (isset($_SESSION['b0'])): ?>
                                 <?php foreach ($_SESSION as $i => $value): ?>

                                    <option value="<?php echo $_SESSION[$i]['NOMBRE']; ?>">
                                        <?php echo $_SESSION[$i]['NOMBRE']; ?>
                                    </option>

                                 <?php endforeach; ?>
                            <?php endif; ?>
                        </select>

                        <h3 class='titlecase'>o</h3>
                        <!-- <a class='btn' href='https://project529.com/garage/bikes/new?stolen=true'>Agrega una nueva</a>-->
                        <a class='btn' href='agregar_bicicleta.php'>Agrega una nueva</a>
                        <hr>
                        <div class='right'>
                           <input type="submit" name="commit" value="Reportar" class="btn form-submit" id="search_submit"/>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            </form>
         </div>
      </div>
   
      
      <div class='unobtrusive-flash-container'></div>
    
      </div>
     
   </body>
</html>