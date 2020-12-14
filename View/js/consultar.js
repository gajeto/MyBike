
$(document).ready(function() {

    var mfr = "";

    if (false) {
        $("#search_submit").addClass("disabled");
    }


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
        $('#radio').val("");
        $('#modelo').val("");
        $('#color').val("");
        $('#tipo').val("");
        $('#serial').val("");
        $('#marca').val("");
        $('#extra_info').val("");
        $('#ciudad').val("");

    });

    

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


     $('#bike_search').on("click", function() {
         $('#bike_search').val("Search");

     });
         
     if ($('#results_count').val() < 50) {
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

function drawTile(e, s) {
    var t = document.getElementById("bike-list").firstChild.textContent,
        o = {
            bike: [s]
        },
        i = Mark.up(t, o),
        n = $("[data-id=" + e + "]");
    n.html(i)
}

function addNullMarker(e) {
    var s = new google.maps.LatLng(0, 0),
        t = new google.maps.Marker({
            position: s,
            id: e
        });
    t.setVisible(!1),
        markers.push(t)
}

function addMarker(e, s) {
    var t = new google.maps.Marker({
        position: e,
        map: map,
        id: s
    });
    $("[data-id=" + t.id + "]");
    "Stolen" == bike_results[t.id].listing_type ? t.setIcon("https://maps.google.com/mapfiles/ms/icons/red.png") : "Spotting" == bike_results[t.id].listing_type ? t.setIcon("https://maps.google.com/mapfiles/ms/icons/blue.png") : t.setIcon("https://maps.google.com/mapfiles/ms/icons/lightblue.png"),
        google.maps.event.addListener(map, "bounds_changed", function () {}),
        google.maps.event.addListener(t, "mouseover", function () {
            t.setIcon("https://maps.google.com/mapfiles/ms/icons/yellow-dot.png"),
                t.setZIndex(google.maps.Marker.MAX_ZINDEX + 1)
        }),
        google.maps.event.addListener(t, "mouseout", function () {
            "Stolen" == bike_results[t.id].listing_type ? (t.setIcon("https://maps.google.com/mapfiles/ms/icons/red.png"),
                t.setZIndex(google.maps.Marker.MAX_ZINDEX - 1)) : "Spotting" == bike_results[t.id].listing_type ? (t.setIcon("https://maps.google.com/mapfiles/ms/icons/blue.png"),
                t.setZIndex(google.maps.Marker.MAX_ZINDEX - 1)) : (t.setIcon("https://maps.google.com/mapfiles/ms/icons/lightblue.png"),
                t.setZIndex(google.maps.Marker.MAX_ZINDEX - 1))
        }),
        google.maps.event.addListener(t, "click", function () {
            $("#hotlistdetail").removeClass("hidden").slideDown("slow"),
                showBike(map, t)
        }),
        t.setDraggable(!1),
        markers.push(t),
        cluster_markers.push(t)
}

function showBike(e, s) {
    $("#results_list").scrollTop(0);
    $("[data-id=" + s.id + "]").position().top;
    $("#hotlistdetail").text(s.id),
        bike_detail = bike_results[s.id];
    var t = $("#bike-detail").text(),
        o = getBikeDetails(s.id),
        i = {
            bike: [o]
        },
        n = Mark.up(t, i);
    $("#hotlistdetail").html(n)
}

function getBikeDetails(e) {
    return window.bike_tile_details[e]
}
console.log("loading search functions");