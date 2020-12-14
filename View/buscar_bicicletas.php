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
      <script src="js/consultar.js" data-turbolinks-track="true"></script>
      
      
   </head>
   <body>
      <?php include "templates/header.php"; ?>
      
      <div class='home-tile tile-1 top-tile' style='background-image: url(images/bikes3.jpg);margin-top: -55px; min-height: 100%;'>
         <div class='home-content'>
            <div class='frost' style='margin: 0px; padding: 0px; margin-bottom: 50px; '>
               <div class='main div white'>
                  <span id='search_filter_form'>
                     <form id="search_form" action="../Controller/Actions/cargar_bicicletas.php" accept-charset="UTF-8" data-remote="true" method="POST">
                        <div class='div blue_background' style='border-bottom: 1px solid #ccc'>
                           <a class='white' data-turbolinks='false' href='bicicleta_encontrada.php' style='cursor: pointer'>¿Encontraste una bicicleta? Posteala en bicicletas encontradas.
                           </a>
                        </div>
                        <div class='row' id='search_panel' style='background: rgba(255,255,255,.95); color: rgb(102,102,102);'>
                           <div class='col-md-12 no-mobile-padding'>
                              <div class='search_text'>
                                 <div class='form-group'>
                                    <div class='row' style='padding: 0px; font-size: .7em;'>
                                       <div class='col-xs-12 col-md-10' style='padding: 0px;'>
                                          <div class='row filters' style='padding: 0px;'>
                                             <div class='col-xs-12 left'>
                                                <br>
                                              
                                                <div class='div'>
                                                   <div class='row' style='color: rgb(102,102,102);'>
                                                      
                                                      <div class='col-xs-12 col-md-2'>
                                                         <div class='form-group'>
                                                            <label class='control-label-tight'>Número serial
                                                            </label>
                                                            <input class='search_field clear_any form-control upper' id='serial' maxlength='10' name='serial' type='text'>
                                                         </div>
                                                      </div>
                                                      
                                                      <div class='col-xs-4 col-md-2'>
                                                         <div class='form-group'>
                                                            <label class='control-label-tight'>
                                                            <span>Radio de búsqueda
                                                            </span>
                                                            </label>
                                                            <div class='row' style='padding: 0px;'>
                                                               <div class='col-xs-5' style='padding: 0px;'>
                                                                  <input class='search_field form-control upper' id='radio' maxlength='10' name='radio' placeholder='25' spellcheck='false' type='text'>
                                                               </div>
                                                               <div class='col-xs-7' style='padding: 0px;'>
                                                                  <select class="form-control search_field" style="color: rgb(102,102,102);" id="radius_units" name="[radius_units]">
                                                                     <option selected="selected" value="km">Kilómetros</option>
                                                                     <option  value="mi">Millas</option>
                                                                  </select>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      
                                                      <div class='col-xs-4 col-md-2'>
                                                         <div class='form-group'>
                                                            <label class='control-label-tight'>
                                                            <span>Ciudad
                                                            </span>
                                                            </label>
                                                            <div class='row' style='padding: 0px;'>
                                                               <div class='col-xs-12' style='padding: 0px;'>
                                                                  <select class="form-control search_field" style="color: rgb(102,102,102);" id="ciudad" name="ciudad">
                                                                    <option value=""></option>
                                                                     <option>Amazonas</option>
                                                                      <option>Antioquia</option>
                                                                      <option>Arauca</option>
                                                                      <option>Atlántico</option>
                                                                      <option>Bogotá</option>
                                                                      <option>Bolivar</option>
                                                                      <option>Boyacá</option>
                                                                      <option>Caldas</option>
                                                                      <option>Caquetá</option>
                                                                      <option>Casanare</option>
                                                                      <option>Cauca</option>
                                                                      <option>Cesar</option>
                                                                      <option>Chocó</option>
                                                                      <option>Córdoba</option>
                                                                      <option>Cundinamarca</option>
                                                                      <option>Guainía</option>
                                                                      <option>Guajira</option>
                                                                      <option>Guaviare</option>
                                                                      <option>Huila</option>
                                                                      <option>Magdalena</option>
                                                                      <option>Meta</option>
                                                                      <option>Nariño</option>
                                                                      <option>Norte de Santander</option>
                                                                      <option>Putumayo</option>
                                                                      <option>Quindío</option>
                                                                      <option>Risaralda</option>
                                                                      <option>San Andrés y Providencia</option>
                                                                      <option>Santander</option>
                                                                      <option>Sucre</option>
                                                                      <option>Tolima</option>
                                                                      <option>Valle del Cauca</option>
                                                                      <option>Vaupés</option>
                                                                      <option>Vichada</option>
                                                                  </select>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class='col-xs-6 col-md-2 search_btns'>
                                                         <a class='panel_close' data-turbolinks='false' style='cursor: pointer'>
                                                         <span id='toggle_filters_text'>Menos Filtros
                                                         </span>
                                                         <i class='fa fa-angle-down' id='toggle_filters_icon'></i>
                                                         </a>
                                                         <p></p>
                                                      </div>
                                                   </div>
                                                   <div id='more_fields'>
                                                      <hr>
                                                      <div class='row' style='color: rgb(102,102,102);'>
                                                         <div class='col-xs-12 col-md-3'>
                                                            <div class='form-group manufacturers'>
                                                               <label class='control-label-tight'>Marca
                                                               </label>
                                                               <input class='search_field  form-control' id='marca' maxlength='10' name='marca' spellcheck='false' type='text'>
                                                            </div>
                                                         </div>
                                                         <div class='col-xs-12 col-md-2'>
                                                            <div class='form-group bike_models'>
                                                               <label class='control-label-tight'>Modelo
                                                               </label>
                                                               <input class='search_field form-control' id='modelo' maxlength='10' name='modelo' spellcheck='false' type='text'>
                                                            </div>
                                                         </div>
                                                         <div class='col-xs-12 col-md-2'>
                                                            <div class='form-group'>
                                                               <label class='control-label-tight'>Color
                                                               </label>
                                                               <select class="form-control search_field" style="color: rgb(102,102,102);" id="color" name="color">
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
                                                         <div class='col-xs-12 col-md-2'>
                                                            <div class='form-group'>
                                                               <label class='control-label-tight'>Tipo de bicicleta
                                                               </label>
                                                               <select class="form-control search_field" style="color: rgb(102,102,102);" id="tipo" name="tipo">
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
                                                      <div class='row' style='padding: 0px; margin: 0px;'>
                                                         <div class='col-xs-12 col-md-6'>
                                                            <div class='form-group'>
                                                               <label class='control-label-tight'>
                                                               <span>Otros datos
                                                               </span>
                                                               </label>
                                                               <input class='search_field form-control' id='extra_info' maxlength='70' name='extra_info' spellcheck='false' type='text'>
                                                            </div>
                                                         </div>
                                                       
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class='col-xs-12 col-md-2' style='padding: 0px;'>
                                          <div class='row' style='padding: 0px;'>
                                             <div class='col-xs-6 col-sm-2 col-md-4 search_btns'>
                                                <div class='form-group'>
                                                   <input type="submit" name="commit" value="Buscar" class="btn form-submit" id="search_submit"/>
                                                </div>
                                             </div>
                                             <div class='col-xs-6 col-sm-2 col-md-4'>
                                                <div class='form-group'>
                                                   <a class='btn search_btns' id='reset_search'>Limpiar filtros
                                                   </a>
                                                </div>
                                             </div>
                                          </div>
                                          <div class='row'></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                    
                  </span>

      <div id='search_results' style='height: 100%;padding: 0px; margin: 0px;'>
         <div id='map_switch'>
            <div class='row black' style='background-color: rgba(255,255,255,.85);'>
               <h4>
                  <div class='col-sm-7 col-md-4 left' id='result_count' style='padding: 10px;'></div>
                  <div class='col-sm-7 col-md-4 left hidden' id='search_loading' style='padding: 10px;'>
                     <i class='fa fa-spinner fa-spin'></i>
                     Buscando
                  </div>
               </h4>
               <div class='row'>
                  <div class='col-xs-12 center hidden' id='results_loading' style='background: #ffea00; color: black; padding: 5px;'>
                     <i class='fa fa-spinner fa-spin'></i>
                     Cargando resultados
                  </div>
               </div>
            </div>
         </div>



     <div class='div' id='results_list' style='max-height: 600px; overflow-y: auto;'>
        <span id='search_list' style='height: 100%;padding: 0px; margin: 0px;'>
           <div class='bike_search_list' style='margin-bottom: 80px;'>
              <input id='results_count' type='hidden' value='0'>
                  <?php if (isset($_SESSION['b0'])): ?>
                        <?php foreach ($_SESSION as $i => $value): ?>
                            <?php $n = substr($i,-1)  ?>
                                <div class="bike_result" data-id ="<?php echo $n ?>" style='position: relative;'>
                                    <div class="col-xs-12 bike_search_results  col-sm-6 col-md-4 col-lg-3" style="margin: 0px; padding: 0px; align: left;">
                                      <a href= "pagina_reporte.php" target="_blank">
                                        <div class="row bike bike-back" style="background-size: cover; background: url('images/stoned.jpg') no-repeat center;">
                                          <div class="bike-glass">
                                            <div class="col-xs-10 left">
                                              <div class="caption">
                                                <div class="label label-danger stolen">
                                                  <?php echo $_SESSION[$i]['ESTADO'];?>
                                                </div>
                                              </div>
                                              <p>
                                              <div class="title">
                                                <?php echo $_SESSION[$i]['MARCA']; ?>
                                                <?php echo $_SESSION[$i]['MODELO']; ?>
                                              </div>

                                                <div class="color">
                                                  Color:
                                                  <span>
                                                    <?php echo $_SESSION[$i]['COLOR']; ?>
                                                  </span>
                                                  <br>
                                                </div>

                                                <div class="serial">
                                                  Serial Number:
                                                  <span>
                                                    <?php echo $_SESSION[$i]['SERIAL']; ?>
                                                  </span>
                                                  <br>
                                                </div>


                                              <div class="bike-type">
                                                Bike Type: <?php echo $_SESSION[$i]['TIPO']; ?>
                                                <br>
                                              </div>

                                            </div>
                                            <div class = "col-xs-1">
                                              <img src="assets/logo2.png" width = "30px" style="margin-top: 6px; max-width: none;">
                                            </div>
                                          </div>
                                        </div>
                                      </a>
                                    </div>
                                </div>
                        <?php endforeach; ?>
                  <?php endif; ?>
           </div>
            <div id='close_matches'></div>

        </span>
     </div>

      </div>
               </div>
            </div>
         </div>
      </div>
    
  
      <div class='unobtrusive-flash-container'></div>
     
   </body>
</html>
