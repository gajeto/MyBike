<?php
session_start();
require_once (__DIR__."/../Controller/MDB/BicicletaMDB.php");


if(!empty($_SESSION)) {
    $c = count(array_keys($_SESSION));
}else{
    $c = 0;
}

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
   </head>
   <body>
      <?php include "templates/header.php"; ?>
      
      <div class='page-tile tile-1 top-tile' style='background-image: url(images/garaje.jpg);'>
         <div class='home-content'>
            <div class='frost' style='margin: 0px; padding: 0px;'>
               <div aria-multiselectable='true' class='panel-group bigger_text' id='accordian' role='tablist' style='margin-bottom: 1px;'>
                  <div class='garage-group' style='background: rgba(250,250,250,.7);'>
                     <a aria-controls='garageBody' aria-expanded='true' class='light_hover' data-parent='#accordion' data-toggle='collapse' href='#garageBody' role='button'>
                        <div class='panel-heading' id='garageName' role='tab' style='height: 75px;'>
                           <div class='row'>
                              <div class='col-xs-12 col-sm-6 bigonly'>
                                 <div class='left' style='padding-top: 25px;'>
                                    <h2 class='panel-title gray-text'>Tus bicicletas (<?php echo $c ?>)</h2>
                                 </div>
                              </div>
                              <div class='col-xs-12 col-md-6'>
                                 <div class='row' style='padding: 0px;'>
                                    <div class='col-xs-7 col-lg-6 col-lg-offset-3 col-sm-3 col-sm-offset-7 right' style='padding-top: 15px;'>
                     <a class='btn btn-sm btn-danger headline sml_btn' data-turbolinks='false' href='iniciar_alerta.php'>
                     <i class='fa fa-exclamation-triangle'></i>
                     <span class='smallonly'>¿Bicicleta robada?
                     </span>
                     <span class='bigonly'>¿Bicicleta robada?
                     </span>
                     </a>
                     </div>
                     <div class='col-xs-3 col-sm-2 right' style='padding-top: 15px;'>
                     <a class='btn btn-sm headline sml_btn' data-turbolinks='false' href='agregar_bicicleta.php'>
                     <i class='fa fa-plus-circle'></i>
                     Agregar
                     </a>
                     </div>
                     </div>
                     </div>
                     </div>
                     </div>
                     </a>
                     <form action="../Controller/Actions/cargar_bicicletas.php" method="POST">
                     <div class='clearfix'></div>
                     <div aria-labelledby='garageName' class='panel-collapse collapse in' id='garageBody' role='tabpanel'>
                        <div class='garage-body'>

                           <div class='col-sm-12 left' style='margin: 0px; padding: 0px;'>
                              <?php if (isset($_SESSION['b0'])): ?>
                                 <?php foreach ($_SESSION as $i => $value): ?>
   

                                    <div class='col-sm-6 col-xs-12' style='margin: 0px; padding: 0px; max-height: 250px'>
                                       <a data-turbolinks='false' href='editar_bicicleta.php'>
                                          <div class='row bike bike-back' style="background: url('assets/bike_default.png'); background-repeat: no-repeat; background-size: cover; background-position:center;">
                                             <div class='bike-glass'>
                                                <div class='col-sm-9'>
                                                   <div class='caption'>
                                                      <div class='label label-info upper'><?php echo $_SESSION[$i]['ESTADO']; ?></div>
                                                      &nbsp;
                                                      <div class='name'> <?php echo $_SESSION[$i]['MARCA']; ?></div>
                                                       <?php echo $_SESSION[$i]['MODELO']; ?>
                                                      <div class='serial'>
                                                         Serial Number  <?php echo $_SESSION[$i]['SERIAL']; ?>
                                                      </div>
                                                      <div class='yellow'>
                                                         <i class='fa fa-gear'></i>
                                                         Editar 
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class='col-sm-3'>
                                                   <div class='lock-level'>
                                                      <img height='50px;' src='https://project529.com/garage/assets/shield_0_0@2x-e64a11e00563515fc63320fdf15648413e5947ed6313a3305ec086482728f95d.png'>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </a>
                                    </div>

                                 <?php endforeach; ?>
                              <?php endif; ?>
                           </div>
                        </div>
                     </div>
                     </form>
                  </div>
               </div>

               <div aria-multiselectable='true' class='panel-group bigger_text' id='accordian' role='tablist' style='margin-bottom: 1px;'>
                  <div class='garage-group' style='background: rgba(250,250,250,.7);'>
                     <a aria-controls='spottedGarageBody' aria-expanded='false' class='light_hover' data-parent='#accordion' data-toggle='collapse' href='#spottedGarageBody' role='button'>
                        <div class='panel-heading' id='spottedGarageName' role='tab'>
                           <div class='row'>
                              <div class='col-sm-9'>
                                 <div class='left' style='padding-top: 15px;'>
                                    <h2 class='panel-title gray-text bigonly'>Bicicletas recuperadas </h2>
                                 </div>
                              </div>
                              <div class='col-xs-12 col-sm-3'>
                                 <div class='right add_btn'>
                     <a class='btn headline' data-turbolinks='false' href='reportar_vista.php'>
                     <i class='fa fa-plus-circle'></i>
                     Agrega una bicicleta
                     </a>
                     </div>
                     </div>
                     </div>
                     </div>
                     </a>
                     <div aria-labelledby='spottedGarageName' class='panel-collapse collapse in' id='spottedGarageBody' role='tabpanel'>
                        <div class='garage-body'>
                           <div class='col-sm-12 left' style='margin: 0px; padding: 0px;overflow-y: scroll;'></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class='spacer' style='margin-bottom: 400px;'>&nbsp;</div>
            </div>
         </div>
      </div>
      <div class='unobtrusive-flash-container'></div>
      
      </div>
      <script>
         $(document).ready(function() {
         
             //console.log($('.footer').get_timezone());
             $.cookie("time_zone", $('.footer').get_timezone());
         });
      </script>
   </body>
</html>