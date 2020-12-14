<!DOCTYPE html>
<html class='csstransforms csstransforms3d csstransitions' lang='en-US'>
   <head>
      <meta charset='utf-8'>
      <meta content='width=device-width, initial-scale=1.0, user-scalable=no' name='viewport'>
      <title>MyBike</title>

      <meta content='assets/logo2.png' property='og:image'>
      <link rel="shortcut icon" type="image/x-icon" href="assets/logo_icon2.ico" />
      
      <link rel="stylesheet" media="all" href="css/style.css" />
      <link rel="stylesheet" media="all" href="https:////fonts.googleapis.com/css?family=Abel" />
      <link rel="stylesheet" media="all" href="https:////fonts.googleapis.com/css?family=Patua+One" />
      
      <script src="https://kit.fontawesome.com/8dba173683.js" crossorigin="anonymous"></script>
      <script src="js/main.js" data-turbolinks-track="true"></script>
   </head>
   <body>
      <?php include "templates/header.php"; ?>
      <div class='home-tile tile-1 top-tile' style='background-image: url(images/bikes1.jpg)'>
         <div class='home-content' style='min-height: 500px;  overflow: auto;'>
            <div class='frost' style='margin: 0px; min-height: 500px; position: absolute; top:0; left: 0; width: 100%; background-color: rgba(85, 85, 85, 0.8)'>
               <div class='home-top-tile-body'>
                  <h1 class='center yellow titlecase monster-text'>
                     <span>
                     <span style='color: #ffea00'>
                     Registra.
                     </span>
                     <span style='color: #fdad00'>
                     Reporta.
                     </span>
                     <span style='color: #03d05a'>
                     Recupera.
                     </span>
                     </span>
                  </h1>
                  <h2 class='white'>
                     <p></p>
                     <span>
                     Mantén a salvo tus bicicletas en el garaje de MyBike
                     </span>
                  </h2>
                  <h3>
                     <a class='btn yellow' data-turbolinks='false' href='registrarse.php' style='margin-bottom: 10px;'>
                        <div class='bigonly'>
                           Regístrate gratis
                        </div>
                        <div class='smallonly'>
                           Regístrate 
                        </div>
                     </a>
                  </h3>
               </div>
            </div>
         </div>
      </div>
      <div class='home-tile light-tile' style='padding: 1px;'>
         <div class='row center' style='padding: 0px;'>
            <div class='col-lg-3 col-sm-6 col-xs-12 home-tile-button' style='padding: 0px; border-right: 1px solid #ddd;border-bottom: 1px solid #ddd; padding-bottom: 20px;'>
               <div class='div pad20' style='height: 175px; '>
                  <h3 class='titlecase gray-text'>
                     ¿Bicicleta robada?
                  </h3>
                  Alerta a nuestra comunidad de ciclistas y vigilantes para ayudarte a recuperarla. 
               </div>
               <a class='btn' data-turbolinks='false' href='login.php' style='margin-bottom: 10px;'>
               Reportar robo
               </a>
            </div>
            <div class='col-lg-3 col-sm-6 col-xs-12 home-tile-button' style='padding: 0px; border-right: 1px solid #ddd; border-bottom: 1px solid #ddd; padding-bottom: 20px;'>
               <div class='div pad20' style='height: 175px; '>
                  <h3 class='titlecase gray-text'>
                     ¿Quieres comprar una bicicleta?
                  </h3>
                  Consulta si está reportada como robada en MyBike o registrala.
               </div>
               <a class='btn' data-turbolinks='false' href='buscar_bicicletas.php' style='margin-bottom: 10px;'>
               Buscar bicicleta
               </a>
               <a class='btn' data-turbolinks='false' href='agregar_bicicleta.php' style='margin-bottom: 10px;'>
               Registrar
               </a>
            </div>
            <div class='col-xs-12 col-sm-6 col-lg-3 home-tile-button' style='padding: 0px; border-right: 1px solid #ddd;border-bottom: 1px solid #ddd; padding-bottom: 20px;'>
               <div class='div pad20' style='height: 175px; '>
                  <h3 class='titlecase gray-text'>
                     ¿Encontraste una bicicleta?
                  </h3>
                  Ayúdanos a devolverla a su propietario. Seguro le hace falta.
               </div>
               <a class='btn' data-turbolinks='false' href='bicicleta_encontrada.php' style='margin-bottom: 10px;'>
               Reportar hallazgo
               </a>
            </div>
            <div class='col-xs-12 col-sm-6 col-lg-3 home-tile-button blue_background' style='padding: 0px; border-right: 1px solid #ddd;border-bottom: 1px solid #ddd; padding-bottom: 20px;'>
               <div class='div pad20 white' style='height: 175px; '>
                  <h3 class='titlecase white'>
                     Aliados MyBike
                  </h3>
                  Somos el punto de encuentro de las comunidades en dos ruedas.
               </div>
               <a class='btn' data-turbolinks='false' href='https://modociclismo.com/' style='margin-bottom: 10px;'>
               Conoce más
               </a>
            </div>
         </div>
      </div>
      <div class='home-tile iphone-tile' style="background-image: url(assets/logo2.png);">
         <div class='frost'>
            <div class='home-content grey-text'>
               <p></p>
               <div class='row'>
                  <div class='col-md-8 col-md-offset-2 no-mobile-padding'>
                     <div class='well' style='font-size: 1.2em; background-color: rgba(250,250,250,.85);'>
                        <div class='row'>
                           <div class='col-xs-12'>
                              <h1>
                                 ¿Qué es MyBike?
                              </h1>
                              <h3 class='green'>
                                 Una comunidad que vigila tu bicicleta
                              </h3>
                           </div>
                        </div>
                        <hr>
                        <div class='row pad20'>
                           <div class='col-xs-3 col-sm-1 col-sm-offset-1'>
                              <i class='fas fa-bicycle'  style='font-size:24px'></i>
                           </div>
                           <div class='col-xs-9 col-sm-9 left'>
                              <h3 style='margin-top: 0px;'>
                                 Registra tu bicicleta
                              </h3>
                              Guarda rapidamente toda la información importante sobre tu bicicleta desde tu 
                              computador o tu celular. Es completamente gratis.
                           </div>
                        </div>
                        <p></p>
                        <div class='row pad20'>
                           <div class='col-xs-3 col-sm-1 col-sm-offset-1'>
                              <i class='fas fa-bicycle'  style='font-size:24px'></i>
                           </div>
                           <div class='col-xs-9 col-sm-9 left'>
                              <h3 style='margin-top: 0px;'>
                                 Inicia una alerta
                              </h3>
                              Utiliza todos los poderes de la comunidad MyBike para encontrar tu bicicleta robada. Nuestra comunidad incluye universidades, grupos de ciclistas, tiendas especializadas y vigilantes por toda Colombia, así como MyBikers como tu.
                           </div>
                        </div>
                        <p></p>
                        <div class='row pad20'>
                           <div class='col-xs-3 col-sm-1 col-sm-offset-1'>
                                <i class='fas fa-bicycle'  style='font-size:24px'></i>
                           </div>
                           <div class='col-xs-9 col-sm-9 left'>
                              <h3 style='margin-top: 0px;'>
                                 Recibe ayuda
                              </h3>
                              Si tu bicicleta está registrada, es más fácil devolvértela. Miles de bicicletas son recuperadas por las autoridades y la comunidad MyBike. No desampares la tuya.
                           </div>
                        </div>
                        <p></p>
                        <div class='row pad20'>
                           <div class='col-xs-3 col-sm-1 col-sm-offset-1'>
                                <i class='fas fa-bicycle'  style='font-size:24px'></i>
                           </div>
                           <div class='col-xs-9 col-sm-9 left'>
                              <h3 style='margin-top: 0px;'>
                                 Comparte #noRobesAdopta #soyVigilanteMyBike
                              </h3>
                              Si vas a comprar una bicicleta, asegurate de consultar nuestra base de datos para 
                              verificar que no esté reportada como robada. O si encuentras una bicicleta, o ves 
                              algo sospechoso, reportala con nosotros para que podamos ayudarte a devolverla.
                           </div>
                        </div>
                        <div class='row pad20'>
                           <div class='col-xs-12'>
                              <a class='btn yellow' data-turbolinks='false' href='login.php' style='margin-bottom: 10px;'>
                                 <h4>
                                    Registra tu bicicleta gratis
                                 </h4>
                              </a>
                           </div>
                        </div>
                        <hr>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
     
      </div>
      <div class='home-tile registering-tile'>
         <div class='frost'>
            <div class='home-content grey-text'>
               <p></p>
               <div class='row'>
                  <div class='col-md-8 col-md-offset-2'>
                     <div class='well' style='font-size: 1.2em; background-color: rgba(250,250,250,.85);'>
                        <div class='row'>
                           <div class='col-xs-12'>
                              <h1>
                                 Nuestra historia
                              </h1>
                           </div>
                        </div>
                        <hr>
                        <div class='row pad20'>
                           <div class='col-sm-12 col-md-10 col-md-offset-1 left'>
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse id luctus sapien. Cras lorem ligula, pulvinar nec dolor sit amet, volutpat facilisis elit. Etiam pharetra mattis tempus. Proin vitae urna ac velit elementum venenatis at ut velit. Nunc odio ipsum, elementum id iaculis ac, interdum ac libero. Morbi vel dolor rhoncus, venenatis dolor vel, gravida ligula. Nunc blandit, ante nec tincidunt feugiat, odio eros condimentum dui, in tincidunt est nibh nec nunc. Nulla placerat vehicula magna nec scelerisque. Praesent aliquet elit metus, et interdum orci lacinia quis.
                              <p></p>
                             Sed vel lorem est. Phasellus viverra dui vitae sem aliquam, nec pharetra dolor interdum. Phasellus ultrices odio sed sapien mollis, quis hendrerit erat rhoncus. Phasellus venenatis non libero a luctus. Integer vehicula erat vel quam faucibus, eu pharetra tellus tempus. Vivamus id metus sed lorem commodo tincidunt vel dignissim erat. Mauris et purus bibendum, sagittis elit nec, posuere lacus. Quisque non diam vitae ex vulputate aliquam.
                              <p></p>
                             
                           </div>
                        </div>
                        <div class='row'>
                           <div class='col-xs-12'>
                              <a class='btn' href='/about'>
                                 <h4>
                                    Button1
                                 </h4>
                              </a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
      </div>
    
      <script>
         $(document).ready(function(){
         
         
           var tz = $('#tzvalue').get_timezone();
           $.cookie('time_zone', tz, { path: '/' });
         
         
         
           $('#home-press').carousel({
             interval: 4000
           });
         
           $('#home-quotes').carousel({
             interval: 4000
           });
         
         
         });
      </script>
      <div class='unobtrusive-flash-container'></div>
 
      </div>
      <script>
         $(document).ready(function () {
         
           //console.log($('.footer').get_timezone());
           $.cookie("time_zone", $('.footer').get_timezone());
         });
      </script>
   </body>
</html>