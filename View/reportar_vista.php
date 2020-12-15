<?php
session_start();
require_once (__DIR__."/../Controller/MDB/EncontradaMDB.php");

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
      
      <script src="js/main.js" data-turbolinks-track="true"></script>
      <script src="https://kit.fontawesome.com/8dba173683.js" crossorigin="anonymous"></script>
   </head>
   <body>
    
      <?php include "templates/header.php"; ?>
      <div class='page-tile tile-1 top-tile' style='background-image: url(https://project529.com/garage/assets/rider_background-7c83a34ef333a1971dd8560dd110efac10388d11ddfcd6a911e74cac2ebcfb4b.jpg); background-size: cover; background-repeat: no-repeat;'>
         <div class='home-content'>
            <div class='frost' style='margin: 0px; margin-bottom: 100px;'>
               <div class='row'>
                  <div class='col-md-8 col-md-offset-2 no-mobile-padding'>
                     <div class='user-setting-form'>
                        <div class='row'>
                           <div class='col-sm-12 center'>
                              <div class='row'>
                                 <div class='col-md-12'>
                                    <div class='well'>
                                       <h2>Informanos sobre la bicicleta que encontraste</h2>
                                       <br>Si no tienes todos los datos, no hay problema. Sólo agrega lo que puedas.
                                    </div>
                                    <p></p>
                                 </div>
                                 <form class="form-horizontal new-bike" action="../Controller/Actions/registrar_encontrada.php" accept-charset="UTF-8" method="post">
                                  
                                   
                                  
                                    <div class='left reg_form'>
                                       <div class='row'>
                                          <div class='col-sm-12'>
                                             <div class='form-group'>
                                                  <label class='control-label'>Número serial
                                                </label>
                                                <input class='form-control' maxlength='255' name='e_serial' placeholder="Usualmente está grabado en el cuadro" type='text'>
                                             </div>
                                          </div>
                                       </div>
                                       <div class='row'>
                                          <div class='col-sm-5'>
                                             <div class='form-group manufacturers'>
                                                <label class='control-label'>Marca
                                                </label>
                                                <input class='form-control' maxlength='255' name='marca' spellcheck='false' type='text'>
                                    
                                             </div>
                                          </div>
                                          <div class='col-sm-6 col-sm-offset-1'>
                                             <div class='form-group bike_models'>
                                                <label class='control-label'>Modelo
                                                </label>
                                                <input autocomplete='off' class='form-control' maxlength='255' name='modelo' spellcheck='false' type='text'>
                                             </div>
                                          </div>
                                       </div>
                                       <div class='row'>
                                          <div class='col-sm-5'>
                                             <div class='form-group'>
                                                <label class='control-label'>Color del cuadro
                                                </label>
                                                <select class="form-control" name="color1">
                                                      <option value=""></option>
                                                      <option value="Negro">Negro</option>
                                                      <option value="Azul">Azul</option>
                                                      <option value="Cafe">Cafe</option>
                                                      <option value="Gris">Gris</option>
                                                      <option value="Verde">Verde</option>
                                                      <option value="Naranja">Naranja</option>
                                                      <option value="Rosado">Rosado</option>
                                                      <option value="Morado">Morado</option>
                                                      <option value="Rojo">Rojo</option>
                                                      <option value="Amarillo">Amarillo</option>
                                                      <option value="Blanco">Blanco</option>
                                                      <option value="Plata">Plata</option>
                                                      <option value="Cobre">Cobre</option>
                                                      <option value="Oro">Oro</option>
                                                      <option value="Bronce">Bronce</option>
                                                </select>
                                             </div>
                                          </div>
                                          <div class='col-sm-6 col-sm-offset-1'>
                                             <div class='form-group'>
                                                <label class='control-label'>Color secundario
                                                </label>
                                                <select class="form-control" name="color2">
                                                      <option value=""></option>
                                                      <option value="Negro">Negro</option>
                                                      <option value="Azul">Azul</option>
                                                      <option value="Cafe">Cafe</option>
                                                      <option value="Gris">Gris</option>
                                                      <option value="Verde">Verde</option>
                                                      <option value="Naranja">Naranja</option>
                                                      <option value="Rosado">Rosado</option>
                                                      <option value="Morado">Morado</option>
                                                      <option value="Rojo">Rojo</option>
                                                      <option value="Amarillo">Amarillo</option>
                                                      <option value="Blanco">Blanco</option>
                                                      <option value="Plata">Plata</option>
                                                      <option value="Cobre">Cobre</option>
                                                      <option value="Oro">Oro</option>
                                                      <option value="Bronce">Bronce</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class='row'>
                                          <div class='col-sm-5'>
                                             <div class='form-group'>
                                                <label class='control-label'>
                                                   Código externo 
                                                   <span>
                                                   <i class='fa fa-question-circle blue help_button' data-help-text="Si la bicicleta tiene algún codigo diferente al serial, registralo para cruzarlo con las bases de datos de otras websites de registro de bicicletas" data-target='#help_modal' data-toggle='modal'></i>
                                                   </span>
                                                </label>
                                                <input class='form-control' maxlength='20' name='codigo' spellcheck='false' type='text'>
                                             </div>
                                          </div>
                                          <div class='col-sm-6 col-sm-offset-1'>
                                              <div class='form-group'>
                                                   <label class='control-label'>Tipo de bicicleta
                                                   </label>
                                                   <select class="form-control" name="tipo">
                                                      <option value=""></option>
                                                      <option value="BMX">BMX</option>
                                                      <option value="Montaña">Montaña</option>
                                                      <option value="Ruta">Ruta</option>
                                                      <option value="Pista">Pista</option>
                                                      <option value="Carga">Carga</option>
                                                      <option value="Urbana">Urbana</option>
                                                      <option value="A medida">A medida</option>
                                                      <option value="Cyclocross">Cyclocross</option>
                                                      <option value="Electrica">Electrica</option>
                                                      <option value="Monopatin">Monopatin</option>
                                                      <option value="Eliptica">Eliptica</option>
                                                      <option value="Fat bike">Fat bike</option>
                                                      <option value="Plegable">Plegable</option>
                                                      <option value="Freestyle">Freestyle</option>
                                                      <option value="Hibrida">Hibrida</option>
                                                      <option value="Gravilla">Gravilla</option>
                                                      <option value="Turismo">Turismo</option>
                                                      <option value="Tandem">Tandem</option>
                                                      <option value="Fixie">Fixie</option>
                                                      <option value="Trial">Trial</option>
                                                      <option value="Triatlon">Triatlon</option>
                                                      <option value="Triciclo">Triciclo</option>
                                                      <option value="Vintage">Vintage</option>
                                                      <option value="Infantil">Infantil</option>
                                                   </select>
                                                </div>
                                          </div>
                                       </div>
                                       <div class='row'>
                                          <div class='col-sm-5'>
                                             <div class='form-group'>
                                                <label class='control-label'>¿Cuándo la viste?
                                                </label>
                                                <input class='seen_at form-control' data-provide='datepicker' data-value='2020-12-15' required type='text' value='2020-12-15' name="fecha">
                                                
                                             </div>
                                          </div>
                                       </div>
                                       <div class='row'>
                                          <div class='col-sm-12'>
                                             <div class='form-group'>
                                                <label class='control-label'>¿Dónde la viste?
                                                </label>
                                                <input class='form-control' id='location_address' maxlength='255' name='lugar' placeholder='Ciudad/Calle/Establecimiento' required spellcheck='false' type='text'>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class='row'>
                                       <div class='col-sm-12'>
                                          <div class='form-group'>
                                             <label class='control-label'>Describe el lugar donde encontraste la bicicleta
                                             </label>
                                             <textarea name="info_lugar" class="form-control" maxlength="255" cols="24" rows="6"></textarea>
                                          </div>
                                       </div>
                                       <div id='upload-preview'>
                                          <div class='row'>
                                             <div class='col-sm-12 col-md-4 col-md-offset-4'>
                                                <div class='form-group'>
                                                   <label class='control-label'>Carga una foto
                                                   </label>
                                                   <img class='colwidth' id='img_prev' src='https://project529.com/garage/assets/take_photo-07d599ebd233a1c1b5a8f38611c0ac7eb2b18ff5e044a4687c3e82f62f65895a.jpg' style='border: 2px solid #CCC'>
                                                   <br>
                                                   <a class='btn add_photo colwidth' data-placement='left' data-toggle='tooltip' title='Add a photo of the drive train side of the bike'>
                                                   <span class='fa fa-upload'></span>
                                                   <Cargar></Cargar>
                                                   <input class="opacity" type="file" id="photo" name="foto" onchange="getImage(this);"/>
                                                   </a>
                                                   <p></p>
                                                   <br>
                                                </div>
                                             </div>
                                             <div class='col-sm-12'>
                                                <div class='form-group'>
                                                   <label class='control-label'>¿Tienes detalles adicionales que agregar?
                                                   </label>
                                                   <textarea name="detalles" class="form-control" maxlength="255" cols="24" rows="10"></textarea>
                                                </div>
                                             </div>
                                          </div>
                                          <div class='row'>
                                             <div class='col-sm-12'>
                                                <hr>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class='row'>
                                       <div class='col-sm-12'>
                                          <div class='form-group'>
                                             <span class='left'>
                                            ¿Podemos compartir tu email para ayudar a devolverla a su propietario?<br> Ingresa tu email o si no permanece anónimo. Eres un vigilante MyBike.
                                             <br><br>
                                             </span>
                                             <input type="email" name="email" class="form-control" maxlength="255"/>
                                          </div>
                                       </div>
                                    </div>
                                    <div class='row'>
                                       <div class='col-sm-12'>
                                          <div class='form-group'>
                                             <input class='btn' disable_with='Saving' type='submit' value='Reportar'>
                                             <a class='btn'>Ver</a>
                                             <a class='btn' id='delete_btn'>Cancelar</a>
                                          </div>
                                       </div>
                                    </div>
                                 </form>
                              </div>
                              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9ttt-QoQlQMWJ8WSdkR8_o2Z-xWSPNkA&amp;libraries=geometry" type="text/javascript"></script>
                              <script>
                                 $('.seen_at').datepicker({
                                 
                                     language: 'en-US',
                                     format: "yyyy-mm-dd"
                                 });
                                 
                                 $('.seen_at').on("change ", function() {
                                     formatted_date = $('.seen_at').datepicker('getDate')
                                     $('#seen_at').val(formatted_date);
                                 });
                                 
                                
                                 $('#delete_btn').click(function() {
                                     bootbox.confirm("¿Segur@ que quieres eliminar este reporte?", function(do_it) {
                                         if (do_it) {
                                             $.ajax({
                                                 url: "",
                                                 type: "POST",
                                                 dataType: "HTML",
                                                 data: {
                                                     "_method": "delete",
                                                     "authenticity_token": "UZaxGskm47b5j2DGtyLvIigv6e/2AS5jDdque7TEC3k2CL9eDqqaiAigh+UAavHwXYvhEQYIEpFRFvM0KAeNng==",
                                                     "id": ""
                                                 },
                                                 complete: function() {
                                                     window.location.href = '/bikes/search';
                                                 }
                                             });
                                         }
                                     });
                                 });
                                 
                                
                                 
                                 function getImage(input) {
                                     if (input.files && input.files[0]) {
                                         var reader = new FileReader();
                                         reader.onload = function(e) {
                                             $('#img_prev').attr('src', e.target.result).width(250)
                                         }
                                         ;
                                         reader.readAsDataURL(input.files[0]);
                                     }
                                 }
                                 
                                 $('#serial_number').on("keyup", function() {
                                     if ($('#serial_number').val() != "") {
                                         $.ajax({
                                             url: "/garage/bad_serial_check?serial_number=" + $('#serial_number').val(),
                                             type: "GET",
                                             dataType: "JSON",
                                             success: function(data, status, xhr) {
                                                 if (data) {
                                                     if (data.not_serial.serial_number) {
                                                         $('#bad_serial_warning').removeClass("hidden")
                                                         $('#serial_number').addClass("red")
                                                     } else {
                                                         $('#bad_serial_warning').addClass("hidden")
                                                         $('#serial_number').removeClass("red")
                                                     }
                                 
                                                 } else {
                                                     $('#bad_serial_warning').addClass("hidden")
                                                     $('#serial_number').removeClass("red")
                                                 }
                                 
                                             }
                                         });
                                     }
                                 });
                              </script>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class='unobtrusive-flash-container'></div>

      <script>
         $(document).ready(function() {
         
             //console.log($('.footer').get_timezone());
             $.cookie("time_zone", $('.footer').get_timezone());
         });
      </script>
   </body>
</html>