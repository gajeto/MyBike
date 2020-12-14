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
      <div class='home-tile tile-1 top-tile' style='background-image: url(https://project529.com/garage/assets/bridge_bike_3-f0e675f060c940c4187e7d7f517a14372a45c8b38012dd1b494a2c7b5b1e2f03.jpg);margin-top: -55px; min-height: 100%; '>
         <div class='home-content'>
            <div class='frost' style='margin: 0px; padding: 0px; margin-bottom: 50px; '>
               <div class='main div white'>
                  <span id='search_filter_form'>
                     <form id="search_form" data-update-target="search_results" enctype="multipart/form-data" action="search_results" accept-charset="UTF-8" data-remote="true" method="post">
                        <input name="utf8" type="hidden" value="&#x2713;"/>
                        <div class='div blue_background' style='border-bottom: 1px solid #ccc'>
                           <a class='white' data-turbolinks='false' href='reporte_rapido.php' style='cursor: pointer'>¿Encontraste una bicicleta y crees que es robada? Reportala aquí.
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
                                                <input type="hidden" name="search_client" id="search_client" value="1"/>
                                                <input type="hidden" name="include_stolen" id="include_stolen" value="true"/>
                                                <input type="hidden" name="include_sightings" id="include_sightings" value="true"/>
                                                <input type="hidden" name="search_external" id="search_external" value="true"/>
                                                <input type="hidden" name="sort" id="sort" value="reported_on"/>
                                                <input type="hidden" name="is_security" id="is_security" value="false"/>
                                                <input type="hidden" name="organization_id" id="organization_id"/>
                                                <div class='div'>
                                                   <div class='row' style='color: rgb(102,102,102);'>
                                                      <div class='col-xs-12 col-md-2'>
                                                         <div class='form-group'>
                                                            <label class='control-label-tight'>Número serial
                                                            </label>
                                                            <input class='search_field clear_any form-control upper' id='serial' maxlength='255' name='serial' type='text'>
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
                                                                  <input autocomplete='off' class='search_field clear_any form-control upper' id='radius' maxlength='10' name='radius' placeholder='25' spellcheck='false' type='text'>
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
                                                            <span>Código postal
                                                            </span>
                                                            </label>
                                                            <input autocomplete='off' class='search_field clear_any form-control upper' id='postal_code' maxlength='10' name='postal_code' placeholder='' spellcheck='false' type='text'>
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
                                                                  <select class="form-control search_field" style="color: rgb(102,102,102);" id="country_code" name="[country_code]">
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
                                                               <input autocomplete='off' class='search_field clear_any typeahead form-control' id='make' maxlength='255' name='make' placeholder='' spellcheck='false' type='text'>
                                                               <input id="manufacturer_id" type="hidden" name="search_form[manufacturer_id]"/>
                                                               <input id="bike_model_id" type="hidden" name="search_form[bike_model_id]"/>
                                                               <input id="bike_build_id" type="hidden" name="search_form[bike_build_id]"/></input>
                                                            </div>
                                                         </div>
                                                         <div class='col-xs-12 col-md-2'>
                                                            <div class='form-group bike_models'>
                                                               <label class='control-label-tight'>Modelo
                                                               </label>
                                                               <input autocomplete='off' class='search_field clear_any typeahead form-control' id='model' maxlength='255' name='model' placeholder='' spellcheck='false' type='text'>
                                                            </div>
                                                         </div>
                                                         <div class='col-xs-12 col-md-2'>
                                                            <div class='form-group'>
                                                               <label class='control-label-tight'>Color
                                                               </label>
                                                               <select class="form-control search_field" style="color: rgb(102,102,102);" id="color" name="[primary_color]">
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
                                                               <select class="form-control search_field" style="color: rgb(102,102,102);" id="bike_type" name="[bike_type]">
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
                                                               <input autocomplete='off' class='search_field clear_any form-control' id='other' maxlength='70' name='full_text' spellcheck='false' type='text'>
                                                            </div>
                                                         </div>
                                                         <div class='col-xs-12 col-sm-6 col-md-2'>
                                                            <div class='bigonly'>
                                                               <label class='control-label-tight'>&nbsp;</label>
                                                            </div>
                                            
                                                         </div>
                                                         
                                                         <input type="hidden" name="show_private" id="show_private" value="true"/>
                                                         <input type="hidden" name="include_deleted" id="include_deleted" value="false"/>
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
                     <script>
                        $(document).ready(function() {
                        
                            var mfr = "";
                        
                            if (false) {
                                $("#search_submit").addClass("disabled");
                            }
                        
                            $('#find_me').selectize({
                                highlight: false,
                                valueField: 'name',
                                labelField: 'name',
                                searchField: ['name'],
                                sortField: [{
                                    field: 'type',
                                    direction: 'asc'
                                }, {
                                    field: 'name',
                                    direction: 'asc'
                                }, {
                                    field: '$score'
                                }],
                                closeAfterSelect: true,
                                openOnFocus: false,
                                optgroupField: 'type',
                                optgroupLabelField: 'name',
                                optgroupValueField: 'id',
                                addPrecedence: 'false',
                                optgroups: [{
                                    id: 'make',
                                    name: 'Make'
                                }, {
                                    id: 'model',
                                    name: 'Model'
                                }, {
                                    id: 'color',
                                    name: 'Color'
                                }],
                                plugins: ['restore_on_backspace', 'optgroup_columns'],
                                options: [],
                                create: true,
                                render: {
                                    option: function(item, escape) {
                                        return '<div>' + '<span style="color: #ccc">' + ((item.type) ? item.type : "Other") + " is: </span>" + item.name + '</div>';
                                    }
                                },
                                load: function(query, callback) {
                                    if (!query.length)
                                        return callback();
                                    $.ajax({
                                        url: "/garage/search/names?q=" + encodeURIComponent(query) + "&mfr=" + encodeURIComponent(mfr),
                                        type: "GET",
                                        success: function(data, status, xhr) {
                                            callback($.parseJSON(data));
                                        }
                                    });
                                },
                        
                                onChange: function(value) {
                                    if (!value.length)
                                        return;
                                    query = "";
                                    this.close();
                                    $('#search_form').submit();
                                }
                        
                            });
                        
                            $('#search_submit').on("click", function(e) {
                        
                                if ("" != "") {
                                    $("#panel_close").click();
                                }
                                ajax_abort();
                            });
                        
                            $('.clear_any').on("keyup", function(event) {
                                if ($(this).val().toUpperCase() == 'ANY' || $(this).val().toUpperCase() == "['ANY']") {
                                    $(this).val("");
                                }
                            });
                        
                            $('.search_field').on("keyup change", function(event) {
                                $("#search_submit").removeClass("disabled");
                            });
                        
                            $('#find_me').on("change", function() {
                                $('#bike_search').prop('value', 'Search');
                                $('#save_search').addClass("disabled");
                                $('.selectpicker').selectpicker('val', '');
                            });
                        
                            $('#bike_search').on("click", function() {
                                //console.log("bike search clicked");
                                $('#save_search').removeClass("disabled");
                                $('.selectpicker').selectpicker('val', '');
                            });
                        
                            $('#search_submit').on("click", function() {
                                $('#search_loading').removeClass("hidden");
                                $('#result_count').addClass("hidden");
                            });
                        
                            $('#map_update').on("click", function() {
                                $('#search_loading').removeClass("hidden");
                                $('#result_count').addClass("hidden");
                            });
                        
                            $("input.typeahead").on("keydown", function() {
                                $(this).closest(".panel-collapse").css("overflow", "visible");
                            }).on("blur", function() {
                                var input = this;
                                setTimeout(function() {
                                    $(input).closest(".panel-collapse").css("overflow", "hidden");
                                }, 200);
                            });
                        
                            $("#find_me").on("keydown", function() {
                                $(this).closest(".panel-collapse").css("overflow", "visible");
                            }).on("blur", function() {
                                var input = this;
                                setTimeout(function() {
                                    $(input).closest(".panel-collapse").css("overflow", "hidden");
                                }, 200);
                            });
                        
                            var manufacturers = new Bloodhound({
                                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
                                queryTokenizer: Bloodhound.tokenizers.whitespace,
                                remote: {
                                    url: '/garage/manufacturers/names?q=%QUERY',
                                    wildcard: '%QUERY'
                                }
                            });
                        
                            setTypeahead(".manufacturers", "#manufacturer_id", "name", manufacturers, "name", false);
                        
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
                        
                            setTypeahead(".bike_models", "#bike_model_id", "name", bike_models, "name", false);
                        
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
                        
                            setTypeahead(".bike_builds", "#bike_build_id", "name", bike_builds, "name", false);
                        
                            $('.panel_close').on("click", function() {
                                $("#more_fields").slideToggle("slow");
                                if ($('#toggle_filters_text').text() == 'Menos Filtros') {
                                    $('#toggle_filters_text').text('Más Filtros');
                                    $('#toggle_filters_icon').removeClass('fa-angle-up');
                                    $('#toggle_filters_icon').addClass('fa-angle-down');
                                    setCookie("show_filters", false, 600);
                                } else {
                                    $('#toggle_filters_text').text('Menos Filtros');
                                    $('#toggle_filters_icon').removeClass('fa-angle-down');
                                    $('#toggle_filters_icon').addClass('fa-angle-up');
                                    setCookie("show_filters", true, 600);
                                }
                        
                                //console.log(getCookie("show_filters"))
                                $('#toggle_text').text(($('#toggle_text').text() == 'Menos Filtros') ? 'Más Filtros' : 'Menos Filtros');
                            });
                        
                            $('.hide_all_filters').on("click", function() {
                                $("#search_panel").slideToggle("slow");
                                if ($('#hide_all_filters_text').text().trim() == "Ocultar Filtros") {
                                    $('#hide_all_filters_text').text('Mostrar Filtros');
                                    $('#hide_all_filters_icon').removeClass('fa-angle-up');
                                    $('#hide_all_filters_icon').addClass('fa-angle-down');
                                } else {
                                    $('#hide_all_filters_text').text("Ocultar Filtros");
                                    $('#hide_all_filters_icon').removeClass('fa-angle-down');
                                    $('#hide_all_filters_icon').addClass('fa-angle-up');
                                }
                        
                            });
                        
                            $('#reset_search').on("click", function() {
                                //console.log("reset")
                                $('#make').val("");
                                $('#model').val("");
                                $('#color').val("");
                                $('#bike_type').val("");
                                $('#serial').val("");
                                $('#shield').val("");
                                $('#other').val("");
                        
                            });
                        
                            //console.log("get cookie")
                            //console.log(getCookie("show_filters"))
                        
                            if (getCookie("show_filters") == "true" || getCookie("show_filters") == null) {
                                $("#more_fields").slideDown("fast");
                                $('#toggle_filters_text').text('Menos Filtros');
                                $('#toggle_filters_icon').removeClass('fa-angle-down');
                                $('#toggle_filters_icon').addClass('fa-angle-up');
                            } else {
                                $("#more_fields").slideUp("fast");
                                $('#toggle_filters_text').text('Más Filtros');
                                $('#toggle_filters_icon').removeClass('fa-angle-up');
                                $('#toggle_filters_icon').addClass('fa-angle-down');
                            }
                        
                            function getLocation() {
                                if (navigator.geolocation) {
                                    //console.log("getting location")
                                    navigator.geolocation.getCurrentPosition(getCountry);
                                } else {
                                    $('#location').innerHTML = "Geolocation is not supported by this browser.";
                                }
                            }
                        
                            function getCountry(position) {
                                if (position.coords.latitude) {
                        
                                    $.ajax({
                                        url: "/garage/get_country?lat=" + position.coords.latitude + "&lng=" + position.coords.longitude,
                                        type: "GET",
                                        success: function(data, status, xhr) {
                                            $('#country_code').val(data.location);
                                        }
                                    });
                        
                                }
                        
                            }
                        
                            if ("US") {} else {
                                getLocation();
                            }
                        
                        });
                     </script>
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
                           </div>
                           <div id='close_matches'></div>
                           <script id="bike-list" type="text/template">
                              {{bike}}
                              
                                <div class="col-xs-12 bike_search_results  col-sm-6 col-md-4 col-lg-3" style="margin: 0px; padding: 0px; align: left;">
                                  <a href= "{{url}}" target="_blank">
                                    <div class="row bike bike-back" style="background: url('{{bolo_medium_image}}'); background-repeat: no-repeat; background-size: cover; background-position:center;">
                                      <div class="bike-glass">
                                        <div class="col-xs-10 left">
                                          <div class="caption">
                                            <div class="label label-danger {{listing_type}}">
                                              {{bike_status_name}}
                                            </div>
                                          </div>
                                          <p>
                                          <div class="title">
                                            {{manufacturer_string|blank>}}
                                            {{model_string|blank>}}
                                          </div>
                              
                                          {{if primary_color|notempty || secondary_color|notempty}}
                                            <div class="color">
                                              Color:
                                              <span>
                                                {{primary_color|blank>}} {{secondary_color|blank>}}
                                              </span>
                                              <br>
                                            </div>
                              
                                          {{/if}}
                              
                                          {{if listing_type|notequals>Found}}
                                            <div class="serial">
                                              Serial Number:
                                              <span>
                                                {{if serial_number|notempty}} {{serial_number}} {{else}} Not Available {{/if}}
                                              </span>
                                              <br>
                                            </div>
                              
                                            {{if shield|notempty}}
                                              <div class="serial">
                                                Shield: {{shield}}
                                                <br>
                                              </div>
                                            {{/if}}
                              
                                          {{/if}}
                              
                                          {{if ext_number|notempty}}
                                          <div class="serial">
                                            Other ID: {{ext_number}}
                                            <br>
                                          </div>
                                          {{/if}}
                              
                                          {{if bike_type|notempty}}
                                          {{if title|empty}}
                                          <div class="bike-type">
                                            Bike Type: {{bike_type}}
                                            <br>
                                          </div>
                                          {{/if}}
                                          {{/if}}
                              
                                          {{if size|notempty}}
                                          {{if title|empty}}
                                          <div class="size">
                                            Frame Size: {{size}}
                                            <br>
                                          </div>
                                          {{/if}}
                                          {{/if}}
                              
                                          {{if reported_on|notempty}}
                                          <div class="size">
                                            Reported: {{reported_on | date}}
                                            <br>
                                          </div>
                                          {{/if}}
                              
                                          {{if registered_on|notempty}}
                                          <div class="size">
                                            Registered: {{registered_on | date}}
                                            <br>
                                          </div>
                                          {{/if}}
                              
                              
                                          {{if location|notempty}}
                                          {{if distance|notempty}}
                                          {{if location|notlike>Unknown}}
                                          <div class="size">
                                            Location: {{location}}
                                            <br>
                                          </div>
                                          {{/if}}
                                          {{/if}}
                                          {{/if}}
                                        </div>
                                        <div class = "col-xs-1">
                                          <img src="{{source_icon}}" width = "30px" style="margin-top: 6px; max-width: none;">
                                        </div>
                                      </div>
                                    </div>
                                  </a>
                                </div>
                              
                              {{/bike}}
                              
                              
                              
                                                                
                           </script>
                           <script>
                              $(document).ready(function() {
                              
                                  if ($('#results_count').val() < 50) {
                                      //console.log("checking for close matches")
                                      //console.log($('#stolen_only').val())
                                      if ($('#serial').val() || $('#make').val() || $('#model').val()) {
                                          $.ajax({
                                              url: "/garage/bikes/close_matches",
                                              type: "POST",
                                              data: {
                                                  "org": $('#organization_id').val(),
                                                  "serial": $('#serial').val(),
                                                  "make": $('#make').val(),
                                                  "model": $('#model').val(),
                                                  "color": $('#color').val(),
                                                  "n_bound": $('#n_bound').val(),
                                                  "s_bound": $('#s_bound').val(),
                                                  "e_bound": $('#e_bound').val(),
                                                  "w_bound": $('#w_bound').val(),
                                                  "sort": $('#sort').val(),
                                                  "stolen_only": $('#stolen_only').val()
                                              },
                                              dataType: "text",
                                              success: function(data, status, xhr) {
                                                  //console.log(data);
                                                  //console.log(status);
                                                  //console.log(xhr);
                                                  //console.log("success")
                                                  $('#close_matches').html(data);
                                              },
                                              error: function(data, status, xhr) {
                                                  console.log("close_matches error")
                                                  console.log(xhr)
                                              }
                                          });
                                      }
                                  }
                              
                              });
                           </script>
                        </span>
                     </div>
                     <script>
                        $(document).ready(function() {
                            bike_tile_details = [];
                        
                            $("#no_location_warning").hide();
                            if ("0" == 0) {
                        
                                search_tips_shown = parseInt($.cookie("search_tips_shown"));
                                if ($.isNumeric(search_tips_shown)) {} else {
                                    search_tips_shown = 0;
                                }
                                //console.log(search_tips_shown)
                            }
                        
                            if ("" != 0) {
                                $('#no_location_warning').text("");
                                $("#no_location_warning").show();
                            }
                        
                            $('#map_update').on("click", function() {
                                $('#search_form').submit();
                            });
                        
                            $('#sort_select').on("change", function() {
                                //$('#search_loading').removeClass("hidden");
                                $('#sort').val($('#sort_select').val());
                                //console.log($('#sort_select').val());
                        
                                switch ($('#sort_select').val()) {
                                case "normalized_make":
                                    window.bike_tile_details.sort(sort_by('normalized_make', false, function(a) {
                                        return (a ? a.toUpperCase() : a)
                                    }));
                                    break;
                        
                                case "normalized_model":
                                    window.bike_tile_details.sort(sort_by('normalized_model', false, function(a) {
                                        return (a ? a.toUpperCase() : a)
                                    }));
                                    break;
                        
                                case "reported_on":
                                    window.bike_tile_details.sort(sort_by('reported_on', true, function(a) {
                                        return (a ? new Date(a).getTime() / 1000 : "")
                                    }));
                                    break;
                        
                                case "normalized_serial":
                                    window.bike_tile_details.sort(sort_by('serial_number', false, function(a) {
                                        return (a ? a.toUpperCase() : a)
                                    }));
                                    break;
                        
                                case "shield":
                                    window.bike_tile_details.sort(sort_by('shield', false, function(a) {
                                        return (a ? a : "ZZZZZZZ")
                                    }));
                                    break;
                        
                                case "distance":
                                    window.bike_tile_details.sort(sort_by('distance', false, parseInt));
                                    break;
                        
                                }
                                $('.bike_search_list').html("");
                        
                                $.each(window.bike_tile_details, function(index, bike) {
                                    //console.log(bike["tile_id"])
                                    $('.bike_search_list').append('<div class="bike_result" data-id=' + parseInt(bike["tile_id"]) + '></div>');
                                    drawTile(bike["tile_id"], bike);
                                });
                        
                                //$('#search_form').submit();
                            });
                        
                            var sort_by = function(field, reverse, primer) {
                        
                                var key = primer ?
                                function(x) {
                                    return primer(x[field])
                                }
                                : function(x) {
                                    return x[field]
                                }
                                ;
                        
                                reverse = !reverse ? 1 : -1;
                        
                                return function(a, b) {
                                    //console.log(b)
                                    //console.log(key(b))
                                    return a = key(a),
                                    b = key(b),
                                    reverse * ((a > b) - (b > a));
                                }
                            }
                        
                            $("#download_results").on("click", function(e) {
                        
                                var values = {};
                                //values["bike_id_results"] = []
                        
                                if (false) {
                                    values["bike_id_results"] = []
                                } else {
                                    //console.log("no value")
                                    values["bike_id_results"] = []
                                }
                        
                                if (false) {
                                    values["ext_bike_id_results"] = []
                                } else {
                                    //console.log("no value")
                                    values["ext_bike_id_results"] = []
                                }
                        
                                $.ajax({
                                    url: "/garage/bikes/download_search_results",
                                    data: values,
                                    type: "POST",
                                    dataType: "HTML",
                                    success: function(data, status, xhr) {//console.log(data)
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
      <script src="https://project529.com/garage/assets/search-50654b59b6463ceac7534f4c4d6e38201fdf2a891719df0b11c8d1c6ed9ccccb.js" data-turbolinks-track="true"></script>
      <script>
         $(document).ready(function() {
         
             $('#bike_search').on("click", function() {
                 $('#bike_search').val("Search");
         
             });
         
         });
      </script>
      <div class='unobtrusive-flash-container'></div>
    
      <script>
         $(document).ready(function() {
         
             //console.log($('.footer').get_timezone());
             $.cookie("time_zone", $('.footer').get_timezone());
         });
      </script>
   </body>
</html>
