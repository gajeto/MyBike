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
                              <h3>Nombre de la bicicleta</h3>
                           </div>
                        </div>
                        <div class='row left'>
                           <div class='col-sm-12'>
                              <form class="form-horizontal" id="edit_form" action="/garage/bikes/pump-bell-wheel-basket" accept-charset="UTF-8" data-remote="true" method="post">
                                 <input name="utf8" type="hidden" value="&#x2713;"/>
                                 <input type="hidden" name="_method" value="put"/>
                                 <div aria-multiselectable='true' class='panel-group accordian bigger_text' id='accordian' role='tablist'>
                                    <div class='panel panel-default'>
                                       <a aria-controls='collapseDetails' aria-expanded='false' class='accordion-toggle light_hover' data-parent='#accordian1' data-toggle='collapse' data-turbolinks='false' href='#collapseDetails' role='button'>
                                          <div class='panel-heading' id='headingDetails' role='tab'>
                                             <h4 class='panel-title titlecase'>
                                                Detalles de la bicicleta
                                                <span class='warning' id=''>
                                                <i class='fa fa-warning yellow' rel='tooltip' title='Falta información importante sobre tu bicicleta. Revisa los campos con el simbolo de advertencia'></i>
                                                </span>
                                             </h4>
                                          </div>
                                       </a>
                                       <div aria-labelledby='headingDetails' class='panel-collapse collapse in' id='collapseDetails' role='tabpanel'>
                                          <div class='panel-body'>
                                             <div class='col-sm-10 left'>
                                                <div class='left reg_form'>
                                                   <div class='row'>
                                                      <div class='col-sm-12'>
                                                         <div class='form-group'>
                                                            <label class='control-label'>Nombre de la bicicleta
                                                            </label>
                                                            <input autocomplete='off' class='form-control' maxlength='255' name='bike[name]' placeholder='' spellcheck='false' type='text' value='gdg'>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class='row'>
                                                      <div class='col-sm-12'>
                                                         <div class='form-group'>
                                                            <label class='control-label'>
                                                            Número Serial
                                                            <span class='warning'>
                                                            <i class='fa fa-warning yellow'></i>
                                                            </span>
                                                            </label>
                                                            <input class='form-control critical' id='serial_number' maxlength='255' name='bike[serial_number]' placeholder='Usualmente está grabado en el cuadro' type='text' value=''>
                                                            <div class='bg-danger smallish hidden' id='bad_serial_warning' style='padding: 5px;'>
                                                               Warning: That looks like a frame part number (which is not unique), not a serial number. Please check again. If you need help finding your serial number, check out
                                                               <a href='/find_your_serial_number' target='_blank'>our handy guide.
                                                               </a>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class='row'>
                                                      <div class='col-sm-5'>
                                                         <div class='form-group manufacturers'>
                                                            <label class='control-label'>
                                                            Marca
                                                            <span class='warning'>
                                                            <i class='fa fa-warning yellow' title='Missing Recommended Information'></i>
                                                            </span>
                                                            </label>
                                                            <input autocomplete='off' class='typeahead form-control critical' id='manufacturer_string' maxlength='255' name='bike[manufacturer_string]' placeholder='' spellcheck='false' type='text' value=''>
                                                            <input id="manufacturer_id" type="hidden" name="bike[manufacturer_id]"/></input>
                                                         </div>
                                                      </div>
                                                      <div class='col-sm-6 col-sm-offset-1'>
                                                         <div class='form-group bike_models'>
                                                            <label class='control-label'>
                                                            Modelo
                                                            <span class='warning'>
                                                            <i class='fa fa-warning yellow' title='Missing Recommended Information'></i>
                                                            </span>
                                                            </label>
                                                            <input autocomplete='off' class='typeahead form-control critical' maxlength='255' name='bike[model_string]' placeholder='' spellcheck='false' type='text' value=''>
                                                            <input id="bike_model_id" type="hidden" name="bike[bike_model_id]"/>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class='row'>
                                                      <div class='col-sm-5'>
                                                          <div class='form-group'>
                                                           <label class='control-label'>Tipo de bicicleta
                                                           </label>
                                                           <select class="form-control" name="bike[bike_type_id]" id="bike_bike_type_id">
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
                                                      <div class='col-sm-3 col-sm-offset-1'>
                                                         <div class='form-group optional'>
                                                            <label class='control-label'>
                                                            Antigüedad
                                                            <span class='warning'>
                                                            <i class='fa fa-warning yellow' title='Missing Recommended Information'></i>
                                                            </span>
                                                            </label>
                                                            <input class='form-control critical' maxlength='4' name='bike[model_year]' placeholder='Recommended' spellcheck='false' type='text'>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class='row'>
                                                      <div class='col-sm-5'>
                                                         <div class='form-group'>
                                                            <label class='control-label'>
                                                            Color del marco
                                                            <span>
                                                            <i class='fa fa-question-circle blue help_button' data-help-text="¿No ves el color de tu bicicleta? Escoge el que más se parezca. Así garantizamos mejores resultados en la búsqueda y recuperación." data-target='#help_modal' data-toggle='modal'></i>
                                                            </span>
                                                            <span class='warning'>
                                                            <i class='fa fa-warning white'></i>
                                                            </span>
                                                            </label>
                                                            <select class="form-control critical" name="bike[primary_color]" id="bike_primary_color">
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
                                                            <select class="form-control critical" name="bike[secondary_color]" id="bike_secondary_color">
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
                                                            <label class='control-label'>Acabado del cuadro
                                                            </label>
                                                            <select class="form-control critical" name="bike[frame_finish]" id="bike_frame_finish">
                                                               <option value=""></option>
                                                               <option value="Brushed">Pintado a mano</option>
                                                               <option value="Glossy">Brillante</option>
                                                               <option value="Matte">Matte</option>
                                                               <option value="Metallic">Metálico</option>
                                                               <option value="Other">Otro</option>
                                                            <select>
                                                         </div>
                                                      </div>
                                                      <div class='col-sm-5 col-sm-offset-1'>
                                                         <div class='form-group'>
                                                            <label class='control-label'>Material del cuadro
                                                            </label>
                                                            <select class="form-control" name="bike[frame_material]" id="bike_frame_material">
                                                               <option value=""></option>
                                                               <option value="Aluminum">Aluminio</option>
                                                               <option value="Carbon">Fibra de Carbono</option>
                                                               <option value="Plastic">Plástico</option>
                                                               <option value="Steel">Acero</option>
                                                               <option value="Titanium">Titanio</option>
                                                               <option value="Wood">Madera</option>
                                                               <option value="Other">Otro</option>
                                                            </select>
                                                         </div>
                                                      </div>
                                                   </div>
                                                  
                                                   <div class='row'>
                                                      <div class='col-sm-5'>
                                                         <div class='form-group'>
                                                            <label class='control-label'>Tamaño del rin
                                                            </label>
                                                            <input autocomplete='off' class='typeahead form-control critical' maxlength='255' name='bike[size]' placeholder='Optional' spellcheck='false' type='text'>
                                                         </div>
                                                      </div>
                                                      <div class='col-sm-6 col-sm-offset-1'>
                                                         <div class='form-group'>
                                                            <label class='control-label'>Número de cambios
                                                            </label>
                                                            <input autocomplete='off' class='typeahead form-control critical' maxlength='255' name='bike[wheel_size]' placeholder='Optional' spellcheck='false' type='text'>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class='row'></div>
                                                   <div class='row'>
                                                      <div class='col-sm-12'>
                                                         <div class='form-group'>
                                                            <label class='control-label'>¿Accesorios?
                                                            </label>
                                                            <textarea autocomplete='off' class='form-control' maxlength='254' name='bike[additional_equipment]' placeholder='Luces, velocímetros, alforjas, portabotellas...' rows='3' spellcheck='false'></textarea>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class='col-sm-2 text-right'>
                                                <input type="submit" name="commit" value="Guardar" class="btn form-submit" data-disable-with="Saving" data-data-turbolinks="false" data-toggle="collapse" data-target="#collapseDetails"/>
                                             </div>
                                             <script>
                                                check_serial();
                                                
                                                $('.critical').on("keyup", function() {
                                                    var warning_element = $(this).closest(".form-group").find(".warning");
                                                    setWarning(warning_element, $(this).val() != "", "yellow");
                                                });
                                                
                                                $('.critical').change(function() {
                                                    var warning_element = $(this).closest(".form-group").find(".warning");
                                                    setWarning(warning_element, $(this).val() != "", "yellow");
                                                });
                                                
                                                $('.help_button').on("click", function() {
                                                    console.log($(this).data("helpText"));
                                                    var help_text = $(this).data("helpText")
                                                    $("#helpcontent").text(help_text);
                                                });
                                                
                                                $('#serial_number').on("keyup", function() {
                                                    check_serial();
                                                });
                                                
                                                $('#manufacturer_string').on("keyup", function() {
                                                    console.log('checking');
                                                
                                                    if ($('#make_suggestion_name').val() == $('#manufacturer_string').val()) {
                                                        $('#make_suggestion').addClass("hidden");
                                                    }
                                                
                                                });
                                                
                                                function setWarning(warning_element, locked, color) {
                                                
                                                    if (locked) {
                                                        warning_element.html("<i class='fa fa-warning white'></i>");
                                                    } else {
                                                        warning_element.html("<i class='fa fa-warning " + color + "'></i>");
                                                    }
                                                }
                                                
                                                var manufacturers = new Bloodhound({
                                                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                                                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                                                    remote: {
                                                        url: '/garage/manufacturers/names?q=%QUERY',
                                                        wildcard: '%QUERY'
                                                    }
                                                });
                                                
                                                setTypeahead(".manufacturers", "#manufacturer_id", "name", manufacturers, "name", true);
                                                
                                                var bike_models = new Bloodhound({
                                                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                                                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                                                    remote: {
                                                        url: '/garage/' + 'bike_models' + '/names',
                                                        replace: function(url, qs) {
                                                            var q = url;
                                                            if ($('#manufacturer_id').val()) {
                                                                q += "?q=" + qs + "&m=" + encodeURIComponent($('#manufacturer_id').val());
                                                            }
                                                            return q;
                                                        }
                                                    }
                                                });
                                                
                                                setTypeahead(".bike_models", "#bike_model_id", "name", bike_models, "name", true);
                                                
                                                var bike_builds = new Bloodhound({
                                                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                                                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                                                    remote: {
                                                        url: '/garage/' + 'bike_builds' + '/names',
                                                        replace: function(url, qs) {
                                                            var q = url;
                                                            if ($('#bike_model_id').val()) {
                                                                q += "?q=" + qs + "&m=" + encodeURIComponent($('#bike_model_id').val());
                                                            }
                                                            return q;
                                                        }
                                                    }
                                                });
                                                
                                                setTypeahead(".bike_builds", "#bike_build_id", "name", bike_builds, "name", true);
                                                
                                                function check_serial() {
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
                                                }
                                             </script>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div aria-multiselectable='true' class='panel-group accordian bigger_text' id='accordian' role='tablist'>
                                    <div class='panel panel-default'>
                                       <a aria-controls='collapsePurchase' aria-expanded='false' class='accordion-toggle collapsed light_hover' data-parent='#accordion' data-toggle='collapse' data-turbolinks='false' href='#collapsePurchase' role='button'>
                                          <div class='panel-heading' id='headingPurchase' role='tab'>
                                             <h4 class='panel-title titlecase'>Información de propiedad</h4>
                                          </div>
                                       </a>
                                       <div aria-labelledby='headingPurchase' class='panel-collapse collapse' id='collapsePurchase' role='tabpanel'>
                                          <div class='panel-body'>
                                             <div class='col-sm-10 left'>
                                                <div class='left reg_form'>
                                                   <div class='row'>
                                                      <div class='col-sm-5'>
                                                         <div class='form-group'>
                                                            <label class='control-label'>Comprada en:
                                                            </label>
                                                            <select class="form-control critical" id="purchased_from" name="bike[purchased_from]">
                                                               <option value=""></option>
                                                               <option value="bikeshop">Tienda especializada</option>
                                                               <option value="bikeshop">Otro establecimiento</option>
                                                               <option value="friend">Amigo o familiar</option>
                                                               <option value="online">Online</option>
                                                               <option value="other">Otro</option>
                                                            </select>
                                                         </div>
                                                      </div>
                                                      <div class='col-sm-6 col-sm-offset-1' id='bike_shop_name'>
                                                         <div class='form-group bike_shops'>
                                                            <label class='control-label'>Nombre del lugar
                                                            </label>
                                                            <input autocomplete='off' class='typeahead form-control critical' maxlength='255' name='bike[bike_shop_string]' placeholder='' spellcheck='false' type='text'>
                                                            <input id="bike_shop_id" type="hidden" name="bike[bike_shop_id]"/>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class='row'>
                                                      <div class='col-sm-5'>
                                                         <div class='form-group'>
                                                            <label class='control-label'>Fecha de compra
                                                            </label>
                                                            <input class='purchase_date form-control' data-provide='datepicker' type='text'>
                                                            <input id='purchased_at' name='bike[purchased_at]' type='hidden'>
                                                            <input type="hidden" name="purchased_at_seconds" id="purchased_at_seconds"/>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class='row'>
                                                      <div class='col-sm-5'>
                                                         <div class='form-group'>
                                                            <label class='control-label'>Valor comercial
                                                            </label>
                                                            <input class='form-control' id='bike_value' limit='2000000000' maxlength='7' name='bike[bike_value]' oninput="this.value=this.value.replace(/[^0-9]/g,'');" type='text' value='0'>
                                                         </div>
                                                      </div>
                                                      <div class='col-sm-6 col-sm-offset-1'>
                                                         <div class='form-group'>
                                                            <label class='control-label'>Moneda
                                                            </label>
                                                            <select class="form-control critical" name="bike[bike_value_currency]" id="bike_bike_value_currency">
                                                               <option value=""></option>
                                                                <option selected="selected" value="COP">Pesos Colombianos (COP)</option>
                                                               <option value="USD">Dólares (USD)</option>
                                                            </select>
                                                         </div>
                                                      </div>
                                                   </div>
                                               
                                                </div>
                                             </div>
                                             <div class='col-sm-2 text-right'>
                                                <input type="submit" name="commit" value="Guardar" class="btn form-submit" data-disable-with="Saving..." data-data-turbolinks="false" data-toggle="collapse" data-target="#collapsePurchase"/>
                                             </div>
                                             <script>
                                                $('.form-submit').on('click', function() {
                                                    var val = $('#bike_value').val();
                                                    $('#bike_value').val(val.replace(/[^0-9.]/g, ""));
                                                
                                                    ga('send', 'event', 'button', 'click', 'bike_update_submitted');
                                                });
                                                
                                                var bike_shops = new Bloodhound({
                                                    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                                                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                                                    remote: {
                                                        url: '/garage/bike_shops/names?q=%QUERY',
                                                        wildcard: '%QUERY'
                                                    }
                                                });
                                                
                                                setTypeahead(".bike_shops", "#bike_shop_id", "name", bike_shops, "name", true);
                                                
                                                $('.help_button').on("click", function() {
                                                    console.log($(this).data("helpText"));
                                                    var help_text = $(this).data("helpText")
                                                    $("#helpcontent").text(help_text);
                                                });
                                                
                                                $('.purchase_date').datepicker({
                                                    language: 'en-US',
                                                    format: "mm/dd/yyyy"
                                                });
                                                
                                                $('.purchase_date').on("change ", function() {
                                                    formatted_date = $('.purchase_date').datepicker('getDate')
                                                    $('#purchased_at').val(formatted_date);
                                                });
                                                
                                                $('#purchased_from').on("change", function() {
                                                    toggleBikeShop($('#purchased_from').val());
                                                });
                                                
                                                toggleBikeShop("")
                                                
                                                function toggleBikeShop(purchased_from_val) {
                                                    console.log("toggle bike shop")
                                                    if (purchased_from_val == "bikeshop") {
                                                        $('#bike_shop_name').show();
                                                    } else {
                                                        $('#bike_shop_name').hide();
                                                    }
                                                }
                                             </script>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                
                              </form>
                              <div aria-multiselectable='true' class='panel-group accordian bigger_text' id='accordian' role='tablist'>
                                 <div class='panel panel-default'>
                                    <a aria-controls='collapsePhotos' aria-expanded='false' class='accordion-toggle collapsed light_hover' data-parent='#accordion' data-toggle='collapse' data-turbolinks='false' href='#collapsePhotos' role='button'>
                                       <div class='panel-heading' id='headingPhotos' role='tab'>
                                          <h4 class='panel-title titlecase'>
                                             Photos
                                             <span class='warning' id=''>
                                             &nbsp;<i class='fa fa-warning yellow' rel='tooltip' title='Your bike is missing recommended photos'></i>
                                             </span>
                                          </h4>
                                       </div>
                                    </a>
                                    <div aria-labelledby='headingPhotos' class='panel-collapse collapse' id='collapsePhotos' role='tabpanel'>
                                       <div class='panel-body'>
                                          <div class='row'>
                                             <div class='col-xs-12'>
                                                <div class='container'>
                                                   <input id='photo_upload_count' type='hidden' value='0'>
                                                   <div class='row fileupload-buttonbar'>
                                                      <div class='col-xs-2 col-sm-2'>
                                                         <span class='btn fileinput-button'>
                                                         <i class='fa fa-upload'></i>
                                                         Add Photos
                                                         <input id='fileupload' multiple='multiple' name='photo' type='file'>
                                                         </span>
                                                      </div>
                                                      <div class='col-xs-8 col-sm-2'>
                                                         <div class='uploading black' style='height: 0px; overflow: hidden;'>
                                                            <span class='fa-stack fa-lg' style='top: -5px; margin-right: 10px;'>
                                                            <i class='fa fa-cloud fa-stack-2x yellow'></i>
                                                            <i class='fa fa-spinner fa-stack-1x fa-spin'></i>
                                                            </span>
                                                            <span class='bigonly h4 grey-text upper'>Uploading
                                                            </span>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                                <script>
                                                   $(function() {
                                                       'use strict';
                                                       console.log("initialize fileupload");
                                                       $('#fileupload').fileupload({
                                                           url: "https://project529.com/garage/photos",
                                                           sequentialUploads: true,
                                                           formData: {
                                                               bike_id: '634200'
                                                           },
                                                           dataType: 'json',
                                                           start: function(e, data) {
                                                           },
                                                           done: function(e, data) {
                                                               console.log("done!")
                                                               $.ajax({
                                                                   url: "/garage/slideshow?bike_id=pump-bell-wheel-basket",
                                                                   type: "GET",
                                                                   dataType: "HTML",
                                                                   success: function(data, status, xhr) {
                                                                       $('#photo_grid').fadeOut("slow");
                                                                       $('#photo_grid').html(data);
                                                                       $('#photo_grid').fadeIn("slow");
                                                                       $("#photo_status").load("/bikes/pump-bell-wheel-basket/recommended_photos");
                                                                       $("#photo_upload_count").val(parseInt($("#photo_upload_count").val()) - 1);
                                                                       if ($("#photo_upload_count").val() < 1) {
                                                                           $('.uploading').fadeOut("slow");
                                                                           $('.uploading').css('height', '0%');
                                                                       }
                                                                   },
                                                                   error: function(data, status, xhr) {
                                                                       console.log('error');
                                                                   }
                                                               });
                                                           },
                                                           submit: function(e, data) {
                                                               console.log("photo uploading")
                                                               $("#photo_upload_count").val(parseInt($("#photo_upload_count").val()) + 1);
                                                           },
                                                           progressall: function(e, data) {
                                                               //increment the photo upload count
                                                               $('.uploading').css('height', '100%').fadeIn("slow");
                                                           }
                                                       }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
                                                   });
                                                </script>
                                             </div>
                                          </div>
                                          <hr>
                                          <div class='row'>
                                             <div class='col-xs-12'></div>
                                             <div class='photo_warnings' id='photo_status'>
                                                <br>
                                                Recommended Photos:
                                                <i class='fa fa-warning yellow'></i>
                                                Serial Number
                                                <i class='fa fa-warning yellow'></i>
                                                You and Your Bike
                                                <i class='fa fa-warning yellow'></i>
                                                Bike Side
                                                <i class='fa fa-warning yellow'></i>
                                                What to Look For
                                                <p></p>
                                                Click the star icon to set one photo as your hero photo. This will be the primary photo for your bike.
                                             </div>
                                             <div class='photo_grid' id='photo_grid'>
                                                <div id='photo_list'>
                                                   <form class="form-horizontal" id="edit_photo_887073" enctype="multipart/form-data" action="/garage/bikes/pump-bell-wheel-basket/photos/887073" accept-charset="UTF-8" data-remote="true" method="post">
                                                      <input name="utf8" type="hidden" value="&#x2713;"/>
                                                      <input type="hidden" name="_method" value="patch"/>
                                                      <input type="hidden" name="authenticity_token" id="authenticity_token" value="4cZ13Iqkr5fip06qr8ryTSVXzMaInNwNM1bGKD0il0ZL4xDn1P+mDdJeEh3XIEu6UpEOuwHkGCdd22ZWPdrcww=="/>
                                                      <input type="hidden" name="bike_id" id="bike_id" value="634200"/>
                                                      <div class='col-sm-6 col-md-4 photo_well'>
                                                         <div class='thumbnail'>
                                                            <a href='https://529garage-production.s3.amazonaws.com/photos/attachments/000/887/073/original/artwork-vasily-kandinsky-composition-8-37.262.jpg?1607728187' target='_blank'>
                                                            <img class='img-thumbnail' src='https://529garage-production.s3.amazonaws.com/photos/attachments/000/887/073/square/artwork-vasily-kandinsky-composition-8-37.262.jpg?1607728187' style='padding-bottom: 10px;' width='100%'>
                                                            </a>
                                                            <div class='caption'>
                                                               <label class='control-label' id='description_label'>Description:
                                                               </label>
                                                               <input class='form-control inline_field ays-ignore' data-controller='photos' data-field_id='#description' data-id='887073' data-label_id='#description_label' id='description' maxlength='255' name='photo[description]' placeholder='' type='text'>
                                                               <p></p>
                                                               <label class='control-label' id='photo_photo_type_id_label'>Photo Type:
                                                               </label>
                                                               <select class="form-control inline_field ays-ignore photo_type" id="photo_photo_type_id" data-id="887073" data-field_id="#photo_photo_type_id" data-label_id="#photo_photo_type_id_label" data-controller="photos" name="photo[photo_type_id]">
                                                                  <option value="2">Front</option>
                                                                  <option value="3">Side</option>
                                                                  <option value="4">You and your bike</option>
                                                                  <option value="5">Serial number</option>
                                                                  <option value="6">Shield</option>
                                                                  <option value="7">Receipt</option>
                                                                  <option value="8">What to look for</option>
                                                                  <option value="9">Back</option>
                                                                  <option selected="selected" value="10">Other</option>
                                                                  <option value="11">Accessory</option>
                                                                  <option value="13">Private</option>
                                                               </select>
                                                               <br>
                                                               <i class='fa fa-eye-slash yellow hidden' style='position: absolute; top: 15px; right: 30px;'></i>
                                                               <a class='btn cover_photo' id='887073' style='position: absolute; top: 15px; right: 30px;' title='Make this photo your hero photo.'>
                                                               <i class='fa fa-star-o'></i>
                                                               </a>
                                                               <a class='btn delete_photo' id='887073' title='Delete Photo'>
                                                                  <i class='fa fa-times-circle smallonly'></i>
                                                                  <div class='bigonly'>Delete</div>
                                                               </a>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </form>
                                                   <form class="form-horizontal" id="hero_photo_form" enctype="multipart/form-data" action="/garage/bikes/pump-bell-wheel-basket" accept-charset="UTF-8" data-remote="true" method="post">
                                                      <input name="utf8" type="hidden" value="&#x2713;"/>
                                                      <input type="hidden" name="_method" value="patch"/>
                                                      <input id='hero_image_id' name='bike[hero_image_id]' type='hidden'>
                                                   </form>
                                                </div>
                                                <script>
                                                   // $(function(){
                                                   //  $('#carousel4c5b2a11bd2589240423').carousel();
                                                   // });
                                                   
                                                   $('.update_photos').on("click", function() {
                                                       console.log("clicked in " + "#photo_form_" + $('.update_photos').id);
                                                       $("#photo_form_" + this.id).bind('ajax:complete', function() {
                                                           $("#photo_status").load("recommended_photos");
                                                       });
                                                   
                                                   })
                                                   
                                                   $('.cover_photo').on("click", function() {
                                                       var old_id = $('#hero_image_id').val();
                                                       var new_id = this.id;
                                                       var new_cover = '#' + this.id + ".cover_photo";
                                                       var old_cover = '#' + old_id + ".cover_photo";
                                                   
                                                       $(new_cover).find("i").removeClass("fa-star-o");
                                                       $(new_cover).find("i").addClass("fa-star");
                                                       $(new_cover).attr('title', _("This photo is your hero photo."));
                                                   
                                                       if (old_id) {
                                                           $(old_cover).find("i").removeClass("fa-star");
                                                           $(old_cover).find("i").addClass("fa-star-o");
                                                           $(old_cover).attr('disabled', false);
                                                           $(old_cover).attr('title', _("Make this photo your hero photo."));
                                                       }
                                                   
                                                       $(new_cover).attr('disabled', true);
                                                   
                                                       //set hero images across forms
                                                       $('#hero_image_id').val(new_id);
                                                       $('#hero_photo_form').submit();
                                                   });
                                                   
                                                   $(".photo_type").on("change", function(e) {
                                                       //show if the photo will be private
                                                       console.log("photo type change")
                                                   
                                                       if ($(this).val() == 7 || $(this).val() == 13) {
                                                           $(this).next("i").removeClass("hidden");
                                                           $(this).next().parent().find(".cover_photo").addClass("hidden");
                                                       } else {
                                                           $(this).next("i").addClass("hidden");
                                                           $(this).next().parent().find(".cover_photo").removeClass("hidden");
                                                       }
                                                   });
                                                   
                                                   $(".inline_field").on("keyup change", function(e) {
                                                       console.log("inline_field change")
                                                       var id = $(this).data('id');
                                                       var field_id = $(this).data('field_id');
                                                   
                                                       var field_label = $(this).data('label_id');
                                                       var field_show = $(field_label);
                                                       var field_name = $(this).attr("name");
                                                       var inline_field = $(this);
                                                       var values = {};
                                                       values[field_name] = $(this).val();
                                                       values["bike_id"] = "pump-bell-wheel-basket";
                                                       //field_show.text(inline_field.val());
                                                   
                                                       $.ajax({
                                                           url: "/garage/" + $(this).data('controller') + "/" + id,
                                                           data: values,
                                                           type: "PUT",
                                                           dataType: "HTML",
                                                           success: function(data, status, xhr) {
                                                               console.log("saved");
                                                               $("#photo_status").load("/bikes/pump-bell-wheel-basket/recommended_photos");
                                                           }
                                                       });
                                                   });
                                                </script>
                                             </div>
                                          </div>
                                          <script>
                                             $(document).ready(function() {
                                             
                                                 $(document).on("click", '.delete_photo', function() {
                                                     var photo_id = this.id
                                             
                                                     var photo_well = $(this).closest('.photo_well');
                                             
                                                     bootbox.confirm("Are you sure you want to delete this photo?", function(do_it) {
                                                         if (do_it) {
                                                             photo_well.fadeOut("slow");
                                                             ;$.ajax({
                                                                 url: "/garage/photos/" + photo_id,
                                                                 type: "POST",
                                                                 dataType: "HTML",
                                                                 data: {
                                                                     "_method": "delete",
                                                                     "id": photo_id,
                                                                     "bike_id": "pump-bell-wheel-basket"
                                                                 },
                                                                 success: function(data, status, xhr) {
                                                                     console.log("deleted");
                                                                 },
                                                                 error: function(xhr, status, error) {
                                                                 }
                                                             });
                                             
                                                         }
                                                     });
                                                 });
                                             
                                             });
                                          </script>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                        
                         
                              <div aria-multiselectable='true' class='panel-group accordian bigger_text' id='accordian' role='tablist'>
                                 <div class='panel panel-default'>
                                    <a aria-controls='collapseStartAlert' aria-expanded='false' class='accordion-toggle collapsed light_hover' data-parent='#accordion' data-toggle='collapse' href='#collapseStartAlert' role='button'>
                                       <div class='panel-heading' id='headingStartAlert' role='tab'>
                                          <h4 class='panel-title red titlecase'>¿Bicicleta perdida o robada? Click aquí!</h4>
                                       </div>
                                    </a>
                                    <div aria-labelledby='headingStartAlert' class='panel-collapse collapse' id='collapseStartAlert' role='tabpanel'>
                                       <div class='panel-body'>
                                          <div class='col-sm-9'>Esto marcara tu bicicleta como robada e iniciara el reporte.¿Estás seguro que quieres continuar?</div>
                                          <div class='col-sm-3 text-right'>
                                             <a class='btn start' data-turbolinks='false' href='/garage/bikes/pump-bell-wheel-basket/panic'>Iniciar alerta
                                             </a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                         
                              <div aria-multiselectable='true' class='panel-group accordian bigger_text' id='accordian' role='tablist'>
                                 <div class='panel panel-default'>
                                    <a aria-controls='collapseTransfer' aria-expanded='false' class='accordion-toggle collapsed light_hover' data-parent='#accordion' data-toggle='collapse' href='#collapseTransfer' role='button'>
                                       <div class='panel-heading' id='headingTransfer' role='tab'>
                                          <h4 class='panel-title titlecase'>Transferir Bicicleta</h4>
                                       </div>
                                    </a>
                                    <div aria-labelledby='headingTransfer' class='panel-collapse collapse' id='collapseTransfer' role='tabpanel'>
                                       <div class='panel-body' id='transfer_panel'>
                                          <div class='row'>
                                             <div class='col-sm-10'>
                                                <h4>
                                                  ¿Vendiste la bicicleta?
                                                  ¿Quieres registrarla a nombre de un amigo ciclista?
                                                   <br>
                                                </h4>
                                             </div>
                                          </div>
                                          <div class='row'>
                                             <div class='col-sm-10'>
                                                <form class="form-horizontal" id="new_bike_transfer" enctype="multipart/form-data" action="/garage/bikes/pump-bell-wheel-basket/bike_transfers" accept-charset="UTF-8" data-remote="true" method="post">
                                                   <input name="utf8" type="hidden" value="&#x2713;"/>
                                                   Ingresa el email del nuevo propietario y un mensaje de transferencia.
                                                   <p></p>
                                                   Cuando hagas click en transferir, enviaremos un email al nuevo propietario con un link de reclamación. Hasta que esa persona no reclame la bicicleta, la bicicleta permanecerá en tu garaje.
                                                   <p></p>
                                                   Una vez sea reclamada, será automáticamente removida de tu garaje.
                                                   <p></p>
                                                   <hr>
                                                   <div class='row'>
                                                      <div class='form-group'>
                                                         <label class='col-sm-3 control-label'>Email del nuevo propietario
                                                         </label>
                                                         <div class='col-sm-9'>
                                                            <input autocomplete='off' class='form-control' id='transfer_to' maxlength='50' name='bike_transfer[transfer_to]' placeholder='Requerido' spellcheck='false' type='text' value=''>
                                                            <input type="hidden" name="bike_transfer[bike_id]" id="bike_transfer_bike_id" value="634200"/>
                                                            <input type="hidden" name="bike_transfer[transfer_from]" id="bike_transfer_transfer_from" value="gustavojerezt@gmail.com"/>
                                                            <div class='row hidden' id='email_error'>
                                                               <div class='form-group'>
                                                                  <div class='col-xs-12'>
                                                                     <div id='email_suggestion'></div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class='form-group'>
                                                         <div class='col-sm-9 col-sm-offset-3'>
                                                            <div class='checkbox'>
                                                               <input type="hidden" name="transfer_photos" id="transfer_photos" value="false"/>
                                                               <input class='form-checkbox' id='transfer_photos' name='bike_transfer[transfer_photos]' type='checkbox'>
                                                               <label class='control-label-tight' for='transfer_photos'>Transferir fotos
                                                               </label>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class='form-group'>
                                                         <div class='col-sm-9 col-sm-offset-3'>
                                                            <div class='checkbox'>
                                                               <input type="hidden" name="transfer_accessories" id="transfer_accessories" value="false"/>
                                                               <input class='form-checkbox' id='transfer_accessories' name='bike_transfer[transfer_accessories]' type='checkbox'>
                                                               <label class='control-label-tight' for='transfer_accessories'>Transferir accesorios
                                                               </label>
                                                            </div>
                                                         </div>
                                                      </div>
                                                      <div class='form-group'>
                                                         <label class='col-sm-3 control-label'>Mensaje al nuevo propietario
                                                         </label>
                                                         <div class='col-sm-9'>
                                                            <textarea class="form-control" rows="6" placeholder="Se te adelantó navidad" maxlength="250" name="bike_transfer[note]" id="bike_transfer_note"></textarea>
                                                         </div>
                                                      </div>
                                                   </div>
                                                   <div class='form-group'>
                                                      <div class='col-sm-6 col-sm-offset-3'>
                                                         <input type="submit" name="commit" value="Transferir" class="btn form-submit transfer_btn" id="submit_btn" data-disable-with="Saving" data-toggle="collapse" data-target="#collapseTransfer"/>
                                                         <a data-no-turbolink="true" class="btn" id="cancel_transfer" href="/garage/bikes/pump-bell-wheel-basket/edit">Cancelar</a>
                                                      </div>
                                                   </div>
                                                   </hr>
                                                </form>
                                             </div>
                                          </div>
                                          <script>
                                             $(document).ready(function() {
                                             
                                                 $('.transfer_btn').prop("disabled", true);
                                                 $('#transfer_to').on("keyup change", function() {
                                                     console.log("checking email");
                                                     console.log(isEmail($(this).val()));
                                                     if (isEmail($(this).val())) {
                                             
                                                         $('.transfer_btn').prop("disabled", false);
                                                         $('#transfer_to').css('color', 'green');
                                                     } else {
                                             
                                                         $('.transfer_btn').prop("disabled", true);
                                                         $('#transfer_to').css('color', 'black');
                                                     }
                                                 });
                                             
                                                 function isEmail(email) {
                                                     var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                                     return regex.test(email);
                                                 }
                                             
                                                 $('#transfer_to').on("keyup", function() {
                                                     $('#transfer_to').css('color', 'black');
                                                 });
                                             
                                                 $('#transfer_to').on('blur', function() {
                                                     $(this).mailcheck({
                                                         suggested: function(element, suggestion) {
                                                             $('#transfer_to').css('color', 'red');
                                                             $('#email_error').removeClass("hidden");
                                                             $('#email_suggestion').html("Did you mean " + suggestion.full + "?");
                                             
                                                         },
                                                         empty: function(element) {
                                                             $('#transfer_to').css('color', 'black');
                                                             $('#email_error').addClass("hidden");
                                                         }
                                                     });
                                                 });
                                             
                                             });
                                          </script>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div aria-multiselectable='true' class='panel-group accordian bigger_text' id='accordian' role='tablist'>
                                 <div class='panel panel-default'>
                                    <a aria-controls='collapseRemove' aria-expanded='false' class='accordion-toggle collapsed light_hover' data-parent='#accordion' data-toggle='collapse' href='#collapseRemove' role='button'>
                                       <div class='panel-heading' id='headingRemove' role='tab'>
                                          <h4 class='panel-title titlecase'>Eliminar bicicleta</h4>
                                       </div>
                                    </a>
                                    <div aria-labelledby='headingRemove' class='panel-collapse collapse' id='collapseRemove' role='tabpanel'>
                                       <div class='panel-body'>
                                          <div class='col-sm-10'>
                                             <div class='span'>¿Eliminar permanentemente el registro de esta bicicleta de tu garaje?</div>
                                          </div>
                                          <div class='col-sm-2'>
                                             <a class='btn' id='delete_btn'>Eliminar</a>
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
      <div class='modal fade' id='help_modal'>
         <div class='modal-dialog'>
            <div class='modal-content'>
               <div class='modal-body' style='padding: 25px;'>
                  <div id='helpcontent'></div>
               </div>
            </div>
         </div>
      </div>
      <div class='modal fade' id='slideshow_modal'>
         <div class='modal-dialog' style='background: #373a3d; color: white; width: 90%; height: 90%;'>
            <div class='modal-content' style='background: #373a3d; color: white; width: 100%; height: 100%;'>
               <div class='modal-body' style='height: 85%;'>
                  <div class='carousel slide' data-ride='carousel' id='bike-photo-carousel'>
                     <ol class='carousel-indicators'>
                        <li class='active' data-slide-to='0' data-target='#carousel-example-generic'></li>
                     </ol>
                     <div class='carousel-inner' role='listbox'>
                        <div class='item active'>
                           <img class='img-responsive-slideshow' src='https://529garage-production.s3.amazonaws.com/photos/attachments/000/887/073/large/artwork-vasily-kandinsky-composition-8-37.262.jpg?1607728187'>
                        </div>
                     </div>
                     <a class='left carousel-control' data-slide='prev' href='#bike-photo-carousel' role='button' style='display: inline-block;position: absolute;top: 50%;z-index: 5;'>
                     <i class='fa fa-chevron-left'></i>
                     </a>
                     <a class='right carousel-control' data-slide='next' href='#bike-photo-carousel' role='button' style='display: inline-block;position: absolute;top: 50%;z-index: 5;'>
                     <i class='fa fa-chevron-right'></i>
                     </a>
                  </div>
               </div>
               <div class='modal-footer' style='height: 15%;'>
                  <button class='btn btn-default' data-dismiss='modal'>Close</button>
               </div>
            </div>
         </div>
      </div>
      <script>
         $(document).ready(function() {
         
             $("[data-toggle=tooltip]").tooltip({
                 placement: 'right'
             });
         
             //if (false){
             //$('#found').modal('show');
             //}
         
             $('form').areYouSure();
         
             $('.notmybike').on("click", function() {
                 fav_params = $(this).next();
                 parent = $(this).parent().parent().parent();
                 $.ajax({
                     type: "POST",
                     dataType: 'text',
                     url: "found_reject?" + fav_params.val(),
                     success: function(data, status, xhr) {
                         parent.addClass("hidden");
                     }
                 });
         
             })
         
             $('#delete_btn').click(function() {
                 bootbox.confirm("Confirm Delete", function(do_it) {
                     if (do_it) {
                         $.ajax({
                             url: "/garage/bikes/pump-bell-wheel-basket",
                             type: "POST",
                             dataType: "HTML",
                             data: {
                                 "_method": "delete",
                                 "authenticity_token": "Odqs+ziHOuVvNcem8kQ4ABn5Dx7NUbTN4k8UW9U246WT/8nAZtwzf1/MmxGKroH3bj/NY0QpcOeMwrQl1c6oIA==",
                                 "id": "634200"
                             },
                             complete: function() {
                                 window.location.href = '/garage/bikes';
                             }
                         });
                     }
                 });
             });
         
             $('#bike_value').on("change", function() {
                 get_teaser();
             });
         
             $('#bike_bike_value_currency').on("select, change", function() {
                 get_teaser();
             });
         
             function get_teaser() {
                 $.ajax({
                     url: "/garage/insurance_agencies/teaser?bike_id=634200&value=" + $('#bike_value').val() + "&currency=" + $('#bike_bike_value_currency').val(),
                     type: "GET",
                     dataType: "HTML",
                     success: function(results) {
                         $('.teaser').html(results);
                     }
                 });
         
             }
             ;
         
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