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

      <div class='page-tile tile-1 top-tile' style='background-image: url(https://project529.com/garage/assets/bridge_bike_2-a751b7668dd679ea72f14671b0ed089ed111ac546ec0a26bd5ff1aacc9d8210d.jpg); '>
         <div class='home-content'>
            <div class='frost' style='margin: 0px; margin-bottom: 100px;'>
               <div class='row'>
                  <div class='col-md-8 col-md-offset-2 no-mobile-padding'>
                     <div class='user-setting-form'>
                        <div class='row'>
                           <div class='col-sm-12 center'>
                              <h3>
                                 Robada 
                                 <a class='black' href='/garage/bikes/pump-bell-wheel-basket/edit'>gdg
                                 </a>
                              </h3>
                           </div>
                        </div>
                        <div class='red bold' id='alert_not_started' style='font-size: 1.1em;'>
                           Tu reporte de robo aún no ha sido generado. Completa la información siguiente para comenzar alerta en la comunidad MyBike.
                           <p></p>
                        </div>
                        <form class="form-horizontal" id="main_form" enctype="multipart/form-data" action="/garage/incidents/36331" accept-charset="UTF-8" data-remote="true" method="post">
                           <input name="utf8" type="hidden" value="&#x2713;"/>
                           <input type="hidden" name="_method" value="patch"/>
                           <div class='row left'>
                              <div class='col-sm-12'>
                                 <div aria-multiselectable='true' class='panel-group bigger_text' id='accordian' role='tablist'>
                                    <div class='panel panel-default'>
                                       <a aria-controls='collapseLocation' aria-expanded='false' class='accordion-toggle collapsed light_hover' data-parent='#accordion' data-toggle='collapse' data-turbolinks='false' href='#collapseLocation' role='button'>
                                          <div class='panel-heading' id='headingLocation' role='tab'>
                                             <h4 class='panel-title'>Cuándo y dónde</h4>
                                          </div>
                                       </a>
                                       <div aria-labelledby='headingLocation' class='panel-collapse collapse in' id='collapseLocation' role='tabpanel'>
                                          <div class='panel-body'>
                                             <div class='col-sm-9 left'>
                                                <div class='left reg_form'>
                                                   <div class='detail location'>
                                                      <div class='row'>
                                                         <div class='form-group'>
                                                            <div class='col-sm-12'>
                                                               <div class='label label-info'>Esta información aparecerá en el poster de búsqueda</div>
                                                               <input type="hidden" name="incident[lat]" id="incident_lat"/>
                                                               <input type="hidden" name="incident[lng]" id="incident_lng"/>
                                                               <input name='incident[bike_id]' type='hidden' value='634200'>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class='row'>
                                                         <div class='form-group'>
                                                            <label class='col-sm-12 control-label' style='text-align: left !important;'>¿Cuándo fue la última vez que viste tu bicicleta?
                                                            </label>
                                                         </div>
                                                      </div>
                                                      <div class='row'>
                                                         <div class='form-group'>
                                                            <div class='col-xs-6'>
                                                               <input class='datepicker form-control' data-value='12/11/2020' type='text' value='12/11/2020'>
                                                            </div>
                                                            <div class='col-xs-3'>
                                                               <input class='form-control time' id='timepicker' type='text' value='5:09 PM'>
                                                               <input type="hidden" name="incident[last_seen]" id="last_seen" value="2020-12-11 17:09:25 -0500"/>
                                                               <input type="hidden" name="incident[timezone_offset]" id="timezone_offset" value="-05:00"/>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class='row'>
                                                         <div class='form-group'>
                                                            <div class='col-sm-12'>
                                                               <div class='intro'>
                                                                 ¿Dónde estaba? Ingresa la dirección o mueve el pin hasta el lugar en el mapa
                                                                  <input class='form-control' id='location_address' name='incident[location_address]' type='text' value=''>
                                                               </div>
                                                               <div class='row' id='mapholder'>
                                                                  <div class='col-sm-5' id='incidentmap' style='min-height: 250px;'>
                                                                     <p></p>
                                                                     <span></span>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class='row'>
                                                         <div class='form-group'>
                                                            <label class='col-sm-12 control-label' style='text-align: left !important;'>Describe el lugar donde la perdiste
                                                            </label>
                                                            <div class='col-sm-12'>
                                                               <textarea class='form-control' maxlength='255' name='incident[location_description]' placeholder='Añade información sobre el lugar exacto donde estaba tu bicicleta. Por ejemplo, "en el parqueadero de bicicletas de la UniMagdalena"' rows='3'></textarea>
                                                               <input type="hidden" name="incident[show_on_map]" id="incident_show_on_map" value="true"/>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class='col-sm-3 text-right'>
                                                <a class='btn colwidth' href='/garage/incidents/36331/false_alarm' style=' background: #CCC; border: 1px solid #ccc'>Falsa Alarma
                                                </a>
                                                <p></p>
                                                <input type="submit" name="commit" value="Alertar" class="btn form-submit colwidth" id="savebtn" data-disable-with="Saving" data-toggle="collapse" data-target="#collapseLocation"/>
                                             </div>
                                             
                                             
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class='row left'>
                              <div class='col-sm-12'>
                                 <div aria-multiselectable='true' class='panel-group bigger_text' id='accordian' role='tablist'>
                                    <div class='panel panel-default'>
                                       <a aria-controls='collapseLookFor' aria-expanded='false' class='accordion-toggle collapsed light_hover' data-parent='#accordion' data-toggle='collapse' data-turbolinks='false' href='#collapseLookFor' role='button'>
                                          <div class='panel-heading' id='headingLookFor' role='tab'>
                                             <h4 class='panel-title'>Detalles del poster</h4>
                                          </div>
                                       </a>
                                       <div aria-labelledby='headingLookFor' class='panel-collapse collapse' id='collapseLookFor' role='tabpanel'>
                                          <div class='panel-body'>
                                             <div class='col-sm-10 left'>
                                                <div class='left reg_form'>
                                                   <div class='detail lookfor'>
                                                      <div class='row'>
                                                         <div class='form-group'>
                                                            <div class='col-sm-12'>
                                                               <div class='label label-info'>Esta información aparecerá en el poster de búsqueda</div>
                                                               <input name='incident[bike_id]' type='hidden' value='634200'>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class='row'>
                                                         <div class='form-group'>
                                                            <label class='col-sm-6 control-label'>¿Qué deberíamos estar buscando?
                                                            </label>
                                                            <div class='col-sm-6'>
                                                               <textarea class='form-control' maxlength='255' name='incident[bolo_message]' placeholder="¿Algún detalle en particular que resalte de tu bicicleta?¿Calcomanias, rayones, accesorios, etc?" rows='3'></textarea>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class='row'>
                                                         <div class='form-group'>
                                                            <label class='col-sm-6 control-label'>¿Ofreces recompensa?
                                                            </label>
                                                            <div class='col-sm-6'>
                                                               <input autocomplete='off' class='form-control' maxlength='100' name='incident[reward]' placeholder='Puede ser dinero o gratitud infinita' spellcheck='false' type='text'>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class='row'>
                                                         <div class='form-group'>
                                                            <label class='col-sm-6 control-label'>¿Podemos compartir tu información personal en el poster?
                                                            </label>
                                                            <div class='col-sm-5'>
                                                               <div class='checkbox'>
                                                                  <input type="hidden" name="incident[show_name]" id="incident_show_name" value="false"/>
                                                                  <input class='form-checkbox help' name='incident[show_name]' type='checkbox'>
                                                                  <label class='help'>Nombre
                                                                  </label>
                                                               </div>
                                                               <p></p>
                                                               <div class='checkbox'>
                                                                  <input type="hidden" name="incident[show_email]" id="incident_show_email" value="false"/>
                                                                  <input class='form-checkbox help' name='incident[show_email]' type='checkbox'>
                                                                  <label class='help'>Email
                                                                  </label>
                                                               </div>
                                                               <p></p>
                                                               <div class='checkbox'>
                                                                  <input type="hidden" name="incident[show_phone]" id="incident_show_phone" value="false"/>
                                                                  <input class='form-checkbox help' name='incident[show_phone]' type='checkbox'>
                                                                  <label class='help'>Teléfono
                                                                  </label>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class='col-sm-2 text-right'>
                                                <input type="submit" name="commit" value="Guardar" class="btn form-submit" data-disable-with="Saving" data-data-turbolinks="false" data-toggle="collapse" data-target="#collapseLookFor"/>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                        <div class='row left'>
                           
                           <form class="form-horizontal" id="edit_incident_36331" enctype="multipart/form-data" action="/garage/incidents/36331" accept-charset="UTF-8" data-remote="true" method="post">
                              <input name="utf8" type="hidden" value="&#x2713;"/>
                              <input type="hidden" name="_method" value="patch"/>
                              <div class='row left'>
                                 <div class='col-sm-12'>
                                    <div aria-multiselectable='true' class='panel-group bigger_text' id='accordian' role='tablist'>
                                       <div class='panel panel-default'>
                                          <a aria-controls='collapseNotify' aria-expanded='false' class='accordion-toggle collapsed light_hover' data-parent='#accordion' data-toggle='collapse' href='#collapseNotify' role='button'>
                                             <div class='panel-heading' id='headingNotify' role='tab'>
                                                <h4 class='panel-title'>Que todos sepan</h4>
                                             </div>
                                          </a>
                                          <div aria-labelledby='headingNotify' class='panel-collapse collapse' id='collapseNotify' role='tabpanel'>
                                             <div class='panel-body'>
                                                <script>
                                                   $(document).ready(function() {
                                                       $('.share').ShareLink({
                                                           title: "Ayúdame a encontrar mi bicicleta.",
                                                           text: "Ayúdame a encontrar mi bicicleta.",
                                                           image: '',
                                                           url: 'https://project529.com/pump-bell-wheel-basket'
                                                       });
                                                   });
                                                </script>
                                                <div class='col-sm-12 left'>
                                                   <div class='left reg_form'>
                                                      <div class='detail notification'>
                                                         <div class='row'>
                                                            <div class='form-group'>
                                                               <label class='col-sm-12 left titlecase'>La website de tu bicicleta robada
                                                               </label>
                                                               <div class='col-sm-12'>
                                                                  <a data-no-turbolink href='/garage/pump-bell-wheel-basket' target='_blank'>
                                                                     <div class='label label-info' style='text-transform: lowercase !important;'>https://project529.com/garage/pump-bell-wheel-basket</div>
                                                                  </a>
                                                                  <p></p>
                                                                  Esta es la página que la comunidad MyBike verá cuando busquen tu bicicleta.
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <hr>
                                                         <div class='row'>
                                                            <div class='form-group'>
                                                               <label class='col-sm-12 left titlecase'>El poster de búsqueda
                                                               </label>
                                                               <div class='col-sm-12'>
                                                                  Imprímelo y pégalo donde quieras. Nunca sabes si hay un vigilante activo en la zona.
                                                                  <p></p>
                                                                  <a class='btn' id='bike_poster'>Imprimir Poster
                                                                  </a>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <hr>
                                                         <div class='row'>
                                                            <div class='form-group'>
                                                               <label class='col-sm-12 left titlecase'>Notifica a la comunidad MyBike
                                                               </label>
                                                               <div class='row'>
                                                                  <div class='col-sm-12'>Tu reporte será compartido en las redes sociales de MyBike. Si no quieres hacerlo, checkea la opción debajo.</div>
                                                               </div>
                                                               <div class='row'>
                                                                  <div class='col-sm-12'>
                                                                     <div class='checkbox'>
                                                                        <input type="hidden" name="incident[skip_posting_to_social]" id="incident_skip_posting_to_social" value="false"/>
                                                                        <input class='form-checkbox help' id='filed_report' name='incident[skip_posting_to_social]' type='checkbox'>
                                                                        <label>No compartir con la comunidad MyBike
                                                                        </label>
                                                                        
                                                                        </input>
                                                                         <p></p>
                                                                        <a class='btn' id='bike_poster'>Compartir ahora</a>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <p></p>
                                                               <br>
                                                            </div>
                                                         </div>
                                                         
                                                         <hr>
                                                         <div class='row'>
                                                            <div class='form-group'>
                                                               <label class='col-sm-12 left titlecase'>Compartelo en tus redes sociales
                                                               </label>
                                                               <div class='col-sm-12'>
                                                                  <div class='row'>
                                                                     <div class='col-sm-12'>
                                                                        Riega la voz en tus redes sociales para que tus amigos te ayuden a recuperar tu bicicleta
                                                                        <p></p>
                                                                     </div>
                                                                  </div>
                                                                  <div class='row'>
                                                                     <div class='col-lg-3'>
                                                                        <button class='like-button s_facebook subtle_btn'>
                                                                           <span class='facebook btn' style='background-color: #3B5998; width: 200px;'>
                                                                              <div class='white'>
                                                                                 <i class='fa fa-facebook' style='color: white !important;'></i>
                                                                                 Publicar en Facebook
                                                                              </div>
                                                                           </span>
                                                                        </button>
                                                                     </div>
                                                                     <div class='col-lg-3 col-lg-offset-1'>
                                                                        <button class='like-button share s_twitter subtle_btn'>
                                                                           <span class='twitter btn' style='background-color: #55ACEE; width: 200px;'>
                                                                              <div class='white'>
                                                                                 <i class='fa fa-twitter' style='color: white !important;'></i>
                                                                                 Publicar en Twitter
                                                                              </div>
                                                                           </span>
                                                                        </button>
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
                                 </div>
                              </div>
                              <div class='row left'>
                                 <div class='col-sm-12'>
                                    <div aria-multiselectable='true' class='panel-group bigger_text' id='accordian' role='tablist'>
                                       <div class='panel panel-default'>
                                          <a aria-controls='collapseScene' aria-expanded='false' class='accordion-toggle collapsed light_hover' data-parent='#accordion' data-toggle='collapse' href='#collapseScene' role='button'>
                                             <div class='panel-heading' id='headingScene' role='tab'>
                                                <h4 class='panel-title'>Escena del crimen</h4>
                                             </div>
                                          </a>
                                          <div aria-labelledby='headingScene' class='panel-collapse collapse' id='collapseScene' role='tabpanel'>
                                             <div class='panel-body'>
                                                <div class='col-sm-10 left'>
                                                   <div class='left reg_form'>
                                                      <div class='detail location'>
                                                         <div class='row'>
                                                            <div class='form-group'>
                                                               <div class='col-sm-12'>
                                                                  <div class='label label-info'>Esta información puede ser de ayuda para recuperar tu bicicleta</div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                         <div class='row'>
                                                            <div class='col-sm-10'>
                                                               <div class='row'>
                                                                  <div class='form-group'>
                                                                     <label class='col-sm-6 control-label'>¿Tenia candado puesto?
                                                                     </label>
                                                                     <div class='col-sm-4'>
                                                                        <select name="incident[was_locked]" id="incident_was_locked" class="form-control">
                                                                           <option value="true">Si</option>
                                                                           <option value="false">No</option>
                                                                        </select>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class='row'>
                                                                  <div class='form-group'>
                                                                     <label class='col-sm-6 control-label'>Tipo de candado
                                                                     </label>
                                                                     <div class='col-sm-6'>
                                                                        <select class="form-control" name="incident[lock_type]" id="incident_lock_type">
                                                                           <option value=""></option>
                                                                           <option value="Cable Lock">Guaya</option>
                                                                           <option value="Chain Lock">Cadena</option>
                                                                           <option value="Combination Lock">Combinacion</option>
                                                                           <option value="Foldable Lock">De llanta
                                                                           <option value="Foldable Lock">En U
                                                                           <option value="Other">Otro</option>
                                                                           
                                                                        </select>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class='row'>
                                                                  <div class='form-group'>
                                                                     <label class='col-sm-6 control-label'>¿Cómo se la robaron?¿Qué hicieron con el candado?
                                                                     </label>
                                                                     <div class='col-sm-6'>
                                                                        <input autocomplete='off' class='form-control' maxlength='255' name='incident[lock_defeated]' placeholder='' spellcheck='false' type='text'>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <p></p>
                                                               Agrega cualquier detalle de la escena que pueda ser de ayuda para la policia. También puedes agregar datos de testigos si los hubo.
                                                               <p></p>
                                                               <textarea class='form-control' maxlength='255' name='incident[notes]' placeholder='Se especifico.' rows='5'></textarea>
                                                               
                                                              
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class='col-sm-2 text-right'>
                                                   <input type="submit" name="commit" value="Guardar" class="btn form-submit" data-disable-with="Saving..." data-data-turbolinks="false"/>
                                                </div>
                                                <script>
                                                   $(document).ready(function() {
                                                   
                                                       $('#set_details_next').on("click", function() {
                                                           $('#report').click();
                                                   
                                                       });
                                                   
                                                       $('#close_scene_photo_modal').on("click", function() {
                                                           $.ajax({
                                                               url: "/garage/scene_slideshow?incident_id=36331",
                                                               type: "GET",
                                                               dataType: "HTML",
                                                               success: function(data, status, xhr) {
                                                                   $('#scene-grid').fadeOut("slow");
                                                                   $('#scene-grid').html(data);
                                                                   $('#scene-grid').fadeIn("slow");
                                                               }
                                                           });
                                                       });
                                                   
                                                   });
                                                </script>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </form>
                         
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>
         $(document).ready(function() {
             $('form').areYouSure();
         
             $('form').on("submit", function() {
                 $("#alert_not_started").hide();
             });
         
             $('#main_form').on("ajax:success", function() {
                 $.ajax({
                     type: "GET",
                     url: "https://project529.com/garage/incidents/36331/local_social_groups",
                     success: function(data, status, xhr) {
                         $('#local_social_groups').html(data);
                     }
                 });
             })
         
         });
      </script>
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