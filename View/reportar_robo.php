<?php
session_start();

$nombre = $_GET['name'];
$bike_serial = $_GET['serial'];

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
                                    <a class='black' href='/garage/bikes/pump-bell-wheel-basket/edit'>
                                        <?php echo $nombre ?>
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <div class='red bold' id='alert_not_started' style='font-size: 1.1em;'>
                            Tu reporte de robo aún no ha sido generado. Completa la información siguiente para comenzar alerta en la comunidad MyBike.
                            <p></p>
                        </div>
                        
                            <input name="utf8" type="hidden" value="&#x2713;"/>
                            <input type="hidden" name="_method" value="patch"/>
                            <div class='row left'>
                                <div class='col-sm-12'>
                                    
                                    <div aria-multiselectable='true' class='panel-group bigger_text' id='accordian' role='tablist'>
                                        <form class="form-horizontal" id="main_form"  action="../Controller/Actions/registrar_perdida.php" accept-charset="UTF-8" method="POST">
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
                                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class='row'>
                                                                    <div class='form-group'>
                                                                        <label class='col-sm-12 control-label' style='text-align: left !important;'>¿Cuándo fue la última vez que viste tu bicicleta?
                                                                        </label>
                                                                        <input type="hidden" name="perdida_serial" value="<?php echo $bike_serial ?>"/>
                                                                    </div>
                                                                </div>
                                                                <div class='row'>
                                                                    <div class='form-group'>
                                                                        <div class='col-xs-6'>
                                                                            <input class='datepicker form-control' data-value='2020-12-15' type='text' value='2020-12-15' name='fecha'>
                                                                        </div>
                                                                        <div class='col-xs-3'>
                                                                            <input class='form-control time' id='timepicker' type='text' value='8:34 AM' name="hora">
                                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class='row'>
                                                                    <div class='form-group'>
                                                                        <div class='col-sm-12'>
                                                                            <div class='intro'>
                                                                                ¿Dónde estaba? Ingresa la dirección o mueve el pin hasta el lugar en el mapa
                                                                                <input class='form-control' id='location_address' name='lugar' type='text' value=''>
                                                                            </div>
                                                                             <p></p>
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
                                                                            <textarea class='form-control' maxlength='255' name='info_lugar' placeholder='Añade información sobre el lugar exacto donde estaba tu bicicleta. Por ejemplo, "en el parqueadero de bicicletas de la UniMagdalena"' rows='3'></textarea>
                                                                           
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr><p> </p>
                                                                 <div class='row'>
                                                                    <div class='form-group'>
                                                                        <label class='col-sm-6 control-label'>¿Qué deberíamos estar buscando?
                                                                        </label>
                                                                        <div class='col-sm-6'>
                                                                            <textarea class='form-control' maxlength='255' name='detalles' placeholder="¿Algún detalle en particular que resalte de tu bicicleta?¿Calcomanias, rayones, accesorios, etc?" rows='3'></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class='row'>
                                                                    <div class='form-group'>
                                                                        <label class='col-sm-6 control-label'>¿Ofreces recompensa?
                                                                        </label>
                                                                        <div class='col-sm-6'>
                                                                            <input class='form-control' maxlength='100' name='recompensa' placeholder='Puede ser dinero o gratitud infinita' spellcheck='false' type='text'>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class='row'>
                                                                    <div class='form-group'>
                                                                        <label class='col-sm-6 control-label'>¿Podemos compartir tu información personal en el poster?
                                                                        </label>
                                                                        <div class='col-sm-5'>
                                                                            <div class='checkbox'>
                                                                                <input class='form-checkbox help' name='nombre' type='checkbox'>
                                                                                <label class='help'>Nombre
                                                                                </label>
                                                                            </div>
                                                                            <p></p>
                                                                            <div class='checkbox'>
                                                                                <input class='form-checkbox help' name='email' type='checkbox'>
                                                                                <label class='help'>Email
                                                                                </label>
                                                                            </div>
                                                                            <p></p>
                                                                            <div class='checkbox'>
                                                                                <input class='form-checkbox help' name='telefono' type='checkbox'>
                                                                                <label class='help'>Teléfono
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class='col-sm-3 text-right'>
                                                        <a class='btn colwidth' href='garaje.php' style=' background: #CCC; border: 1px solid #ccc'>Falsa Alarma
                                                        </a>
                                                        <p></p>
                                                        <input type="submit" value="Reportar" class="btn form-submit colwidth" data-disable-with="Reportando">
                                                    </div>

                                                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9ttt-QoQlQMWJ8WSdkR8_o2Z-xWSPNkA&amp;libraries=geometry" type="text/javascript"></script>
                                                    <script>
                                                        var map;
                                                        var markers = [];
                                                        var clickhandler;

                                                        var styles = [{
                                                            "stylers": [{
                                                                "saturation": -100
                                                            }]
                                                        }];

                                                        var lastSeenDate = $('.datepicker').datepicker({
                                                            language: 'en-US',
                                                            format: "yyyy-mm-dd"
                                                        });

                                                        var lastSeenTime = $('#timepicker').timepicker({
                                                            minTime: '12:00am',
                                                            interval: 30,
                                                            step: 30,
                                                            change: set_last_seen_utc,
                                                            forceRoundTime: true,
                                                        });

                                                        const geocoder = new google.maps.Geocoder();

                                                        $('.datepicker').on("change", function() {
                                                            set_last_seen_utc();
                                                        });

                                                        $('#timepicker').on('blur', function() {
                                                            console.log("changeTime")
                                                        });

                                                        $('#timezone').text("America/Bogota")

                                                        init_map();

                                                        function init_map() {
                                                            console.log("initializing map");
                                                            var mapOptions = {
                                                                zoom: 9,
                                                                maxZoom: 17,
                                                                minZoom: 2,
                                                                center: new google.maps.LatLng(45.4,-122.5)
                                                            };
                                                            map = new google.maps.Map(document.getElementById('incidentmap'),mapOptions);

                                                            map.setOptions({
                                                                styles: styles
                                                            });
                                                            //marker = null;
                                                            marker = []
                                                            marker[0] = []
                                                            marker[0]["lat"] = $('#incident_lat').val();
                                                            marker[0]["lng"] = $('#incident_lng').val();

                                                            if (marker[0]["lat"] == "") {
                                                                setCurrentLocation();
                                                                clickhandler = google.maps.event.addListener(map, 'click', function(event) {
                                                                    addMarker(event.latLng, true);
                                                                });
                                                            } else {
                                                                var pos = new google.maps.LatLng(marker[0]["lat"],marker[0]["lng"]);
                                                                //dummy handler so we can disable it in addMarker
                                                                clickhandler = google.maps.event.addListener(map, 'click', function(event) {});
                                                                addMarker(pos, true);
                                                            }

                                                        }

                                                       

                                                        function set_last_seen_utc() {
                                                            //we have to set timezone manually because the incident timezone may be different than the browser timezone
                                                            var datepick = lastSeenDate.datepicker('getDate');
                                                            //var datepick = lastSeenDate('getDate');
                                                            var timepick = lastSeenTime.timepicker('getTime', new Date())

                                                            console.log(timepick.getHours());

                                                            //this_date = Date.today()
                                                            //this_time = Date.now()
                                                            //console.log(Date(datepick.getFullYear(), datepick.getMonth(), datepick.getDate(), hour, minutes,0, 0))

                                                            full_date = new Date(datepick.getFullYear(),datepick.getMonth(),datepick.getDate(),timepick.getHours(),timepick.getMinutes(),0,0).toUTCString();
                                                            console.log(full_date)

                                                            $('#last_seen').val(full_date);

                                                        }

                                                        function recentermap() {
                                                            google.maps.event.trigger(map, 'resize');
                                                            map.setCenter(markers[0].getPosition());
                                                        }

                                                        // Add a marker to the map and push to the array.
                                                        function addMarker(location, draggable) {

                                                            var marker = new google.maps.Marker({
                                                                position: location,
                                                                map: map,
                                                                draggable: draggable
                                                            });
                                                            marker.setIcon('https://maps.google.com/mapfiles/ms/icons/red-dot.png')

                                                            map.setCenter(marker.position);
                                                            setLatLngFields(marker);
                                                            clickhandler.remove();
                                                            google.maps.event.addListener(marker, 'dragend', function(event) {
                                                                setLatLngFields(marker);
                                                            });

                                                            markers.push(marker);
                                                        }

                                                        function setLatLngFields(marker) {
                                                            console.log('marker', marker);
                                                            var latfield = document.getElementById('incident_lat');
                                                            var lngfield = document.getElementById('incident_lng');
                                                            latfield.value = marker.position.lat();
                                                            lngfield.value = marker.position.lng();

                                                            setAddress({
                                                                lat: marker.position.lat(),
                                                                lng: marker.position.lng()
                                                            });

                                                        }

                                                        function setAddress(latlng) {
                                                            geocoder.geocode({
                                                                location: latlng
                                                            }, function(results, status) {
                                                                if (status === "OK") {
                                                                    if (results[0]) {
                                                                        $('#location_address').val(results[0].formatted_address);
                                                                    } else {
                                                                        console.log("No results found");
                                                                    }
                                                                } else {
                                                                    console.log("Geocoder failed due to: " + status);
                                                                }
                                                            });
                                                        }

                                                        $('#location_address').on("blur", function() {
                                                            console.log('location address blur');
                                                            geocodeAddress($('#location_address').val());
                                                        });

                                                        function geocodeAddress(address) {
                                                            geocoder.geocode({
                                                                address: address
                                                            }, function(results, status) {
                                                                console.log('geocode results:', results, status);
                                                                if (status === "OK") {
                                                                    if (results[0]) {
                                                                        var pos = results[0].geometry.location;
                                                                        console.log('pos', pos);
                                                                        // clear out previous markers
                                                                        markers.forEach(function(marker) {
                                                                            marker.setMap(null);
                                                                        });

                                                                        addMarker(pos, true);
                                                                        map.setCenter(pos);

                                                                    } else {
                                                                        console.log("No results found");
                                                                    }
                                                                } else {
                                                                    console.log("Geocoder failed due to: " + status);
                                                                }
                                                            });

                                                        }

                                                        function setCurrentLocation() {
                                                            console.log("setting current location")
                                                            // Try HTML5 geolocation
                                                            if (navigator.geolocation) {
                                                                navigator.geolocation.getCurrentPosition(function(position) {
                                                                    var pos = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);

                                                                    addMarker(pos, true);
                                                                    map.setCenter(pos);

                                                                }, function() {
                                                                    handleNoGeolocation(true);
                                                                });
                                                            } else {
                                                                // Browser doesn't support Geolocation
                                                                console.log("no geolocation");
                                                                handleNoGeolocation(false);
                                                            }
                                                        }

                                                        function handleNoGeolocation(errorFlag) {
                                                            if (errorFlag) {
                                                                var content = 'Error: The Geolocation service failed.';
                                                            } else {
                                                                var content = 'Error: Your browser doesn\'t support geolocation.';
                                                            }

                                                            var options = {
                                                                map: map,
                                                                position: new google.maps.LatLng(60,105),
                                                                content: content
                                                            };

                                                            var infowindow = new google.maps.InfoWindow(options);
                                                            map.setCenter(options.position);
                                                        }
                                                    </script>
                                                </div>
                                              </div>
                                        </div>
                                        </form>
                                    </div>
                                     
                                </div>
                            </div>
                           
                       
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
                                                                    <div id='local_social_groups'>
                                                                        <script>
                                                                            $(document).ready(function() {

                                                                                $(".post_to_group").on("click", function() {
                                                                                    console.log("posting ");

                                                                                    var data = {};
                                                                                    console.log($(this).data());
                                                                                    data["incident_id"] = $(this).data("incident_id");
                                                                                    data["id"] = $(this).data("group_id");

                                                                                    this_btn = $(this);
                                                                                    console.log(data);

                                                                                    if (!this_btn.attr("disabled")) {

                                                                                        $.ajax({
                                                                                            url: "https://project529.com/garage/social_network_groups/post_message",
                                                                                            type: "POST",
                                                                                            data: data,
                                                                                            dataType: "HTML",
                                                                                            success: function(data, status, xhr) {
                                                                                                console.log("success");
                                                                                                this_btn.attr("disabled", true);
                                                                                                this_btn.html("Requested");
                                                                                            }
                                                                                        });

                                                                                    }

                                                                                });
                                                                            });
                                                                        </script>
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
                                                        <script>
                                                            $(document).ready(function() {

                                                                $('#set_notify_next').on("click", function() {
                                                                    $('#scene_details').click();
                                                                });

                                                                window.fbAsyncInit = function() {
                                                                    FB.init({
                                                                        appId: '201461786712786',
                                                                        xfbml: true,
                                                                        version: 'v2.5'
                                                                    });
                                                                }
                                                                ;

                                                                (function(d, s, id) {
                                                                    var js, fjs = d.getElementsByTagName(s)[0];
                                                                    if (d.getElementById(id)) {
                                                                        return;
                                                                    }
                                                                    js = d.createElement(s);
                                                                    js.id = id;
                                                                    js.src = "//connect.facebook.net/en_US/sdk.js";
                                                                    fjs.parentNode.insertBefore(js, fjs);
                                                                }(document, 'script', 'facebook-jssdk'));

                                                                $('.s_facebook').on("click", function() {
                                                                    FB.ui({
                                                                        method: 'share',
                                                                        href: 'https://project529.com/garage/pump-bell-wheel-basket',
                                                                    }, function(response) {});
                                                                })

                                                                $('#start_bolo').on("click", function() {

                                                                    console.log($('#incident_lat').val());

                                                                    if ($('#incident_lat').val() == "") {
                                                                        UnobtrusiveFlash.showFlashMessage("You dont have a location set. Your missing bike alert wont show up on our hotsheet without a location.", {
                                                                            type: 'error',
                                                                            timeout: 0
                                                                        })
                                                                    }

                                                                    $.ajax({
                                                                        url: "/garage/toggle_incident?id=36331",
                                                                        type: "GET",
                                                                        dataType: "HTML",
                                                                        success: function(data, status, xhr) {
                                                                            console.log(status);
                                                                        }
                                                                    });
                                                                    if ($('#start_bolo').text() == "Hide from Hot Sheet") {
                                                                        $('#start_bolo').html("Post to Hot Sheet now");
                                                                    } else {
                                                                        $('#start_bolo').html("Hide from Hot Sheet");
                                                                    }

                                                                });

                                                                $('#start_notifications').on("click", function() {
                                                                    bootbox.confirm("Are you sure you want to start notifications? You can only alert the 529 community once per missing alert.", function(do_it) {
                                                                        if (do_it) {
                                                                            console.log($('#start_notifications').text());

                                                                            $.ajax({
                                                                                url: "/garage/start_notification?id=36331",
                                                                                type: "GET",
                                                                                dataType: "HTML",
                                                                                success: function(data, status, xhr) {
                                                                                    console.log(status);

                                                                                    $('#start_notifications').html("<i class='fa fa-check'></i> 529 Notified");
                                                                                    $('#start_notifications').addClass('disabled');
                                                                                    $('#start_notifications').fadeTo("slow", .5).removeAttr("href");

                                                                                }
                                                                            });
                                                                        }
                                                                    });
                                                                });

                                                                $('#bike_poster').on("click", function() {
                                                                    console.log("bike poster click")
                                                                    $.ajax({
                                                                        type: "GET",
                                                                        url: "/garage/bikes/pump-bell-wheel-basket/print_bolo",
                                                                        success: function(data, status, xhr) {
                                                                            UnobtrusiveFlash.showFlashMessage("You will receive an email when your poster is ready.", {
                                                                                type: 'notice'
                                                                            })
                                                                        }
                                                                    });

                                                                })

                                                            });
                                                        </script>
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