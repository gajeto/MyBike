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
      
      <div class='page-tile tile-1 top-tile' style='background-image: url(https://project529.com/garage/assets/rider_background-7c83a34ef333a1971dd8560dd110efac10388d11ddfcd6a911e74cac2ebcfb4b.jpg); background-size: cover; background-repeat: no-repeat;'>
         <div class='home-content'>
            <div class='frost' style='margin: 0px; margin-bottom: 100px;'>
               <div class='row'>
                  <div class='col-md-8 col-md-offset-2 no-mobile-padding'>
                     <div class='user-setting-form'>
                        <div class='row'>
                           <div class='col-sm-12 center'>
                              <form class="form-horizontal new-bike" id="new_bike"  action="../Controller/Actions/registrar_nueva.php" accept-charset="UTF-8" method="post">
                                 <input name="utf8" type="hidden" value="&#x2713;"/>
                                 <input type="hidden" name="authenticity_token" value="kOLqV/HmWo+CXkZhXIBS7v6KpoJcQftCZMIJGiP7wIz3fOQTNmojsXNxoULryEw8iy6ufKxIx7A4DlRVvzhGaw=="/>
                                 <div class='row'>
                                    <div class='col-md-12'>
                                       <div class='well'>
                                          <h2>Registra tu bicicleta</h2>
                                          <br>Si ahora te falta alguna información, puedes agregarla mas tarde
                                       </div>
                                    </div>
                                    <div class='col-md-12'>
                                       <div class='left reg_form'>
                                          <div class='row'>
                                             <div class='col-sm-5'>
                                                <div class='form-group'>
                                                   <div class='checkbox'>
                                                      <input class='form-checkbox help' id='bike_stolen' name='estado' type='checkbox'>
                                                      <label class='help red' style='line-height: 1'>Reportar como robada
                                                      </label>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class='row'>
                                             <div class='col-sm-5'>
                                                <div class='form-group'>
                                                   <label class='control-label'>Nombre de la bicicleta
                                                   </label>
                                                   <input class='form-control' maxlength='255' name='nombre' spellcheck='false' type='text'>
                                                </div>
                                             </div>
                                             <div class='col-sm-5 col-sm-offset-1'>
                                                <div class='form-group'>
                                                   <label class='control-label'>Número serial
                                                   </label>
                                                   <input class='form-control' id='serial_number' maxlength='255' name='serial' placeholder="Usualmente está grabado en el cuadro" type='text'>
                                                </div>
                                             </div>
                                          </div>
                                          <div class='row'>
                                             <div class='col-sm-5'>
                                                <div class='form-group manufacturers'>
                                                   <label class='control-label'>Marca
                                                   </label>
                                                   <input class='form-control' maxlength='255' name='marca'  spellcheck='false' type='text'>
                                                </div>
                                             </div>
                                             <div class='col-sm-5 col-sm-offset-1'>
                                                <div class='form-group bike_models'>
                                                   <label class='control-label'>Modelo
                                                   </label>
                                                   <input class='form-control' maxlength='255' name='modelo' spellcheck='false' type='text'>
                                                </div>
                                             </div>
                                          </div>
                                          <div class='row'>
                                             <div class='col-sm-5'>
                                                <div class='form-group'>
                                                   <label class='control-label'>
                                                   Color del cuadro
                                                   <span>
                                                   <i class='fa fa-question-circle blue help_button' data-help-text="¿No ves el color de tu bicicleta? Escoge el que más se parezca. Así garantizamos mejores resultados en la búsqueda y recuperación." data-target='#help_modal' data-toggle='modal'></i>
                                                   </span>
                                                   </label>
                                                   <select class="form-control" name="color_p" id="bike_primary_color">
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
                                             <div class='col-sm-5 col-sm-offset-1'>
                                                <div class='form-group'>
                                                   <label class='control-label'>Color secundario
                                                   </label>
                                                   <select class="form-control" name="color_s" id="bike_secondary_color">
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
                                                   <label class='control-label'>Tipo de bicicleta
                                                   </label>
                                                   <select class="form-control" name="tipo" id="bike_bike_type_id">
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
                                             <div class='col-sm-5 col-sm-offset-1'>
                                                <div class='form-group'>
                                                   <label class='control-label'>Valor comercial
                                                   </label>
                                                   <input class='form-control' id='bike_value' limit='2000000000' maxlength='7' name='valor' oninput="this.value=this.value.replace(/[^0-9]/g,'');" type='text'>
                                                </div>
                                             </div>
                                            
                                          </div>
                                          <div class='row email'>
                                             <div class='col-sm-11'>
                                                <div class='form-group'>
                                                   <label class='left' style='text-transform:none;'>Si tienes algún dato adicional que pueda ayudar a identificar tu bicicleta, ponlo en este espacio
                                                   </label>
                                                   <input autocomplete='off' class='form-control' id='email' maxlength='255' name='info' placeholder='' spellcheck='false' type='text'>
                                                </div>
                                             </div>
                                          </div>
                                       </div>

                                       <hr>
                                       <input type="submit" name="commit" value="Registrar Bicicleta" class="btn form-submit" id="submit_btn" data-disable-with="Registrando"/>
                                       <a class='btn' href='garaje.php' id='clear_search'>Cancelar
                                       </a>
                                    </div>
                                 </div>
                              </form>
                              <div class='modal fade' id='help_modal'>
                                 <div class='modal-dialog'>
                                    <div class='modal-content'>
                                       <div class='modal-body' style='padding: 25px;'>
                                          <div id='helpcontent'></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                         
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
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