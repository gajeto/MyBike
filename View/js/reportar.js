
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
format: "mm/dd/yyyy"
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



$('#savebtn').on("click", function() {
$('#savebtn').prop('value', 'Save');
});

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
                                         




//DESDE AQUI COMIENZA

!function(e, t, i) {
    e.isHandheld = function(e) {
        return /(android|bb\d+|meego).+mobile|android|ipad|playbook|silk|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(e) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(e.substr(0, 4))
    }(navigator.userAgent || navigator.vendor || t.opera),
    e("html").toggleClass("handheld", e.isHandheld),
    e(t).load(function() {
        e.fn.scrollspy && (e("body").scrollspy({
            target: "#zw-header"
        }),
        e(t).on("smartresize orientationchange", function() {
            e("body").scrollspy("refresh")
        })),
        e.fn.gmap3 && !function() {
            var n = i.createElement("script");
            n.src = "http://maps.google.com/maps/api/js?v=3&sensor=false&language=en&callback=load_gmap",
            n.type = "text/javascript",
            n.async = "true";
            var s = i.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(n, s),
            t.load_gmap = function() {
                e(".google-maps").each(function() {
                    var t = {
                        map: {
                            options: {
                                zoom: e(this).data("zoom") || 1,
                                center: [e(this).data("center-lat"), e(this).data("center-lng")],
                                scrollwheel: !1,
                                mapTypeControl: !1,
                                streetViewControl: !1,
                                styles: [{
                                    stylers: [{
                                        saturation: -100
                                    }]
                                }]
                            }
                        },
                        marker: {
                            latLng: [e(this).data("marker-lat"), e(this).data("marker-lng")]
                        }
                    };
                    e(this).gmap3(t)
                })
            }
        }(),
        e.fn.jflickrfeed && e(".flickr-stream").each(function() {
            var t = e(this).data("flickr-id")
              , n = e(this).data("limit") || 9;
            e(i.createElement("ul")).prependTo(this).jflickrfeed({
                qstrings: {
                    id: t
                },
                limit: n,
                itemTemplate: '<li><a href="{{link}}" title="{{title}}" target="_blank"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
            })
        }),
        e.fn.tweet && e(".tweets").each(function() {
            var t = e(this).data("twitter-username")
              , i = e(this).data("count") || 1;
            e(this).tweet({
                modpath: "php/twitter/index.php",
                username: t,
                template: ['<span class="tweet_header">', '<span class="tweet_avatar">', '<a href="{user_url}"><img src="{avatar_url}" alt="{screen_name}" title="{screen_name}"></a>', "</span>", '<span class="tweet_info">', '<a href="{user_url}" class="tweet_name">{name}</a>', '<a href="{user_url}" class="tweet_user">@{screen_name}</a>', "</span>", "</span>", "{text}{time}", '<span class="tweet_intents">', "<ul>", '<li><a href="{reply_url}" title="Reply">Reply</a></li>', '<li><a href="{retweet_url}" title="Retweet">Retweet</a></li>', '<li><a href="{favorite_url}" title="Favorite">Favorite</a></li>', "</ul>", "</span>"].join(""),
                count: i,
                loading_text: "Loading Tweets..."
            })
        })
    }),
    e(i).ready(function() {
        if (e.extend(e.easing, {
            easeInOutExpo: function(e, t, i, n, s) {
                return 0 == t ? i : t == s ? i + n : (t /= s / 2) < 1 ? n / 2 * Math.pow(2, 10 * (t - 1)) + i : n / 2 * (-Math.pow(2, -10 * --t) + 2) + i
            }
        }),
        e("#zw-header").affix({
            offset: {
                top: function() {
                    return 0
                }
            }
        }),
        e.fn.parallax && e(".aside-block[data-background]").parallax({
            enableParallax: !e.isHandheld
        }),
        e.fn.scrollTo && e("#zw-nav, #zw-header .brand, .slider-block .slide-link, .aside-block, .footer").on("click", 'a[href^="#"]', function(i) {
            var n = e(this).attr("href")
              , s = "#" === n ? 0 : e(n);
            e(t).scrollTo(s, {
                duration: e.isHandheld ? 0 : 400
            }),
            i.preventDefault()
        }),
        e.fn.cycle && e(".slider-block .cycle-slider").cycle({
            slides: "> .slide-wrap",
            fx: "scrollHorz",
            speed: 1200,
            swipe: !0,
            loader: "wait",
            easing: "easeInOutExpo",
            pauseOnHover: !0
        }).on("cycle-before", function(i, n, s, o, a) {
            var r = 2 * e(t).width()
              , l = (a ? r : -r) + "px"
              , c = (a ? -r : r) + "px"
              , d = e(s).find(".caption-box")
              , u = e(o).find(".caption-box")
              , h = {
                easing: "easeInOutExpo",
                duration: 1200,
                complete: function() {
                    e(this).css("marginLeft", "")
                }
            };
            d.stop(!0, !0).animate({
                marginLeft: l
            }, h),
            u.stop(!0, !0).css("marginLeft", c).animate({
                marginLeft: "0px"
            }, h)
        }),
        e.fn.isotope && e.fn.imagesLoaded && !function() {
            function i(t) {
                return '<div class="item-detail item-popup-block clearfix"><div class="item-media ' + (t.enableslider ? "cycle-slider" : "") + '">' + (t.enableslider ? '<div class="cycle-next"></div><div class="cycle-prev"></div>' : "") + (t.media ? e.map(t.media, function(e) {
                    var t = "";
                    switch (e.type) {
                    case "image":
                        t = '<img src="' + e.src + '" alt="" title="' + (e.title ? e.title : "") + '">';
                        break;
                    case "video":
                        t = e.embed
                    }
                    return '<div class="media">' + t + "</div>"
                }).join("") : "") + '</div><div class="item-info"><h3 class="title">' + t.title + "</h3>" + t.description + '<div class="clearfix"><a href="' + t.url + '" class="btn btn-primary view-work" target="_blank">View Work</a><a href="#" class="item-like"><i class="icon-heart"></i>' + t.likes + "</a></div></div></div>"
            }
            e(".portfolio").each(function() {
                var n = e(this).find(".items-wrap")
                  , s = e(this).find(".filter")
                  , o = e('<span class="active-label" data-toggle="dropdown"></span>').prependTo(s);
                s.data("label") && o.attr("data-label", s.data("label")),
                n.imagesLoaded(function() {
                    e(this).isotope({
                        itemSelector: ".item",
                        masonry: {
                            columnWidth: n.width() / 12
                        }
                    }),
                    e(t).on("smartresize orientationchange", function() {
                        n.isotope({
                            masonry: {
                                columnWidth: n.width() / 12
                            }
                        })
                    }),
                    s.on("click", "a", function(t) {
                        n.isotope({
                            filter: e(this).data("filter")
                        }),
                        e(this).closest("li").addClass("active").siblings("li").removeClass("active"),
                        e(".active-label", s).text(e(this).text()),
                        t.preventDefault()
                    }),
                    s.find('li a[data-filter="*"]').parent().addClass("active"),
                    o.text(s.find('li a[data-filter="*"]').text()),
                    e.fn.magnificPopup && n.find(".item .item-link").magnificPopup({
                        type: "ajax",
                        ajax: {
                            settings: {
                                cache: !1
                            }
                        },
                        removalDelay: 300,
                        mainClass: "mfp-zoom-in",
                        overflowY: "scroll",
                        callbacks: {
                            parseAjax: function(t) {
                                var n = e.parseJSON(t.responseText);
                                t.responseText = i(n)
                            },
                            updateStatus: function(t) {
                                "ready" === t.status && (e.fn.fitVids && e(this.contentContainer).find(".item-popup-block .media").fitVids(),
                                e.fn.cycle && e(this.contentContainer).find(".item-media.cycle-slider").cycle({
                                    slides: "> .media",
                                    swipe: !0
                                }))
                            },
                            close: function() {
                                e.fn.cycle && e(this.contentContainer).find(".item-media.cycle-slider").cycle("destroy")
                            }
                        }
                    })
                })
            })
        }(),
        e.fn.lazyload && e("img[data-original]").lazyload({
            effect: "fadeIn",
            load: function() {
                e(this).parent().addClass("lazyloaded")
            }
        }),
        e.fn.fitVids && e(".media").fitVids(),
        e.fn.placeholder && e("input[placeholder], textarea[placeholder]").placeholder(),
        e.fn.tooltip && e('[rel="tooltip"]').tooltip(),
        e(i).on("click.alert", ".alert", function() {
            e(this).animate({
                opacity: 0
            }, function() {
                e(this).slideUp(function() {
                    e(this).remove()
                })
            })
        }),
        e.fn.quovolver && e(".quovolver blockquote").quovolver(),
        "undefined" != typeof Recaptcha) {
            var n = "6Leh0OASAAAAALCZcJgsNsfGw5Gl_xRDc_gpfZLH";
            Recaptcha.create(n, "recaptcha", {
                theme: "custom"
            })
        }
        e.fn.validate && e.fn.ajaxSubmit && !function() {
            e("#contact-form").validate({
                submitHandler: function(t) {
                    e(".ajax-loader", t).addClass("visible"),
                    e(t).ajaxSubmit(function(i) {
                        i = e.parseJSON(i),
                        message = e(".alert", t),
                        message.length || (message = e('<div class="alert"></div>')),
                        message.removeClass("alert-error alert-success alert-info").toggleClass("alert-error", !i.success).toggleClass("alert-success", i.success).html(i.message).hide().prependTo(t).slideDown(),
                        i.success && e(t).resetForm(),
                        "undefined" != typeof Recaptcha && Recaptcha.reload(),
                        e(".ajax-loader", t).removeClass("visible")
                    })
                }
            })
        }()
    })
}(jQuery, window, document),
function(e, t) {
    var i = function(e, t) {
        arguments && this.init(e, t)
    };
    i.prototype = {
        defaults: {
            xpos: "50%",
            enableParallax: !0,
            speedFactor: .4,
            loadFirst: !0,
            loadingText: "loading..."
        },
        init: function(i, n) {
            this.element = e(i),
            this.opts = e.extend({
                windowHeight: e(t).height()
            }, this.defaults, n),
            (this.backgroundImage = this.element.data("background")) ? this.opts.loadFirst ? (this.loadingText = e('<span class="bg-loading"></span>').text(this.opts.loadingText),
            this.element.append(this.loadingText),
            e("<img>").one("load.parallax", e.proxy(this.activate, this)).attr("src", this.backgroundImage)) : (this.element.css({
                backgroundImage: "url(" + this.backgroundImage + ")"
            }),
            this.activate()) : this.activate()
        },
        activate: function() {
            this.backgroundImage && this.opts.loadFirst && (this.element.css({
                backgroundImage: "url(" + this.backgroundImage + ")"
            }),
            this.loadingText && this.loadingText.remove()),
            this.opts.enableParallax && e(t).on("scroll.parallax", e.proxy(function() {
                this.refresh()
            }, this)).on("smartresize.parallax orientationchange.parallax", e.proxy(function() {
                this.opts.windowHeight = e(t).height(),
                this.refresh()
            }, this))
        },
        refresh: function() {
            var i = e(t).scrollTop()
              , n = this.element.offset().top
              , s = this.element.outerHeight();
            n + s < i || n > i + this.opts.windowHeight || this.element.css("backgroundPosition", this.opts.xpos + " " + Math.round((n - i) * this.opts.speedFactor) + "px")
        }
    },
    e.fn.parallax = function(e) {
        return this.each(function() {
            new i(this,e)
        })
    }
}(jQuery, window, document),
function(e, t) {
    var i = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
    e.fn.imagesLoaded = function(n) {
        function s() {
            var t = e(h)
              , i = e(f);
            l && (f.length ? l.reject(d, t, i) : l.resolve(d)),
            e.isFunction(n) && n.call(r, d, t, i)
        }
        function o(e) {
            a(e.target, "error" === e.type)
        }
        function a(t, n) {
            t.src === i || -1 !== e.inArray(t, u) || (u.push(t),
            n ? f.push(t) : h.push(t),
            e.data(t, "imagesLoaded", {
                isBroken: n,
                src: t.src
            }),
            c && l.notifyWith(e(t), [n, d, e(h), e(f)]),
            d.length === u.length && (setTimeout(s),
            d.unbind(".imagesLoaded", o)))
        }
        var r = this
          , l = e.isFunction(e.Deferred) ? e.Deferred() : 0
          , c = e.isFunction(l.notify)
          , d = r.find("img").add(r.filter("img"))
          , u = []
          , h = []
          , f = [];
        return e.isPlainObject(n) && e.each(n, function(e, t) {
            "callback" === e ? n = t : l && l[e](t)
        }),
        d.length ? d.bind("load.imagesLoaded error.imagesLoaded", o).each(function(n, s) {
            var o = s.src
              , r = e.data(s, "imagesLoaded");
            r && r.src === o ? a(s, r.isBroken) : s.complete && s.naturalWidth !== t ? a(s, 0 === s.naturalWidth || 0 === s.naturalHeight) : (s.readyState || s.complete) && (s.src = i,
            s.src = o)
        }) : s(),
        l ? l.promise(r) : r
    }
}(jQuery),
function(e) {
    function t(e) {
        return "object" == typeof e ? e : {
            top: e,
            left: e
        }
    }
    var i = e.scrollTo = function(t, i, n) {
        e(window).scrollTo(t, i, n)
    }
    ;
    i.defaults = {
        axis: "xy",
        duration: parseFloat(e.fn.jquery) >= 1.3 ? 0 : 1,
        limit: !0
    },
    i.window = function() {
        return e(window)._scrollable()
    }
    ,
    e.fn._scrollable = function() {
        return this.map(function() {
            var t = this
              , i = !t.nodeName || e.inArray(t.nodeName.toLowerCase(), ["iframe", "#document", "html", "body"]) != -1;
            if (!i)
                return t;
            var n = (t.contentWindow || t).document || t.ownerDocument || t;
            return /webkit/i.test(navigator.userAgent) || "BackCompat" == n.compatMode ? n.body : n.documentElement
        })
    }
    ,
    e.fn.scrollTo = function(n, s, o) {
        return "object" == typeof s && (o = s,
        s = 0),
        "function" == typeof o && (o = {
            onAfter: o
        }),
        "max" == n && (n = 9e9),
        o = e.extend({}, i.defaults, o),
        s = s || o.duration,
        o.queue = o.queue && o.axis.length > 1,
        o.queue && (s /= 2),
        o.offset = t(o.offset),
        o.over = t(o.over),
        this._scrollable().each(function() {
            function a(e) {
                c.animate(u, s, o.easing, e && function() {
                    e.call(this, n, o)
                }
                )
            }
            if (null != n) {
                var r, l = this, c = e(l), d = n, u = {}, h = c.is("html,body");
                switch (typeof d) {
                case "number":
                case "string":
                    if (/^([+-]=?)?\d+(\.\d+)?(px|%)?$/.test(d)) {
                        d = t(d);
                        break
                    }
                    if (d = e(d, this),
                    !d.length)
                        return;
                case "object":
                    (d.is || d.style) && (r = (d = e(d)).offset())
                }
                e.each(o.axis.split(""), function(e, t) {
                    var n = "x" == t ? "Left" : "Top"
                      , s = n.toLowerCase()
                      , f = "scroll" + n
                      , p = l[f]
                      , m = i.max(l, t);
                    if (r)
                        u[f] = r[s] + (h ? 0 : p - c.offset()[s]),
                        o.margin && (u[f] -= parseInt(d.css("margin" + n)) || 0,
                        u[f] -= parseInt(d.css("border" + n + "Width")) || 0),
                        u[f] += o.offset[s] || 0,
                        o.over[s] && (u[f] += d["x" == t ? "width" : "height"]() * o.over[s]);
                    else {
                        var g = d[s];
                        u[f] = g.slice && "%" == g.slice(-1) ? parseFloat(g) / 100 * m : g
                    }
                    o.limit && /^\d+$/.test(u[f]) && (u[f] = u[f] <= 0 ? 0 : Math.min(u[f], m)),
                    !e && o.queue && (p != u[f] && a(o.onAfterFirst),
                    delete u[f])
                }),
                a(o.onAfter)
            }
        }).end()
    }
    ,
    i.max = function(t, i) {
        var n = "x" == i ? "Width" : "Height"
          , s = "scroll" + n;
        if (!e(t).is("html,body"))
            return t[s] - e(t)[n.toLowerCase()]();
        var o = "client" + n
          , a = t.ownerDocument.documentElement
          , r = t.ownerDocument.body;
        return Math.max(a[s], r[s]) - Math.min(a[o], r[o])
    }
}(jQuery),
function(e, t) {
    var i = function(e, t, i) {
        var n;
        return function() {
            var s = this
              , o = arguments;
            n ? clearTimeout(n) : i && e.apply(s, o),
            n = setTimeout(function() {
                i || e.apply(s, o),
                n = null
            }, t || 100)
        }
    };
    jQuery.fn[t] = function(e) {
        return e ? this.bind("resize", i(e)) : this.trigger(t)
    }
}(jQuery, "smartresize"),
function(e, t, i) {
    function n(e) {
        var t = {}
          , n = /^jQuery\d+$/;
        return i.each(e.attributes, function(e, i) {
            i.specified && !n.test(i.name) && (t[i.name] = i.value)
        }),
        t
    }
    function s(e, n) {
        var s = this
          , o = i(s);
        if (s.value == o.attr("placeholder") && o.hasClass("placeholder"))
            if (o.data("placeholder-password")) {
                if (o = o.hide().next().show().attr("id", o.removeAttr("id").data("placeholder-id")),
                e === !0)
                    return o[0].value = n;
                o.focus()
            } else
                s.value = "",
                o.removeClass("placeholder"),
                s == t.activeElement && s.select()
    }
    function o() {
        var e, t = this, o = i(t), a = this.id;
        if ("" == t.value) {
            if ("password" == t.type) {
                if (!o.data("placeholder-textinput")) {
                    try {
                        e = o.clone().attr({
                            type: "text"
                        })
                    } catch (t) {
                        e = i("<input>").attr(i.extend(n(this), {
                            type: "text"
                        }))
                    }
                    e.removeAttr("name").data({
                        "placeholder-password": !0,
                        "placeholder-id": a
                    }).bind("focus.placeholder", s),
                    o.data({
                        "placeholder-textinput": e,
                        "placeholder-id": a
                    }).before(e)
                }
                o = o.removeAttr("id").hide().prev().attr("id", a).show()
            }
            o.addClass("placeholder"),
            o[0].value = o.attr("placeholder")
        } else
            o.removeClass("placeholder")
    }
    var a, r, l = "placeholder"in t.createElement("input"), c = "placeholder"in t.createElement("textarea"), d = i.fn, u = i.valHooks;
    l && c ? (r = d.placeholder = function() {
        return this
    }
    ,
    r.input = r.textarea = !0) : (r = d.placeholder = function() {
        var e = this;
        return e.filter((l ? "textarea" : ":input") + "[placeholder]").not(".placeholder").bind({
            "focus.placeholder": s,
            "blur.placeholder": o
        }).data("placeholder-enabled", !0).trigger("blur.placeholder"),
        e
    }
    ,
    r.input = l,
    r.textarea = c,
    a = {
        get: function(e) {
            var t = i(e);
            return t.data("placeholder-enabled") && t.hasClass("placeholder") ? "" : e.value
        },
        set: function(e, n) {
            var a = i(e);
            return a.data("placeholder-enabled") ? ("" == n ? (e.value = n,
            e != t.activeElement && o.call(e)) : a.hasClass("placeholder") ? s.call(e, !0, n) || (e.value = n) : e.value = n,
            a) : e.value = n
        }
    },
    l || (u.input = a),
    c || (u.textarea = a),
    i(function() {
        i(t).delegate("form", "submit.placeholder", function() {
            var e = i(".placeholder", this).each(s);
            setTimeout(function() {
                e.each(o)
            }, 10)
        })
    }),
    i(e).bind("beforeunload.placeholder", function() {
        i(".placeholder").each(function() {
            this.value = ""
        })
    }))
}(this, document, jQuery),
function(e, t, i, n) {
    var s = e(t);
    e.fn.lazyload = function(i) {
        function o() {
            var t = 0;
            r.each(function() {
                var i = e(this);
                if ((!l.skip_invisible || i.is(":visible")) && !e.abovethetop(this, l) && !e.leftofbegin(this, l))
                    if (e.belowthefold(this, l) || e.rightoffold(this, l)) {
                        if (++t > l.failure_limit)
                            return !1
                    } else
                        i.trigger("appear"),
                        t = 0
            })
        }
        var a, r = this, l = {
            threshold: 0,
            failure_limit: 0,
            event: "scroll",
            effect: "show",
            container: t,
            data_attribute: "original",
            skip_invisible: !0,
            appear: null,
            load: null
        };
        return i && (n !== i.failurelimit && (i.failure_limit = i.failurelimit,
        delete i.failurelimit),
        n !== i.effectspeed && (i.effect_speed = i.effectspeed,
        delete i.effectspeed),
        e.extend(l, i)),
        a = l.container === n || l.container === t ? s : e(l.container),
        0 === l.event.indexOf("scroll") && a.bind(l.event, function() {
            return o()
        }),
        this.each(function() {
            var t = this
              , i = e(t);
            t.loaded = !1,
            i.one("appear", function() {
                if (!this.loaded) {
                    if (l.appear) {
                        var n = r.length;
                        l.appear.call(t, n, l)
                    }
                    e("<img />").bind("load", function() {
                        i.hide().attr("src", i.data(l.data_attribute))[l.effect](l.effect_speed),
                        t.loaded = !0;
                        var n = e.grep(r, function(e) {
                            return !e.loaded
                        });
                        if (r = e(n),
                        l.load) {
                            var s = r.length;
                            l.load.call(t, s, l)
                        }
                    }).attr("src", i.data(l.data_attribute))
                }
            }),
            0 !== l.event.indexOf("scroll") && i.bind(l.event, function() {
                t.loaded || i.trigger("appear")
            })
        }),
        s.bind("resize", function() {
            o()
        }),
        /iphone|ipod|ipad.*os 5/gi.test(navigator.appVersion) && s.bind("pageshow", function(t) {
            t.originalEvent.persisted && r.each(function() {
                e(this).trigger("appear")
            })
        }),
        e(t).load(function() {
            o()
        }),
        this
    }
    ,
    e.belowthefold = function(i, o) {
        var a;
        return a = o.container === n || o.container === t ? s.height() + s.scrollTop() : e(o.container).offset().top + e(o.container).height(),
        a <= e(i).offset().top - o.threshold
    }
    ,
    e.rightoffold = function(i, o) {
        var a;
        return a = o.container === n || o.container === t ? s.width() + s.scrollLeft() : e(o.container).offset().left + e(o.container).width(),
        a <= e(i).offset().left - o.threshold
    }
    ,
    e.abovethetop = function(i, o) {
        var a;
        return a = o.container === n || o.container === t ? s.scrollTop() : e(o.container).offset().top,
        a >= e(i).offset().top + o.threshold + e(i).height()
    }
    ,
    e.leftofbegin = function(i, o) {
        var a;
        return a = o.container === n || o.container === t ? s.scrollLeft() : e(o.container).offset().left,
        a >= e(i).offset().left + o.threshold + e(i).width()
    }
    ,
    e.inviewport = function(t, i) {
        return !(e.rightoffold(t, i) || e.leftofbegin(t, i) || e.belowthefold(t, i) || e.abovethetop(t, i))
    }
    ,
    e.extend(e.expr[":"], {
        "below-the-fold": function(t) {
            return e.belowthefold(t, {
                threshold: 0
            })
        },
        "above-the-top": function(t) {
            return !e.belowthefold(t, {
                threshold: 0
            })
        },
        "right-of-screen": function(t) {
            return e.rightoffold(t, {
                threshold: 0
            })
        },
        "left-of-screen": function(t) {
            return !e.rightoffold(t, {
                threshold: 0
            })
        },
        "in-viewport": function(t) {
            return e.inviewport(t, {
                threshold: 0
            })
        },
        "above-the-fold": function(t) {
            return !e.belowthefold(t, {
                threshold: 0
            })
        },
        "right-of-fold": function(t) {
            return e.rightoffold(t, {
                threshold: 0
            })
        },
        "left-of-fold": function(t) {
            return !e.rightoffold(t, {
                threshold: 0
            })
        }
    })
}(jQuery, window, document);
var responsiveNav = function(e, t) {
    var i = !!e.getComputedStyle;
    e.getComputedStyle || (e.getComputedStyle = function(e) {
        return this.el = e,
        this.getPropertyValue = function(t) {
            var i = /(\-([a-z]){1})/g;
            return "float" === t && (t = "styleFloat"),
            i.test(t) && (t = t.replace(i, function(e, t, i) {
                return i.toUpperCase()
            })),
            e.currentStyle[t] ? e.currentStyle[t] : null
        }
        ,
        this
    }
    );
    var n, s, o, a = t.documentElement, r = t.getElementsByTagName("head")[0], l = t.createElement("style"), c = !1, d = function(e, t, i, n) {
        if ("addEventListener"in e)
            try {
                e.addEventListener(t, i, n)
            } catch (s) {
                if ("object" != typeof i || !i.handleEvent)
                    throw s;
                e.addEventListener(t, function(e) {
                    i.handleEvent.call(i, e)
                }, n)
            }
        else
            "attachEvent"in e && ("object" == typeof i && i.handleEvent ? e.attachEvent("on" + t, function() {
                i.handleEvent.call(i)
            }) : e.attachEvent("on" + t, i))
    }, u = function(e, t, i, n) {
        if ("removeEventListener"in e)
            try {
                e.removeEventListener(t, i, n)
            } catch (s) {
                if ("object" != typeof i || !i.handleEvent)
                    throw s;
                e.removeEventListener(t, function(e) {
                    i.handleEvent.call(i, e)
                }, n)
            }
        else
            "detachEvent"in e && ("object" == typeof i && i.handleEvent ? e.detachEvent("on" + t, function() {
                i.handleEvent.call(i)
            }) : e.detachEvent("on" + t, i))
    }, h = function(e, t) {
        for (var i in t)
            e.setAttribute(i, t[i])
    }, f = function(e, t) {
        e.className += " " + t,
        e.className = e.className.replace(/(^\s*)|(\s*$)/g, "")
    }, p = function(e, t) {
        e.className = e.className.replace(RegExp("(\\s|^)" + t + "(\\s|$)"), " ").replace(/(^\s*)|(\s*$)/g, "")
    }, m = function(e, i) {
        var o;
        this.options = {
            animate: !0,
            transition: 400,
            label: "Menu",
            insert: "after",
            customToggle: "",
            openPos: "relative",
            jsClass: "js",
            init: function() {},
            open: function() {},
            close: function() {}
        };
        for (o in i)
            this.options[o] = i[o];
        if (f(a, this.options.jsClass),
        this.wrapperEl = e.replace("#", ""),
        !t.getElementById(this.wrapperEl))
            throw Error("The nav element you are trying to select doesn't exist");
        this.wrapper = t.getElementById(this.wrapperEl),
        o = this.wrapper;
        for (var r = this.wrapper.firstChild; null !== r && 1 !== r.nodeType; )
            r = r.nextSibling;
        o.inner = r,
        s = this.options,
        n = this.wrapper,
        this._init(this)
    };
    m.prototype = {
        destroy: function() {
            this._removeStyles(),
            p(n, "closed"),
            p(n, "opened"),
            n.removeAttribute("style"),
            n.removeAttribute("aria-hidden"),
            g = n = null,
            u(e, "load", this, !1),
            u(e, "resize", this, !1),
            u(o, "mousedown", this, !1),
            u(o, "touchstart", this, !1),
            u(o, "touchend", this, !1),
            u(o, "keyup", this, !1),
            u(o, "click", this, !1),
            s.customToggle ? o.removeAttribute("aria-hidden") : o.parentNode.removeChild(o)
        },
        toggle: function() {
            c ? (p(n, "opened"),
            f(n, "closed"),
            h(n, {
                "aria-hidden": "true"
            }),
            s.animate ? setTimeout(function() {
                n.style.position = "absolute"
            }, s.transition + 10) : n.style.position = "absolute",
            c = !1,
            s.close()) : (p(n, "closed"),
            f(n, "opened"),
            n.style.position = s.openPos,
            h(n, {
                "aria-hidden": "false"
            }),
            c = !0,
            s.open())
        },
        handleEvent: function(t) {
            switch (t = t || e.event,
            t.type) {
            case "mousedown":
                this._onmousedown(t);
                break;
            case "touchstart":
                this._ontouchstart(t);
                break;
            case "touchend":
                this._ontouchend(t);
                break;
            case "keyup":
                this._onkeyup(t);
                break;
            case "click":
                this._onclick(t);
                break;
            case "load":
                this._transitions(t),
                this._resize(t);
                break;
            case "resize":
                this._resize(t)
            }
        },
        _init: function() {
            f(n, "closed"),
            this._createToggle(),
            d(e, "load", this, !1),
            d(e, "resize", this, !1),
            d(o, "mousedown", this, !1),
            d(o, "touchstart", this, !1),
            d(o, "touchend", this, !1),
            d(o, "keyup", this, !1),
            d(o, "click", this, !1)
        },
        _createStyles: function() {
            l.parentNode || r.appendChild(l)
        },
        _removeStyles: function() {
            l.parentNode && l.parentNode.removeChild(l)
        },
        _createToggle: function() {
            if (s.customToggle) {
                var e = s.customToggle.replace("#", "");
                if (!t.getElementById(e))
                    throw Error("The custom nav toggle you are trying to select doesn't exist");
                o = t.getElementById(e)
            } else
                e = t.createElement("a"),
                e.innerHTML = s.label,
                h(e, {
                    href: "#",
                    id: "nav-toggle"
                }),
                "after" === s.insert ? n.parentNode.insertBefore(e, n.nextSibling) : n.parentNode.insertBefore(e, n),
                o = t.getElementById("nav-toggle")
        },
        _preventDefault: function(e) {
            e.preventDefault ? (e.preventDefault(),
            e.stopPropagation()) : e.returnValue = !1
        },
        _onmousedown: function(t) {
            var i = t || e.event;
            3 === i.which || 2 === i.button || (this._preventDefault(t),
            this.toggle(t))
        },
        _ontouchstart: function(e) {
            o.onmousedown = null,
            this._preventDefault(e),
            this.toggle(e)
        },
        _ontouchend: function() {
            var e = this;
            n.addEventListener("click", e._preventDefault, !0),
            setTimeout(function() {
                n.removeEventListener("click", e._preventDefault, !0)
            }, s.transition)
        },
        _onkeyup: function(t) {
            13 === (t || e.event).keyCode && this.toggle(t)
        },
        _onclick: function(e) {
            this._preventDefault(e)
        },
        _transitions: function() {
            if (s.animate) {
                var e = n.style
                  , t = "max-height " + s.transition + "ms";
                e.WebkitTransition = t,
                e.MozTransition = t,
                e.OTransition = t,
                e.transition = t
            }
        },
        _calcHeight: function() {
            var e = "#" + this.wrapperEl + ".opened{max-height:" + n.inner.offsetHeight + "px}";
            i && (l.innerHTML = e)
        },
        _resize: function() {
            "none" !== e.getComputedStyle(o, null).getPropertyValue("display") ? (h(o, {
                "aria-hidden": "false"
            }),
            n.className.match(/(^|\s)closed(\s|$)/) && (h(n, {
                "aria-hidden": "true"
            }),
            n.style.position = "absolute"),
            this._createStyles(),
            this._calcHeight()) : (h(o, {
                "aria-hidden": "true"
            }),
            h(n, {
                "aria-hidden": "false"
            }),
            n.style.position = s.openPos,
            this._removeStyles()),
            s.init()
        }
    };
    var g;
    return function(e, t) {
        return g || (g = new m(e,t)),
        g
    }
}(window, document);
!function(e) {
    "use strict";
    function t(e) {
        return (e || "").toLowerCase()
    }
    var i = "2.1.1";
    e.fn.cycle = function(i) {
        var n;
        return 0 !== this.length || e.isReady ? this.each(function() {
            var n, s, o, a, r = e(this), l = e.fn.cycle.log;
            if (!r.data("cycle.opts")) {
                (r.data("cycle-log") === !1 || i && i.log === !1 || s && s.log === !1) && (l = e.noop),
                l("--c2 init--"),
                n = r.data();
                for (var c in n)
                    n.hasOwnProperty(c) && /^cycle[A-Z]+/.test(c) && (a = n[c],
                    o = c.match(/^cycle(.*)/)[1].replace(/^[A-Z]/, t),
                    l(o + ":", a, "(" + typeof a + ")"),
                    n[o] = a);
                s = e.extend({}, e.fn.cycle.defaults, n, i || {}),
                s.timeoutId = 0,
                s.paused = s.paused || !1,
                s.container = r,
                s._maxZ = s.maxZ,
                s.API = e.extend({
                    _container: r
                }, e.fn.cycle.API),
                s.API.log = l,
                s.API.trigger = function(e, t) {
                    return s.container.trigger(e, t),
                    s.API
                }
                ,
                r.data("cycle.opts", s),
                r.data("cycle.API", s.API),
                s.API.trigger("cycle-bootstrap", [s, s.API]),
                s.API.addInitialSlides(),
                s.API.preInitSlideshow(),
                s.slides.length && s.API.initSlideshow()
            }
        }) : (n = {
            s: this.selector,
            c: this.context
        },
        e.fn.cycle.log("requeuing slideshow (dom not ready)"),
        e(function() {
            e(n.s, n.c).cycle(i)
        }),
        this)
    }
    ,
    e.fn.cycle.API = {
        opts: function() {
            return this._container.data("cycle.opts")
        },
        addInitialSlides: function() {
            var t = this.opts()
              , i = t.slides;
            t.slideCount = 0,
            t.slides = e(),
            i = i.jquery ? i : t.container.find(i),
            t.random && i.sort(function() {
                return Math.random() - .5
            }),
            t.API.add(i)
        },
        preInitSlideshow: function() {
            var t = this.opts();
            t.API.trigger("cycle-pre-initialize", [t]);
            var i = e.fn.cycle.transitions[t.fx];
            i && e.isFunction(i.preInit) && i.preInit(t),
            t._preInitialized = !0
        },
        postInitSlideshow: function() {
            var t = this.opts();
            t.API.trigger("cycle-post-initialize", [t]);
            var i = e.fn.cycle.transitions[t.fx];
            i && e.isFunction(i.postInit) && i.postInit(t)
        },
        initSlideshow: function() {
            var t, i = this.opts(), n = i.container;
            i.API.calcFirstSlide(),
            "static" == i.container.css("position") && i.container.css("position", "relative"),
            e(i.slides[i.currSlide]).css({
                opacity: 1,
                display: "block",
                visibility: "visible"
            }),
            i.API.stackSlides(i.slides[i.currSlide], i.slides[i.nextSlide], !i.reverse),
            i.pauseOnHover && (i.pauseOnHover !== !0 && (n = e(i.pauseOnHover)),
            n.hover(function() {
                i.API.pause(!0)
            }, function() {
                i.API.resume(!0)
            })),
            i.timeout && (t = i.API.getSlideOpts(i.currSlide),
            i.API.queueTransition(t, t.timeout + i.delay)),
            i._initialized = !0,
            i.API.updateView(!0),
            i.API.trigger("cycle-initialized", [i]),
            i.API.postInitSlideshow()
        },
        pause: function(t) {
            var i = this.opts()
              , n = i.API.getSlideOpts()
              , s = i.hoverPaused || i.paused;
            t ? i.hoverPaused = !0 : i.paused = !0,
            s || (i.container.addClass("cycle-paused"),
            i.API.trigger("cycle-paused", [i]).log("cycle-paused"),
            n.timeout && (clearTimeout(i.timeoutId),
            i.timeoutId = 0,
            i._remainingTimeout -= e.now() - i._lastQueue,
            (i._remainingTimeout < 0 || isNaN(i._remainingTimeout)) && (i._remainingTimeout = void 0)))
        },
        resume: function(e) {
            var t = this.opts()
              , i = !t.hoverPaused && !t.paused;
            e ? t.hoverPaused = !1 : t.paused = !1,
            i || (t.container.removeClass("cycle-paused"),
            0 === t.slides.filter(":animated").length && t.API.queueTransition(t.API.getSlideOpts(), t._remainingTimeout),
            t.API.trigger("cycle-resumed", [t, t._remainingTimeout]).log("cycle-resumed"))
        },
        add: function(t, i) {
            var n, s = this.opts(), o = s.slideCount, a = !1;
            "string" == e.type(t) && (t = e.trim(t)),
            e(t).each(function() {
                var t, n = e(this);
                i ? s.container.prepend(n) : s.container.append(n),
                s.slideCount++,
                t = s.API.buildSlideOpts(n),
                i ? s.slides = e(n).add(s.slides) : s.slides = s.slides.add(n),
                s.API.initSlide(t, n, --s._maxZ),
                n.data("cycle.opts", t),
                s.API.trigger("cycle-slide-added", [s, t, n])
            }),
            s.API.updateView(!0),
            a = s._preInitialized && o < 2 && s.slideCount >= 1,
            a && (s._initialized ? s.timeout && (n = s.slides.length,
            s.nextSlide = s.reverse ? n - 1 : 1,
            s.timeoutId || s.API.queueTransition(s)) : s.API.initSlideshow())
        },
        calcFirstSlide: function() {
            var e, t = this.opts();
            e = parseInt(t.startingSlide || 0, 10),
            (e >= t.slides.length || e < 0) && (e = 0),
            t.currSlide = e,
            t.reverse ? (t.nextSlide = e - 1,
            t.nextSlide < 0 && (t.nextSlide = t.slides.length - 1)) : (t.nextSlide = e + 1,
            t.nextSlide == t.slides.length && (t.nextSlide = 0))
        },
        calcNextSlide: function() {
            var e, t = this.opts();
            t.reverse ? (e = t.nextSlide - 1 < 0,
            t.nextSlide = e ? t.slideCount - 1 : t.nextSlide - 1,
            t.currSlide = e ? 0 : t.nextSlide + 1) : (e = t.nextSlide + 1 == t.slides.length,
            t.nextSlide = e ? 0 : t.nextSlide + 1,
            t.currSlide = e ? t.slides.length - 1 : t.nextSlide - 1)
        },
        calcTx: function(t, i) {
            var n, s = t;
            return i && s.manualFx && (n = e.fn.cycle.transitions[s.manualFx]),
            n || (n = e.fn.cycle.transitions[s.fx]),
            n || (n = e.fn.cycle.transitions.fade,
            s.API.log('Transition "' + s.fx + '" not found.  Using fade.')),
            n
        },
        prepareTx: function(e, t) {
            var i, n, s, o, a, r = this.opts();
            return r.slideCount < 2 ? void (r.timeoutId = 0) : (!e || r.busy && !r.manualTrump || (r.API.stopTransition(),
            r.busy = !1,
            clearTimeout(r.timeoutId),
            r.timeoutId = 0),
            void (r.busy || (0 !== r.timeoutId || e) && (n = r.slides[r.currSlide],
            s = r.slides[r.nextSlide],
            o = r.API.getSlideOpts(r.nextSlide),
            a = r.API.calcTx(o, e),
            r._tx = a,
            e && void 0 !== o.manualSpeed && (o.speed = o.manualSpeed),
            r.nextSlide != r.currSlide && (e || !r.paused && !r.hoverPaused && r.timeout) ? (r.API.trigger("cycle-before", [o, n, s, t]),
            a.before && a.before(o, n, s, t),
            i = function() {
                r.busy = !1,
                r.container.data("cycle.opts") && (a.after && a.after(o, n, s, t),
                r.API.trigger("cycle-after", [o, n, s, t]),
                r.API.queueTransition(o),
                r.API.updateView(!0))
            }
            ,
            r.busy = !0,
            a.transition ? a.transition(o, n, s, t, i) : r.API.doTransition(o, n, s, t, i),
            r.API.calcNextSlide(),
            r.API.updateView()) : r.API.queueTransition(o))))
        },
        doTransition: function(t, i, n, s, o) {
            var a = t
              , r = e(i)
              , l = e(n)
              , c = function() {
                l.animate(a.animIn || {
                    opacity: 1
                }, a.speed, a.easeIn || a.easing, o)
            };
            l.css(a.cssBefore || {}),
            r.animate(a.animOut || {}, a.speed, a.easeOut || a.easing, function() {
                r.css(a.cssAfter || {}),
                a.sync || c()
            }),
            a.sync && c()
        },
        queueTransition: function(t, i) {
            var n = this.opts()
              , s = void 0 !== i ? i : t.timeout;
            return 0 === n.nextSlide && 0 === --n.loop ? (n.API.log("terminating; loop=0"),
            n.timeout = 0,
            s ? setTimeout(function() {
                n.API.trigger("cycle-finished", [n])
            }, s) : n.API.trigger("cycle-finished", [n]),
            void (n.nextSlide = n.currSlide)) : void (s && (n._lastQueue = e.now(),
            void 0 === i && (n._remainingTimeout = t.timeout),
            n.paused || n.hoverPaused || (n.timeoutId = setTimeout(function() {
                n.API.prepareTx(!1, !n.reverse)
            }, s))))
        },
        stopTransition: function() {
            var e = this.opts();
            e.slides.filter(":animated").length && (e.slides.stop(!1, !0),
            e.API.trigger("cycle-transition-stopped", [e])),
            e._tx && e._tx.stopTransition && e._tx.stopTransition(e)
        },
        advanceSlide: function(e) {
            var t = this.opts();
            return clearTimeout(t.timeoutId),
            t.timeoutId = 0,
            t.nextSlide = t.currSlide + e,
            t.nextSlide < 0 ? t.nextSlide = t.slides.length - 1 : t.nextSlide >= t.slides.length && (t.nextSlide = 0),
            t.API.prepareTx(!0, e >= 0),
            !1
        },
        buildSlideOpts: function(i) {
            var n, s, o = this.opts(), a = i.data() || {};
            for (var r in a)
                a.hasOwnProperty(r) && /^cycle[A-Z]+/.test(r) && (n = a[r],
                s = r.match(/^cycle(.*)/)[1].replace(/^[A-Z]/, t),
                o.API.log("[" + (o.slideCount - 1) + "]", s + ":", n, "(" + typeof n + ")"),
                a[s] = n);
            a = e.extend({}, e.fn.cycle.defaults, o, a),
            a.slideNum = o.slideCount;
            try {
                delete a.API,
                delete a.slideCount,
                delete a.currSlide,
                delete a.nextSlide,
                delete a.slides
            } catch (e) {}
            return a
        },
        getSlideOpts: function(t) {
            var i = this.opts();
            void 0 === t && (t = i.currSlide);
            var n = i.slides[t]
              , s = e(n).data("cycle.opts");
            return e.extend({}, i, s)
        },
        initSlide: function(t, i, n) {
            var s = this.opts();
            i.css(t.slideCss || {}),
            n > 0 && i.css("zIndex", n),
            isNaN(t.speed) && (t.speed = e.fx.speeds[t.speed] || e.fx.speeds._default),
            t.sync || (t.speed = t.speed / 2),
            i.addClass(s.slideClass)
        },
        updateView: function(e, t) {
            var i = this.opts();
            if (i._initialized) {
                var n = i.API.getSlideOpts()
                  , s = i.slides[i.currSlide];
                !e && t !== !0 && (i.API.trigger("cycle-update-view-before", [i, n, s]),
                i.updateView < 0) || (i.slideActiveClass && i.slides.removeClass(i.slideActiveClass).eq(i.currSlide).addClass(i.slideActiveClass),
                e && i.hideNonActive && i.slides.filter(":not(." + i.slideActiveClass + ")").css("visibility", "hidden"),
                0 === i.updateView && setTimeout(function() {
                    i.API.trigger("cycle-update-view", [i, n, s, e])
                }, n.speed / (i.sync ? 2 : 1)),
                0 !== i.updateView && i.API.trigger("cycle-update-view", [i, n, s, e]),
                e && i.API.trigger("cycle-update-view-after", [i, n, s]))
            }
        },
        getComponent: function(t) {
            var i = this.opts()
              , n = i[t];
            return "string" == typeof n ? /^\s*[\>|\+|~]/.test(n) ? i.container.find(n) : e(n) : n.jquery ? n : e(n)
        },
        stackSlides: function(t, i, n) {
            var s = this.opts();
            t || (t = s.slides[s.currSlide],
            i = s.slides[s.nextSlide],
            n = !s.reverse),
            e(t).css("zIndex", s.maxZ);
            var o, a = s.maxZ - 2, r = s.slideCount;
            if (n) {
                for (o = s.currSlide + 1; o < r; o++)
                    e(s.slides[o]).css("zIndex", a--);
                for (o = 0; o < s.currSlide; o++)
                    e(s.slides[o]).css("zIndex", a--)
            } else {
                for (o = s.currSlide - 1; o >= 0; o--)
                    e(s.slides[o]).css("zIndex", a--);
                for (o = r - 1; o > s.currSlide; o--)
                    e(s.slides[o]).css("zIndex", a--)
            }
            e(i).css("zIndex", s.maxZ - 1)
        },
        getSlideIndex: function(e) {
            return this.opts().slides.index(e)
        }
    },
    e.fn.cycle.log = function() {
        window.console && console.log && console.log("[cycle2] " + Array.prototype.join.call(arguments, " "))
    }
    ,
    e.fn.cycle.version = function() {
        return "Cycle2: " + i
    }
    ,
    e.fn.cycle.transitions = {
        custom: {},
        none: {
            before: function(e, t, i, n) {
                e.API.stackSlides(i, t, n),
                e.cssBefore = {
                    opacity: 1,
                    visibility: "visible",
                    display: "block"
                }
            }
        },
        fade: {
            before: function(t, i, n, s) {
                var o = t.API.getSlideOpts(t.nextSlide).slideCss || {};
                t.API.stackSlides(i, n, s),
                t.cssBefore = e.extend(o, {
                    opacity: 0,
                    visibility: "visible",
                    display: "block"
                }),
                t.animIn = {
                    opacity: 1
                },
                t.animOut = {
                    opacity: 0
                }
            }
        },
        fadeout: {
            before: function(t, i, n, s) {
                var o = t.API.getSlideOpts(t.nextSlide).slideCss || {};
                t.API.stackSlides(i, n, s),
                t.cssBefore = e.extend(o, {
                    opacity: 1,
                    visibility: "visible",
                    display: "block"
                }),
                t.animOut = {
                    opacity: 0
                }
            }
        },
        scrollHorz: {
            before: function(e, t, i, n) {
                e.API.stackSlides(t, i, n);
                var s = e.container.css("overflow", "hidden").width();
                e.cssBefore = {
                    left: n ? s : -s,
                    top: 0,
                    opacity: 1,
                    visibility: "visible",
                    display: "block"
                },
                e.cssAfter = {
                    zIndex: e._maxZ - 2,
                    left: 0
                },
                e.animIn = {
                    left: 0
                },
                e.animOut = {
                    left: n ? -s : s
                }
            }
        }
    },
    e.fn.cycle.defaults = {
        allowWrap: !0,
        autoSelector: ".cycle-slideshow[data-cycle-auto-init!=false]",
        delay: 0,
        easing: null,
        fx: "fade",
        hideNonActive: !0,
        loop: 0,
        manualFx: void 0,
        manualSpeed: void 0,
        manualTrump: !0,
        maxZ: 100,
        pauseOnHover: !1,
        reverse: !1,
        slideActiveClass: "cycle-slide-active",
        slideClass: "cycle-slide",
        slideCss: {
            position: "absolute",
            top: 0,
            left: 0
        },
        slides: "> img",
        speed: 700,
        startingSlide: 0,
        sync: !0,
        timeout: 4e3,
        updateView: 0
    },
    e(document).ready(function() {
        e(e.fn.cycle.defaults.autoSelector).cycle()
    })
}(jQuery),
function(e) {
    "use strict";
    function t(t, n) {
        var s, o, a, r = n.autoHeight;
        if ("container" == r)
            o = e(n.slides[n.currSlide]).outerHeight(),
            n.container.height(o);
        else if (n._autoHeightRatio)
            n.container.height(n.container.width() / n._autoHeightRatio);
        else if ("calc" === r || "number" == e.type(r) && r >= 0) {
            if (a = "calc" === r ? i(t, n) : r >= n.slides.length ? 0 : r,
            a == n._sentinelIndex)
                return;
            n._sentinelIndex = a,
            n._sentinel && n._sentinel.remove(),
            s = e(n.slides[a].cloneNode(!0)),
            s.removeAttr("id name rel").find("[id],[name],[rel]").removeAttr("id name rel"),
            s.css({
                position: "static",
                visibility: "hidden",
                display: "block"
            }).prependTo(n.container).addClass("cycle-sentinel cycle-slide").removeClass("cycle-slide-active"),
            s.find("*").css("visibility", "hidden"),
            n._sentinel = s
        }
    }
    function i(t, i) {
        var n = 0
          , s = -1;
        return i.slides.each(function(t) {
            var i = e(this).height();
            i > s && (s = i,
            n = t)
        }),
        n
    }
    function n(t, i, n, s) {
        var o = e(s).outerHeight();
        i.container.animate({
            height: o
        }, i.autoHeightSpeed, i.autoHeightEasing)
    }
    function s(i, o) {
        o._autoHeightOnResize && (e(window).off("resize orientationchange", o._autoHeightOnResize),
        o._autoHeightOnResize = null),
        o.container.off("cycle-slide-added cycle-slide-removed", t),
        o.container.off("cycle-destroyed", s),
        o.container.off("cycle-before", n),
        o._sentinel && (o._sentinel.remove(),
        o._sentinel = null)
    }
    e.extend(e.fn.cycle.defaults, {
        autoHeight: 0,
        autoHeightSpeed: 250,
        autoHeightEasing: null
    }),
    e(document).on("cycle-initialized", function(i, o) {
        function a() {
            t(i, o)
        }
        var r, l = o.autoHeight, c = e.type(l), d = null;
        "string" !== c && "number" !== c || (o.container.on("cycle-slide-added cycle-slide-removed", t),
        o.container.on("cycle-destroyed", s),
        "container" == l ? o.container.on("cycle-before", n) : "string" === c && /\d+\:\d+/.test(l) && (r = l.match(/(\d+)\:(\d+)/),
        r = r[1] / r[2],
        o._autoHeightRatio = r),
        "number" !== c && (o._autoHeightOnResize = function() {
            clearTimeout(d),
            d = setTimeout(a, 50)
        }
        ,
        e(window).on("resize orientationchange", o._autoHeightOnResize)),
        setTimeout(a, 30))
    })
}(jQuery),
function(e) {
    "use strict";
    e.extend(e.fn.cycle.defaults, {
        caption: "> .cycle-caption",
        captionTemplate: "{{slideNum}} / {{slideCount}}",
        overlay: "> .cycle-overlay",
        overlayTemplate: "<div>{{title}}</div><div>{{desc}}</div>",
        captionModule: "caption"
    }),
    e(document).on("cycle-update-view", function(t, i, n, s) {
        if ("caption" === i.captionModule) {
            e.each(["caption", "overlay"], function() {
                var e = this
                  , t = n[e + "Template"]
                  , o = i.API.getComponent(e);
                o.length && t ? (o.html(i.API.tmpl(t, n, i, s)),
                o.show()) : o.hide()
            })
        }
    }),
    e(document).on("cycle-destroyed", function(t, i) {
        var n;
        e.each(["caption", "overlay"], function() {
            var e = this
              , t = i[e + "Template"];
            i[e] && t && (n = i.API.getComponent("caption"),
            n.empty())
        })
    })
}(jQuery),
function(e) {
    "use strict";
    var t = e.fn.cycle;
    e.fn.cycle = function(i) {
        var n, s, o, a = e.makeArray(arguments);
        return "number" == e.type(i) ? this.cycle("goto", i) : "string" == e.type(i) ? this.each(function() {
            var r;
            return n = i,
            o = e(this).data("cycle.opts"),
            void 0 === o ? void t.log('slideshow must be initialized before sending commands; "' + n + '" ignored') : (n = "goto" == n ? "jump" : n,
            s = o.API[n],
            e.isFunction(s) ? (r = e.makeArray(a),
            r.shift(),
            s.apply(o.API, r)) : void t.log("unknown command: ", n))
        }) : t.apply(this, arguments)
    }
    ,
    e.extend(e.fn.cycle, t),
    e.extend(t.API, {
        next: function() {
            var e = this.opts();
            if (!e.busy || e.manualTrump) {
                var t = e.reverse ? -1 : 1;
                e.allowWrap === !1 && e.currSlide + t >= e.slideCount || (e.API.advanceSlide(t),
                e.API.trigger("cycle-next", [e]).log("cycle-next"))
            }
        },
        prev: function() {
            var e = this.opts();
            if (!e.busy || e.manualTrump) {
                var t = e.reverse ? 1 : -1;
                e.allowWrap === !1 && e.currSlide + t < 0 || (e.API.advanceSlide(t),
                e.API.trigger("cycle-prev", [e]).log("cycle-prev"))
            }
        },
        destroy: function() {
            this.stop();
            var t = this.opts()
              , i = e.isFunction(e._data) ? e._data : e.noop;
            clearTimeout(t.timeoutId),
            t.timeoutId = 0,
            t.API.stop(),
            t.API.trigger("cycle-destroyed", [t]).log("cycle-destroyed"),
            t.container.removeData(),
            i(t.container[0], "parsedAttrs", !1),
            t.retainStylesOnDestroy || (t.container.removeAttr("style"),
            t.slides.removeAttr("style"),
            t.slides.removeClass(t.slideActiveClass)),
            t.slides.each(function() {
                e(this).removeData(),
                i(this, "parsedAttrs", !1)
            })
        },
        jump: function(e) {
            var t, i = this.opts();
            if (!i.busy || i.manualTrump) {
                var n = parseInt(e, 10);
                if (isNaN(n) || n < 0 || n >= i.slides.length)
                    return void i.API.log("goto: invalid slide index: " + n);
                if (n == i.currSlide)
                    return void i.API.log("goto: skipping, already on slide", n);
                i.nextSlide = n,
                clearTimeout(i.timeoutId),
                i.timeoutId = 0,
                i.API.log("goto: ", n, " (zero-index)"),
                t = i.currSlide < i.nextSlide,
                i.API.prepareTx(!0, t)
            }
        },
        stop: function() {
            var t = this.opts()
              , i = t.container;
            clearTimeout(t.timeoutId),
            t.timeoutId = 0,
            t.API.stopTransition(),
            t.pauseOnHover && (t.pauseOnHover !== !0 && (i = e(t.pauseOnHover)),
            i.off("mouseenter mouseleave")),
            t.API.trigger("cycle-stopped", [t]).log("cycle-stopped")
        },
        reinit: function() {
            var e = this.opts();
            e.API.destroy(),
            e.container.cycle()
        },
        remove: function(t) {
            for (var i, n, s = this.opts(), o = [], a = 1, r = 0; r < s.slides.length; r++)
                i = s.slides[r],
                r == t ? n = i : (o.push(i),
                e(i).data("cycle.opts").slideNum = a,
                a++);
            n && (s.slides = e(o),
            s.slideCount--,
            e(n).remove(),
            t == s.currSlide ? s.API.advanceSlide(1) : t < s.currSlide ? s.currSlide-- : s.currSlide++,
            s.API.trigger("cycle-slide-removed", [s, t, n]).log("cycle-slide-removed"),
            s.API.updateView())
        }
    }),
    e(document).on("click.cycle", "[data-cycle-cmd]", function(t) {
        t.preventDefault();
        var i = e(this)
          , n = i.data("cycle-cmd")
          , s = i.data("cycle-context") || ".cycle-slideshow";
        e(s).cycle(n, i.data("cycle-arg"))
    })
}(jQuery),
function(e) {
    "use strict";
    function t(t, i) {
        var n;
        return t._hashFence ? void (t._hashFence = !1) : (n = window.location.hash.substring(1),
        void t.slides.each(function(s) {
            if (e(this).data("cycle-hash") == n) {
                if (i === !0)
                    t.startingSlide = s;
                else {
                    var o = t.currSlide < s;
                    t.nextSlide = s,
                    t.API.prepareTx(!0, o)
                }
                return !1
            }
        }))
    }
    e(document).on("cycle-pre-initialize", function(i, n) {
        t(n, !0),
        n._onHashChange = function() {
            t(n, !1)
        }
        ,
        e(window).on("hashchange", n._onHashChange)
    }),
    e(document).on("cycle-update-view", function(e, t, i) {
        i.hash && "#" + i.hash != window.location.hash && (t._hashFence = !0,
        window.location.hash = i.hash)
    }),
    e(document).on("cycle-destroyed", function(t, i) {
        i._onHashChange && e(window).off("hashchange", i._onHashChange)
    })
}(jQuery),
function(e) {
    "use strict";
    e.extend(e.fn.cycle.defaults, {
        loader: !1
    }),
    e(document).on("cycle-bootstrap", function(t, i) {
        function n(t, n) {
            function o(t) {
                var o;
                "wait" == i.loader ? (r.push(t),
                0 === c && (r.sort(a),
                s.apply(i.API, [r, n]),
                i.container.removeClass("cycle-loading"))) : (o = e(i.slides[i.currSlide]),
                s.apply(i.API, [t, n]),
                o.show(),
                i.container.removeClass("cycle-loading"))
            }
            function a(e, t) {
                return e.data("index") - t.data("index")
            }
            var r = [];
            if ("string" == e.type(t))
                t = e.trim(t);
            else if ("array" === e.type(t))
                for (var l = 0; l < t.length; l++)
                    t[l] = e(t[l])[0];
            t = e(t);
            var c = t.length;
            c && (t.css("visibility", "hidden").appendTo("body").each(function(t) {
                function a() {
                    0 === --l && (--c,
                    o(d))
                }
                var l = 0
                  , d = e(this)
                  , u = d.is("img") ? d : d.find("img");
                return d.data("index", t),
                u = u.filter(":not(.cycle-loader-ignore)").filter(':not([src=""])'),
                u.length ? (l = u.length,
                void u.each(function() {
                    this.complete ? a() : e(this).load(function() {
                        a()
                    }).on("error", function() {
                        0 === --l && (i.API.log("slide skipped; img not loaded:", this.src),
                        0 === --c && "wait" == i.loader && s.apply(i.API, [r, n]))
                    })
                })) : (--c,
                void r.push(d))
            }),
            c && i.container.addClass("cycle-loading"))
        }
        var s;
        i.loader && (s = i.API.add,
        i.API.add = n)
    })
}(jQuery),
function(e) {
    "use strict";
    function t(t, i, n) {
        var s, o = t.API.getComponent("pager");
        o.each(function() {
            var o = e(this);
            if (i.pagerTemplate) {
                var a = t.API.tmpl(i.pagerTemplate, i, t, n[0]);
                s = e(a).appendTo(o)
            } else
                s = o.children().eq(t.slideCount - 1);
            s.on(t.pagerEvent, function(e) {
                e.preventDefault(),
                t.API.page(o, e.currentTarget)
            })
        })
    }
    function i(e, t) {
        var i = this.opts();
        if (!i.busy || i.manualTrump) {
            var n = e.children().index(t)
              , s = n
              , o = i.currSlide < s;
            i.currSlide != s && (i.nextSlide = s,
            i.API.prepareTx(!0, o),
            i.API.trigger("cycle-pager-activated", [i, e, t]))
        }
    }
    e.extend(e.fn.cycle.defaults, {
        pager: "> .cycle-pager",
        pagerActiveClass: "cycle-pager-active",
        pagerEvent: "click.cycle",
        pagerTemplate: "<span>&bull;</span>"
    }),
    e(document).on("cycle-bootstrap", function(e, i, n) {
        n.buildPagerLink = t
    }),
    e(document).on("cycle-slide-added", function(e, t, n, s) {
        t.pager && (t.API.buildPagerLink(t, n, s),
        t.API.page = i)
    }),
    e(document).on("cycle-slide-removed", function(t, i, n) {
        if (i.pager) {
            var s = i.API.getComponent("pager");
            s.each(function() {
                var t = e(this);
                e(t.children()[n]).remove()
            })
        }
    }),
    e(document).on("cycle-update-view", function(t, i) {
        var n;
        i.pager && (n = i.API.getComponent("pager"),
        n.each(function() {
            e(this).children().removeClass(i.pagerActiveClass).eq(i.currSlide).addClass(i.pagerActiveClass)
        }))
    }),
    e(document).on("cycle-destroyed", function(e, t) {
        var i = t.API.getComponent("pager");
        i && (i.children().off(t.pagerEvent),
        t.pagerTemplate && i.empty())
    })
}(jQuery),
function(e) {
    "use strict";
    e.extend(e.fn.cycle.defaults, {
        next: "> .cycle-next",
        nextEvent: "click.cycle",
        disabledClass: "disabled",
        prev: "> .cycle-prev",
        prevEvent: "click.cycle",
        swipe: !1
    }),
    e(document).on("cycle-initialized", function(e, t) {
        if (t.API.getComponent("next").on(t.nextEvent, function(e) {
            e.preventDefault(),
            t.API.next()
        }),
        t.API.getComponent("prev").on(t.prevEvent, function(e) {
            e.preventDefault(),
            t.API.prev()
        }),
        t.swipe) {
            var i = t.swipeVert ? "swipeUp.cycle" : "swipeLeft.cycle swipeleft.cycle"
              , n = t.swipeVert ? "swipeDown.cycle" : "swipeRight.cycle swiperight.cycle";
            t.container.on(i, function() {
                t.API.next()
            }),
            t.container.on(n, function() {
                t.API.prev()
            })
        }
    }),
    e(document).on("cycle-update-view", function(e, t) {
        if (!t.allowWrap) {
            var i = t.disabledClass
              , n = t.API.getComponent("next")
              , s = t.API.getComponent("prev")
              , o = t._prevBoundry || 0
              , a = void 0 !== t._nextBoundry ? t._nextBoundry : t.slideCount - 1;
            t.currSlide == a ? n.addClass(i).prop("disabled", !0) : n.removeClass(i).prop("disabled", !1),
            t.currSlide === o ? s.addClass(i).prop("disabled", !0) : s.removeClass(i).prop("disabled", !1)
        }
    }),
    e(document).on("cycle-destroyed", function(e, t) {
        t.API.getComponent("prev").off(t.nextEvent),
        t.API.getComponent("next").off(t.prevEvent),
        t.container.off("swipeleft.cycle swiperight.cycle swipeLeft.cycle swipeRight.cycle swipeUp.cycle swipeDown.cycle")
    })
}(jQuery),
function(e) {
    "use strict";
    e.extend(e.fn.cycle.defaults, {
        progressive: !1
    }),
    e(document).on("cycle-pre-initialize", function(t, i) {
        if (i.progressive) {
            var n, s, o = i.API, a = o.next, r = o.prev, l = o.prepareTx, c = e.type(i.progressive);
            if ("array" == c)
                n = i.progressive;
            else if (e.isFunction(i.progressive))
                n = i.progressive(i);
            else if ("string" == c) {
                if (s = e(i.progressive),
                n = e.trim(s.html()),
                !n)
                    return;
                if (/^(\[)/.test(n))
                    try {
                        n = e.parseJSON(n)
                    } catch (e) {
                        return void o.log("error parsing progressive slides", e)
                    }
                else
                    n = n.split(new RegExp(s.data("cycle-split") || "\n")),
                    n[n.length - 1] || n.pop()
            }
            l && (o.prepareTx = function(e, t) {
                var s, o;
                return e || 0 === n.length ? void l.apply(i.API, [e, t]) : void (t && i.currSlide == i.slideCount - 1 ? (o = n[0],
                n = n.slice(1),
                i.container.one("cycle-slide-added", function(e, t) {
                    setTimeout(function() {
                        t.API.advanceSlide(1)
                    }, 50)
                }),
                i.API.add(o)) : t || 0 !== i.currSlide ? l.apply(i.API, [e, t]) : (s = n.length - 1,
                o = n[s],
                n = n.slice(0, s),
                i.container.one("cycle-slide-added", function(e, t) {
                    setTimeout(function() {
                        t.currSlide = 1,
                        t.API.advanceSlide(-1)
                    }, 50)
                }),
                i.API.add(o, !0)))
            }
            ),
            a && (o.next = function() {
                var e = this.opts();
                if (n.length && e.currSlide == e.slideCount - 1) {
                    var t = n[0];
                    n = n.slice(1),
                    e.container.one("cycle-slide-added", function(e, t) {
                        a.apply(t.API),
                        t.container.removeClass("cycle-loading")
                    }),
                    e.container.addClass("cycle-loading"),
                    e.API.add(t)
                } else
                    a.apply(e.API)
            }
            ),
            r && (o.prev = function() {
                var e = this.opts();
                if (n.length && 0 === e.currSlide) {
                    var t = n.length - 1
                      , i = n[t];
                    n = n.slice(0, t),
                    e.container.one("cycle-slide-added", function(e, t) {
                        t.currSlide = 1,
                        t.API.advanceSlide(-1),
                        t.container.removeClass("cycle-loading")
                    }),
                    e.container.addClass("cycle-loading"),
                    e.API.add(i, !0)
                } else
                    r.apply(e.API)
            }
            )
        }
    })
}(jQuery),
function(e) {
    "use strict";
    e.extend(e.fn.cycle.defaults, {
        tmplRegex: "{{((.)?.*?)}}"
    }),
    e.extend(e.fn.cycle.API, {
        tmpl: function(t, i) {
            var n = new RegExp(i.tmplRegex || e.fn.cycle.defaults.tmplRegex,"g")
              , s = e.makeArray(arguments);
            return s.shift(),
            t.replace(n, function(t, i) {
                var n, o, a, r, l = i.split(".");
                for (n = 0; n < s.length; n++)
                    if (a = s[n]) {
                        if (l.length > 1)
                            for (r = a,
                            o = 0; o < l.length; o++)
                                a = r,
                                r = r[l[o]] || i;
                        else
                            r = a[i];
                        if (e.isFunction(r))
                            return r.apply(a, s);
                        if (void 0 !== r && null !== r && r != i)
                            return r
                    }
                return i
            })
        }
    })
}(jQuery),
function(e) {
    "use strict";
    "ontouchend"in document;
    e.event.special.swipe = e.event.special.swipe || {
        scrollSupressionThreshold: 10,
        durationThreshold: 1e3,
        horizontalDistanceThreshold: 30,
        verticalDistanceThreshold: 75,
        setup: function() {
            var t = e(this);
            t.bind("touchstart", function(i) {
                function n(t) {
                    if (a) {
                        var i = t.originalEvent.touches ? t.originalEvent.touches[0] : t;
                        s = {
                            time: (new Date).getTime(),
                            coords: [i.pageX, i.pageY]
                        },
                        Math.abs(a.coords[0] - s.coords[0]) > e.event.special.swipe.scrollSupressionThreshold && t.preventDefault()
                    }
                }
                var s, o = i.originalEvent.touches ? i.originalEvent.touches[0] : i, a = {
                    time: (new Date).getTime(),
                    coords: [o.pageX, o.pageY],
                    origin: e(i.target)
                };
                t.bind("touchmove", n).one("touchend", function() {
                    t.unbind("touchmove", n),
                    a && s && s.time - a.time < e.event.special.swipe.durationThreshold && Math.abs(a.coords[0] - s.coords[0]) > e.event.special.swipe.horizontalDistanceThreshold && Math.abs(a.coords[1] - s.coords[1]) < e.event.special.swipe.verticalDistanceThreshold && a.origin.trigger("swipe").trigger(a.coords[0] > s.coords[0] ? "swipeleft" : "swiperight"),
                    a = s = void 0
                })
            })
        }
    },
    e.event.special.swipeleft = e.event.special.swipeleft || {
        setup: function() {
            e(this).bind("swipe", e.noop)
        }
    },
    e.event.special.swiperight = e.event.special.swiperight || e.event.special.swipeleft
}(jQuery),
function(e, t) {
    "use strict";
    var i, n = e.document, s = e.Modernizr, o = function(e) {
        return e.charAt(0).toUpperCase() + e.slice(1)
    }, a = "Moz Webkit O Ms".split(" "), r = function(e) {
        var t, i = n.documentElement.style;
        if ("string" == typeof i[e])
            return e;
        e = o(e);
        for (var s = 0, r = a.length; s < r; s++)
            if (t = a[s] + e,
            "string" == typeof i[t])
                return t
    }, l = r("transform"), c = r("transitionProperty"), d = {
        csstransforms: function() {
            return !!l
        },
        csstransforms3d: function() {
            var e = !!r("perspective");
            if (e) {
                var i = " -o- -moz- -ms- -webkit- -khtml- ".split(" ")
                  , n = "@media (" + i.join("transform-3d),(") + "modernizr)"
                  , s = t("<style>" + n + "{#modernizr{height:3px}}</style>").appendTo("head")
                  , o = t('<div id="modernizr" />').appendTo("html");
                e = 3 === o.height(),
                o.remove(),
                s.remove()
            }
            return e
        },
        csstransitions: function() {
            return !!c
        }
    };
    if (s)
        for (i in d)
            s.hasOwnProperty(i) || s.addTest(i, d[i]);
    else {
        s = e.Modernizr = {
            _version: "1.6ish: miniModernizr for Isotope"
        };
        var u, h = " ";
        for (i in d)
            u = d[i](),
            s[i] = u,
            h += " " + (u ? "" : "no-") + i;
        t("html").addClass(h)
    }
    if (s.csstransforms) {
        var f = s.csstransforms3d ? {
            translate: function(e) {
                return "translate3d(" + e[0] + "px, " + e[1] + "px, 0) "
            },
            scale: function(e) {
                return "scale3d(" + e + ", " + e + ", 1) "
            }
        } : {
            translate: function(e) {
                return "translate(" + e[0] + "px, " + e[1] + "px) "
            },
            scale: function(e) {
                return "scale(" + e + ") "
            }
        }
          , p = function(e, i, n) {
            var s, o, a = t.data(e, "isoTransform") || {}, r = {}, c = {};
            r[i] = n,
            t.extend(a, r);
            for (s in a)
                o = a[s],
                c[s] = f[s](o);
            var d = c.translate || ""
              , u = c.scale || ""
              , h = d + u;
            t.data(e, "isoTransform", a),
            e.style[l] = h
        };
        t.cssNumber.scale = !0,
        t.cssHooks.scale = {
            set: function(e, t) {
                p(e, "scale", t)
            },
            get: function(e) {
                var i = t.data(e, "isoTransform");
                return i && i.scale ? i.scale : 1
            }
        },
        t.fx.step.scale = function(e) {
            t.cssHooks.scale.set(e.elem, e.now + e.unit)
        }
        ,
        t.cssNumber.translate = !0,
        t.cssHooks.translate = {
            set: function(e, t) {
                p(e, "translate", t)
            },
            get: function(e) {
                var i = t.data(e, "isoTransform");
                return i && i.translate ? i.translate : [0, 0]
            }
        }
    }
    var m, g;
    s.csstransitions && (m = {
        WebkitTransitionProperty: "webkitTransitionEnd",
        MozTransitionProperty: "transitionend",
        OTransitionProperty: "oTransitionEnd otransitionend",
        transitionProperty: "transitionend"
    }[c],
    g = r("transitionDuration"));
    var y, v = t.event, w = t.event.handle ? "handle" : "dispatch";
    v.special.smartresize = {
        setup: function() {
            t(this).bind("resize", v.special.smartresize.handler)
        },
        teardown: function() {
            t(this).unbind("resize", v.special.smartresize.handler)
        },
        handler: function(e, t) {
            var i = this
              , n = arguments;
            e.type = "smartresize",
            y && clearTimeout(y),
            y = setTimeout(function() {
                v[w].apply(i, n)
            }, "execAsap" === t ? 0 : 100)
        }
    },
    t.fn.smartresize = function(e) {
        return e ? this.bind("smartresize", e) : this.trigger("smartresize", ["execAsap"])
    }
    ,
    t.Isotope = function(e, i, n) {
        this.element = t(i),
        this._create(e),
        this._init(n)
    }
    ;
    var A = ["width", "height"]
      , _ = t(e);
    t.Isotope.settings = {
        resizable: !0,
        layoutMode: "masonry",
        containerClass: "isotope",
        itemClass: "isotope-item",
        hiddenClass: "isotope-hidden",
        hiddenStyle: {
            opacity: 0,
            scale: .001
        },
        visibleStyle: {
            opacity: 1,
            scale: 1
        },
        containerStyle: {
            position: "relative",
            overflow: "hidden"
        },
        animationEngine: "best-available",
        animationOptions: {
            queue: !1,
            duration: 800
        },
        sortBy: "original-order",
        sortAscending: !0,
        resizesContainer: !0,
        transformsEnabled: !0,
        itemPositionDataEnabled: !1
    },
    t.Isotope.prototype = {
        _create: function(e) {
            this.options = t.extend({}, t.Isotope.settings, e),
            this.styleQueue = [],
            this.elemCount = 0;
            var i = this.element[0].style;
            this.originalStyle = {};
            var n = A.slice(0);
            for (var s in this.options.containerStyle)
                n.push(s);
            for (var o = 0, a = n.length; o < a; o++)
                s = n[o],
                this.originalStyle[s] = i[s] || "";
            this.element.css(this.options.containerStyle),
            this._updateAnimationEngine(),
            this._updateUsingTransforms();
            var r = {
                "original-order": function(e, t) {
                    return t.elemCount++,
                    t.elemCount
                },
                random: function() {
                    return Math.random()
                }
            };
            this.options.getSortData = t.extend(this.options.getSortData, r),
            this.reloadItems(),
            this.offset = {
                left: parseInt(this.element.css("padding-left") || 0, 10),
                top: parseInt(this.element.css("padding-top") || 0, 10)
            };
            var l = this;
            setTimeout(function() {
                l.element.addClass(l.options.containerClass)
            }, 0),
            this.options.resizable && _.bind("smartresize.isotope", function() {
                l.resize()
            }),
            this.element.delegate("." + this.options.hiddenClass, "click", function() {
                return !1
            })
        },
        _getAtoms: function(e) {
            var t = this.options.itemSelector
              , i = t ? e.filter(t).add(e.find(t)) : e
              , n = {
                position: "absolute"
            };
            return i = i.filter(function(e, t) {
                return 1 === t.nodeType
            }),
            this.usingTransforms && (n.left = 0,
            n.top = 0),
            i.css(n).addClass(this.options.itemClass),
            this.updateSortData(i, !0),
            i
        },
        _init: function(e) {
            this.$filteredAtoms = this._filter(this.$allAtoms),
            this._sort(),
            this.reLayout(e)
        },
        option: function(e) {
            if (t.isPlainObject(e)) {
                this.options = t.extend(!0, this.options, e);
                var i;
                for (var n in e)
                    i = "_update" + o(n),
                    this[i] && this[i]()
            }
        },
        _updateAnimationEngine: function() {
            var e, t = this.options.animationEngine.toLowerCase().replace(/[ _\-]/g, "");
            switch (t) {
            case "css":
            case "none":
                e = !1;
                break;
            case "jquery":
                e = !0;
                break;
            default:
                e = !s.csstransitions
            }
            this.isUsingJQueryAnimation = e,
            this._updateUsingTransforms()
        },
        _updateTransformsEnabled: function() {
            this._updateUsingTransforms()
        },
        _updateUsingTransforms: function() {
            var e = this.usingTransforms = this.options.transformsEnabled && s.csstransforms && s.csstransitions && !this.isUsingJQueryAnimation;
            e || (delete this.options.hiddenStyle.scale,
            delete this.options.visibleStyle.scale),
            this.getPositionStyles = e ? this._translate : this._positionAbs
        },
        _filter: function(e) {
            var t = "" === this.options.filter ? "*" : this.options.filter;
            if (!t)
                return e;
            var i = this.options.hiddenClass
              , n = "." + i
              , s = e.filter(n)
              , o = s;
            if ("*" !== t) {
                o = s.filter(t);
                var a = e.not(n).not(t).addClass(i);
                this.styleQueue.push({
                    $el: a,
                    style: this.options.hiddenStyle
                })
            }
            return this.styleQueue.push({
                $el: o,
                style: this.options.visibleStyle
            }),
            o.removeClass(i),
            e.filter(t)
        },
        updateSortData: function(e, i) {
            var n, s, o = this, a = this.options.getSortData;
            e.each(function() {
                n = t(this),
                s = {};
                for (var e in a)
                    i || "original-order" !== e ? s[e] = a[e](n, o) : s[e] = t.data(this, "isotope-sort-data")[e];
                t.data(this, "isotope-sort-data", s)
            })
        },
        _sort: function() {
            var e = this.options.sortBy
              , t = this._getSorter
              , i = this.options.sortAscending ? 1 : -1
              , n = function(n, s) {
                var o = t(n, e)
                  , a = t(s, e);
                return o === a && "original-order" !== e && (o = t(n, "original-order"),
                a = t(s, "original-order")),
                (o > a ? 1 : o < a ? -1 : 0) * i
            };
            this.$filteredAtoms.sort(n)
        },
        _getSorter: function(e, i) {
            return t.data(e, "isotope-sort-data")[i]
        },
        _translate: function(e, t) {
            return {
                translate: [e, t]
            }
        },
        _positionAbs: function(e, t) {
            return {
                left: e,
                top: t
            }
        },
        _pushPosition: function(e, t, i) {
            t = Math.round(t + this.offset.left),
            i = Math.round(i + this.offset.top);
            var n = this.getPositionStyles(t, i);
            this.styleQueue.push({
                $el: e,
                style: n
            }),
            this.options.itemPositionDataEnabled && e.data("isotope-item-position", {
                x: t,
                y: i
            })
        },
        layout: function(e, t) {
            var i = this.options.layoutMode;
            if (this["_" + i + "Layout"](e),
            this.options.resizesContainer) {
                var n = this["_" + i + "GetContainerSize"]();
                this.styleQueue.push({
                    $el: this.element,
                    style: n
                })
            }
            this._processStyleQueue(e, t),
            this.isLaidOut = !0
        },
        _processStyleQueue: function(e, i) {
            var n, o, a, r, l = this.isLaidOut && this.isUsingJQueryAnimation ? "animate" : "css", c = this.options.animationOptions, d = this.options.onLayout;
            if (o = function(e, t) {
                t.$el[l](t.style, c)
            }
            ,
            this._isInserting && this.isUsingJQueryAnimation)
                o = function(e, t) {
                    n = t.$el.hasClass("no-transition") ? "css" : l,
                    t.$el[n](t.style, c)
                }
                ;
            else if (i || d || c.complete) {
                var u = !1
                  , h = [i, d, c.complete]
                  , f = this;
                if (a = !0,
                r = function() {
                    if (!u) {
                        for (var t, i = 0, n = h.length; i < n; i++)
                            t = h[i],
                            "function" == typeof t && t.call(f.element, e, f);
                        u = !0
                    }
                }
                ,
                this.isUsingJQueryAnimation && "animate" === l)
                    c.complete = r,
                    a = !1;
                else if (s.csstransitions) {
                    for (var p, y = 0, v = this.styleQueue[0], w = v && v.$el; !w || !w.length; ) {
                        if (p = this.styleQueue[y++],
                        !p)
                            return;
                        w = p.$el
                    }
                    var A = parseFloat(getComputedStyle(w[0])[g]);
                    A > 0 && (o = function(e, t) {
                        t.$el[l](t.style, c).one(m, r)
                    }
                    ,
                    a = !1)
                }
            }
            t.each(this.styleQueue, o),
            a && r(),
            this.styleQueue = []
        },
        resize: function() {
            this["_" + this.options.layoutMode + "ResizeChanged"]() && this.reLayout()
        },
        reLayout: function(e) {
            this["_" + this.options.layoutMode + "Reset"](),
            this.layout(this.$filteredAtoms, e)
        },
        addItems: function(e, t) {
            var i = this._getAtoms(e);
            this.$allAtoms = this.$allAtoms.add(i),
            t && t(i)
        },
        insert: function(e, t) {
            this.element.append(e);
            var i = this;
            this.addItems(e, function(e) {
                var n = i._filter(e);
                i._addHideAppended(n),
                i._sort(),
                i.reLayout(),
                i._revealAppended(n, t)
            })
        },
        appended: function(e, t) {
            var i = this;
            this.addItems(e, function(e) {
                i._addHideAppended(e),
                i.layout(e),
                i._revealAppended(e, t)
            })
        },
        _addHideAppended: function(e) {
            this.$filteredAtoms = this.$filteredAtoms.add(e),
            e.addClass("no-transition"),
            this._isInserting = !0,
            this.styleQueue.push({
                $el: e,
                style: this.options.hiddenStyle
            })
        },
        _revealAppended: function(e, t) {
            var i = this;
            setTimeout(function() {
                e.removeClass("no-transition"),
                i.styleQueue.push({
                    $el: e,
                    style: i.options.visibleStyle
                }),
                i._isInserting = !1,
                i._processStyleQueue(e, t)
            }, 10)
        },
        reloadItems: function() {
            this.$allAtoms = this._getAtoms(this.element.children())
        },
        remove: function(e, t) {
            this.$allAtoms = this.$allAtoms.not(e),
            this.$filteredAtoms = this.$filteredAtoms.not(e);
            var i = this
              , n = function() {
                e.remove(),
                t && t.call(i.element)
            };
            e.filter(":not(." + this.options.hiddenClass + ")").length ? (this.styleQueue.push({
                $el: e,
                style: this.options.hiddenStyle
            }),
            this._sort(),
            this.reLayout(n)) : n()
        },
        shuffle: function(e) {
            this.updateSortData(this.$allAtoms),
            this.options.sortBy = "random",
            this._sort(),
            this.reLayout(e)
        },
        destroy: function() {
            var e = this.usingTransforms
              , t = this.options;
            this.$allAtoms.removeClass(t.hiddenClass + " " + t.itemClass).each(function() {
                var t = this.style;
                t.position = "",
                t.top = "",
                t.left = "",
                t.opacity = "",
                e && (t[l] = "")
            });
            var i = this.element[0].style;
            for (var n in this.originalStyle)
                i[n] = this.originalStyle[n];
            this.element.unbind(".isotope").undelegate("." + t.hiddenClass, "click").removeClass(t.containerClass).removeData("isotope"),
            _.unbind(".isotope")
        },
        _getSegments: function(e) {
            var t, i = this.options.layoutMode, n = e ? "rowHeight" : "columnWidth", s = e ? "height" : "width", a = e ? "rows" : "cols", r = this.element[s](), l = this.options[i] && this.options[i][n] || this.$filteredAtoms["outer" + o(s)](!0) || r;
            t = Math.floor(r / l),
            t = Math.max(t, 1),
            this[i][a] = t,
            this[i][n] = l
        },
        _checkIfSegmentsChanged: function(e) {
            var t = this.options.layoutMode
              , i = e ? "rows" : "cols"
              , n = this[t][i];
            return this._getSegments(e),
            this[t][i] !== n
        },
        _masonryReset: function() {
            this.masonry = {},
            this._getSegments();
            var e = this.masonry.cols;
            for (this.masonry.colYs = []; e--; )
                this.masonry.colYs.push(0)
        },
        _masonryLayout: function(e) {
            var i = this
              , n = i.masonry;
            e.each(function() {
                var e = t(this)
                  , s = Math.ceil(e.outerWidth(!0) / n.columnWidth);
                if (s = Math.min(s, n.cols),
                1 === s)
                    i._masonryPlaceBrick(e, n.colYs);
                else {
                    var o, a, r = n.cols + 1 - s, l = [];
                    for (a = 0; a < r; a++)
                        o = n.colYs.slice(a, a + s),
                        l[a] = Math.max.apply(Math, o);
                    i._masonryPlaceBrick(e, l)
                }
            })
        },
        _masonryPlaceBrick: function(e, t) {
            for (var i = Math.min.apply(Math, t), n = 0, s = 0, o = t.length; s < o; s++)
                if (t[s] === i) {
                    n = s;
                    break
                }
            var a = this.masonry.columnWidth * n
              , r = i;
            this._pushPosition(e, a, r);
            var l = i + e.outerHeight(!0)
              , c = this.masonry.cols + 1 - o;
            for (s = 0; s < c; s++)
                this.masonry.colYs[n + s] = l
        },
        _masonryGetContainerSize: function() {
            var e = Math.max.apply(Math, this.masonry.colYs);
            return {
                height: e
            }
        },
        _masonryResizeChanged: function() {
            return this._checkIfSegmentsChanged()
        },
        _fitRowsReset: function() {
            this.fitRows = {
                x: 0,
                y: 0,
                height: 0
            }
        },
        _fitRowsLayout: function(e) {
            var i = this
              , n = this.element.width()
              , s = this.fitRows;
            e.each(function() {
                var e = t(this)
                  , o = e.outerWidth(!0)
                  , a = e.outerHeight(!0);
                0 !== s.x && o + s.x > n && (s.x = 0,
                s.y = s.height),
                i._pushPosition(e, s.x, s.y),
                s.height = Math.max(s.y + a, s.height),
                s.x += o
            })
        },
        _fitRowsGetContainerSize: function() {
            return {
                height: this.fitRows.height
            }
        },
        _fitRowsResizeChanged: function() {
            return !0
        },
        _cellsByRowReset: function() {
            this.cellsByRow = {
                index: 0
            },
            this._getSegments(),
            this._getSegments(!0)
        },
        _cellsByRowLayout: function(e) {
            var i = this
              , n = this.cellsByRow;
            e.each(function() {
                var e = t(this)
                  , s = n.index % n.cols
                  , o = Math.floor(n.index / n.cols)
                  , a = (s + .5) * n.columnWidth - e.outerWidth(!0) / 2
                  , r = (o + .5) * n.rowHeight - e.outerHeight(!0) / 2;
                i._pushPosition(e, a, r),
                n.index++
            })
        },
        _cellsByRowGetContainerSize: function() {
            return {
                height: Math.ceil(this.$filteredAtoms.length / this.cellsByRow.cols) * this.cellsByRow.rowHeight + this.offset.top
            }
        },
        _cellsByRowResizeChanged: function() {
            return this._checkIfSegmentsChanged()
        },
        _straightDownReset: function() {
            this.straightDown = {
                y: 0
            }
        },
        _straightDownLayout: function(e) {
            var i = this;
            e.each(function() {
                var e = t(this);
                i._pushPosition(e, 0, i.straightDown.y),
                i.straightDown.y += e.outerHeight(!0)
            })
        },
        _straightDownGetContainerSize: function() {
            return {
                height: this.straightDown.y
            }
        },
        _straightDownResizeChanged: function() {
            return !0
        },
        _masonryHorizontalReset: function() {
            this.masonryHorizontal = {},
            this._getSegments(!0);
            var e = this.masonryHorizontal.rows;
            for (this.masonryHorizontal.rowXs = []; e--; )
                this.masonryHorizontal.rowXs.push(0)
        },
        _masonryHorizontalLayout: function(e) {
            var i = this
              , n = i.masonryHorizontal;
            e.each(function() {
                var e = t(this)
                  , s = Math.ceil(e.outerHeight(!0) / n.rowHeight);
                if (s = Math.min(s, n.rows),
                1 === s)
                    i._masonryHorizontalPlaceBrick(e, n.rowXs);
                else {
                    var o, a, r = n.rows + 1 - s, l = [];
                    for (a = 0; a < r; a++)
                        o = n.rowXs.slice(a, a + s),
                        l[a] = Math.max.apply(Math, o);
                    i._masonryHorizontalPlaceBrick(e, l)
                }
            })
        },
        _masonryHorizontalPlaceBrick: function(e, t) {
            for (var i = Math.min.apply(Math, t), n = 0, s = 0, o = t.length; s < o; s++)
                if (t[s] === i) {
                    n = s;
                    break
                }
            var a = i
              , r = this.masonryHorizontal.rowHeight * n;
            this._pushPosition(e, a, r);
            var l = i + e.outerWidth(!0)
              , c = this.masonryHorizontal.rows + 1 - o;
            for (s = 0; s < c; s++)
                this.masonryHorizontal.rowXs[n + s] = l
        },
        _masonryHorizontalGetContainerSize: function() {
            var e = Math.max.apply(Math, this.masonryHorizontal.rowXs);
            return {
                width: e
            }
        },
        _masonryHorizontalResizeChanged: function() {
            return this._checkIfSegmentsChanged(!0)
        },
        _fitColumnsReset: function() {
            this.fitColumns = {
                x: 0,
                y: 0,
                width: 0
            }
        },
        _fitColumnsLayout: function(e) {
            var i = this
              , n = this.element.height()
              , s = this.fitColumns;
            e.each(function() {
                var e = t(this)
                  , o = e.outerWidth(!0)
                  , a = e.outerHeight(!0);
                0 !== s.y && a + s.y > n && (s.x = s.width,
                s.y = 0),
                i._pushPosition(e, s.x, s.y),
                s.width = Math.max(s.x + o, s.width),
                s.y += a
            })
        },
        _fitColumnsGetContainerSize: function() {
            return {
                width: this.fitColumns.width
            }
        },
        _fitColumnsResizeChanged: function() {
            return !0
        },
        _cellsByColumnReset: function() {
            this.cellsByColumn = {
                index: 0
            },
            this._getSegments(),
            this._getSegments(!0)
        },
        _cellsByColumnLayout: function(e) {
            var i = this
              , n = this.cellsByColumn;
            e.each(function() {
                var e = t(this)
                  , s = Math.floor(n.index / n.rows)
                  , o = n.index % n.rows
                  , a = (s + .5) * n.columnWidth - e.outerWidth(!0) / 2
                  , r = (o + .5) * n.rowHeight - e.outerHeight(!0) / 2;
                i._pushPosition(e, a, r),
                n.index++
            })
        },
        _cellsByColumnGetContainerSize: function() {
            return {
                width: Math.ceil(this.$filteredAtoms.length / this.cellsByColumn.rows) * this.cellsByColumn.columnWidth
            }
        },
        _cellsByColumnResizeChanged: function() {
            return this._checkIfSegmentsChanged(!0)
        },
        _straightAcrossReset: function() {
            this.straightAcross = {
                x: 0
            }
        },
        _straightAcrossLayout: function(e) {
            var i = this;
            e.each(function() {
                var e = t(this);
                i._pushPosition(e, i.straightAcross.x, 0),
                i.straightAcross.x += e.outerWidth(!0)
            })
        },
        _straightAcrossGetContainerSize: function() {
            return {
                width: this.straightAcross.x
            }
        },
        _straightAcrossResizeChanged: function() {
            return !0
        }
    },
    t.fn.imagesLoaded = function(e) {
        function i() {
            e.call(s, o)
        }
        function n(e) {
            var s = e.target;
            s.src !== r && t.inArray(s, l) === -1 && (l.push(s),
            --a <= 0 && (setTimeout(i),
            o.unbind(".imagesLoaded", n)))
        }
        var s = this
          , o = s.find("img").add(s.filter("img"))
          , a = o.length
          , r = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
          , l = [];
        return a || i(),
        o.bind("load.imagesLoaded error.imagesLoaded", n).each(function() {
            var e = this.src;
            this.src = r,
            this.src = e
        }),
        s
    }
    ;
    var x = function(t) {
        e.console && e.console.error(t)
    };
    t.fn.isotope = function(e, i) {
        if ("string" == typeof e) {
            var n = Array.prototype.slice.call(arguments, 1);
            this.each(function() {
                var i = t.data(this, "isotope");
                return i ? t.isFunction(i[e]) && "_" !== e.charAt(0) ? void i[e].apply(i, n) : void x("no such method '" + e + "' for isotope instance") : void x("cannot call methods on isotope prior to initialization; attempted to call method '" + e + "'")
            })
        } else
            this.each(function() {
                var n = t.data(this, "isotope");
                n ? (n.option(e),
                n._init(i)) : t.data(this, "isotope", new t.Isotope(e,this,i))
            });
        return this
    }
}(window, jQuery),
function(e, t) {
    "use strict";
    var i, n = e.document, s = e.Modernizr, o = function(e) {
        return e.charAt(0).toUpperCase() + e.slice(1)
    }, a = "Moz Webkit O Ms".split(" "), r = function(e) {
        var t, i = n.documentElement.style;
        if ("string" == typeof i[e])
            return e;
        e = o(e);
        for (var s = 0, r = a.length; s < r; s++)
            if (t = a[s] + e,
            "string" == typeof i[t])
                return t
    }, l = r("transform"), c = r("transitionProperty"), d = {
        csstransforms: function() {
            return !!l
        },
        csstransforms3d: function() {
            var e = !!r("perspective");
            if (e) {
                var i = " -o- -moz- -ms- -webkit- -khtml- ".split(" ")
                  , n = "@media (" + i.join("transform-3d),(") + "modernizr)"
                  , s = t("<style>" + n + "{#modernizr{height:3px}}</style>").appendTo("head")
                  , o = t('<div id="modernizr" />').appendTo("html");
                e = 3 === o.height(),
                o.remove(),
                s.remove()
            }
            return e
        },
        csstransitions: function() {
            return !!c
        }
    };
    if (s)
        for (i in d)
            s.hasOwnProperty(i) || s.addTest(i, d[i]);
    else {
        s = e.Modernizr = {
            _version: "1.6ish: miniModernizr for Isotope"
        };
        var u, h = " ";
        for (i in d)
            u = d[i](),
            s[i] = u,
            h += " " + (u ? "" : "no-") + i;
        t("html").addClass(h)
    }
    if (s.csstransforms) {
        var f = s.csstransforms3d ? {
            translate: function(e) {
                return "translate3d(" + e[0] + "px, " + e[1] + "px, 0) "
            },
            scale: function(e) {
                return "scale3d(" + e + ", " + e + ", 1) "
            }
        } : {
            translate: function(e) {
                return "translate(" + e[0] + "px, " + e[1] + "px) "
            },
            scale: function(e) {
                return "scale(" + e + ") "
            }
        }
          , p = function(e, i, n) {
            var s, o, a = t.data(e, "isoTransform") || {}, r = {}, c = {};
            r[i] = n,
            t.extend(a, r);
            for (s in a)
                o = a[s],
                c[s] = f[s](o);
            var d = c.translate || ""
              , u = c.scale || ""
              , h = d + u;
            t.data(e, "isoTransform", a),
            e.style[l] = h
        };
        t.cssNumber.scale = !0,
        t.cssHooks.scale = {
            set: function(e, t) {
                p(e, "scale", t)
            },
            get: function(e) {
                var i = t.data(e, "isoTransform");
                return i && i.scale ? i.scale : 1
            }
        },
        t.fx.step.scale = function(e) {
            t.cssHooks.scale.set(e.elem, e.now + e.unit)
        }
        ,
        t.cssNumber.translate = !0,
        t.cssHooks.translate = {
            set: function(e, t) {
                p(e, "translate", t)
            },
            get: function(e) {
                var i = t.data(e, "isoTransform");
                return i && i.translate ? i.translate : [0, 0]
            }
        }
    }
    var m, g;
    s.csstransitions && (m = {
        WebkitTransitionProperty: "webkitTransitionEnd",
        MozTransitionProperty: "transitionend",
        OTransitionProperty: "oTransitionEnd otransitionend",
        transitionProperty: "transitionend"
    }[c],
    g = r("transitionDuration"));
    var y, v = t.event, w = t.event.handle ? "handle" : "dispatch";
    v.special.smartresize = {
        setup: function() {
            t(this).bind("resize", v.special.smartresize.handler)
        },
        teardown: function() {
            t(this).unbind("resize", v.special.smartresize.handler)
        },
        handler: function(e, t) {
            var i = this
              , n = arguments;
            e.type = "smartresize",
            y && clearTimeout(y),
            y = setTimeout(function() {
                v[w].apply(i, n)
            }, "execAsap" === t ? 0 : 100)
        }
    },
    t.fn.smartresize = function(e) {
        return e ? this.bind("smartresize", e) : this.trigger("smartresize", ["execAsap"])
    }
    ,
    t.Isotope = function(e, i, n) {
        this.element = t(i),
        this._create(e),
        this._init(n)
    }
    ;
    var A = ["width", "height"]
      , _ = t(e);
    t.Isotope.settings = {
        resizable: !0,
        layoutMode: "masonry",
        containerClass: "isotope",
        itemClass: "isotope-item",
        hiddenClass: "isotope-hidden",
        hiddenStyle: {
            opacity: 0,
            scale: .001
        },
        visibleStyle: {
            opacity: 1,
            scale: 1
        },
        containerStyle: {
            position: "relative",
            overflow: "hidden"
        },
        animationEngine: "best-available",
        animationOptions: {
            queue: !1,
            duration: 800
        },
        sortBy: "original-order",
        sortAscending: !0,
        resizesContainer: !0,
        transformsEnabled: !0,
        itemPositionDataEnabled: !1
    },
    t.Isotope.prototype = {
        _create: function(e) {
            this.options = t.extend({}, t.Isotope.settings, e),
            this.styleQueue = [],
            this.elemCount = 0;
            var i = this.element[0].style;
            this.originalStyle = {};
            var n = A.slice(0);
            for (var s in this.options.containerStyle)
                n.push(s);
            for (var o = 0, a = n.length; o < a; o++)
                s = n[o],
                this.originalStyle[s] = i[s] || "";
            this.element.css(this.options.containerStyle),
            this._updateAnimationEngine(),
            this._updateUsingTransforms();
            var r = {
                "original-order": function(e, t) {
                    return t.elemCount++,
                    t.elemCount
                },
                random: function() {
                    return Math.random()
                }
            };
            this.options.getSortData = t.extend(this.options.getSortData, r),
            this.reloadItems(),
            this.offset = {
                left: parseInt(this.element.css("padding-left") || 0, 10),
                top: parseInt(this.element.css("padding-top") || 0, 10)
            };
            var l = this;
            setTimeout(function() {
                l.element.addClass(l.options.containerClass)
            }, 0),
            this.options.resizable && _.bind("smartresize.isotope", function() {
                l.resize()
            }),
            this.element.delegate("." + this.options.hiddenClass, "click", function() {
                return !1
            })
        },
        _getAtoms: function(e) {
            var t = this.options.itemSelector
              , i = t ? e.filter(t).add(e.find(t)) : e
              , n = {
                position: "absolute"
            };
            return i = i.filter(function(e, t) {
                return 1 === t.nodeType
            }),
            this.usingTransforms && (n.left = 0,
            n.top = 0),
            i.css(n).addClass(this.options.itemClass),
            this.updateSortData(i, !0),
            i
        },
        _init: function(e) {
            this.$filteredAtoms = this._filter(this.$allAtoms),
            this._sort(),
            this.reLayout(e)
        },
        option: function(e) {
            if (t.isPlainObject(e)) {
                this.options = t.extend(!0, this.options, e);
                var i;
                for (var n in e)
                    i = "_update" + o(n),
                    this[i] && this[i]()
            }
        },
        _updateAnimationEngine: function() {
            var e, t = this.options.animationEngine.toLowerCase().replace(/[ _\-]/g, "");
            switch (t) {
            case "css":
            case "none":
                e = !1;
                break;
            case "jquery":
                e = !0;
                break;
            default:
                e = !s.csstransitions
            }
            this.isUsingJQueryAnimation = e,
            this._updateUsingTransforms()
        },
        _updateTransformsEnabled: function() {
            this._updateUsingTransforms()
        },
        _updateUsingTransforms: function() {
            var e = this.usingTransforms = this.options.transformsEnabled && s.csstransforms && s.csstransitions && !this.isUsingJQueryAnimation;
            e || (delete this.options.hiddenStyle.scale,
            delete this.options.visibleStyle.scale),
            this.getPositionStyles = e ? this._translate : this._positionAbs
        },
        _filter: function(e) {
            var t = "" === this.options.filter ? "*" : this.options.filter;
            if (!t)
                return e;
            var i = this.options.hiddenClass
              , n = "." + i
              , s = e.filter(n)
              , o = s;
            if ("*" !== t) {
                o = s.filter(t);
                var a = e.not(n).not(t).addClass(i);
                this.styleQueue.push({
                    $el: a,
                    style: this.options.hiddenStyle
                })
            }
            return this.styleQueue.push({
                $el: o,
                style: this.options.visibleStyle
            }),
            o.removeClass(i),
            e.filter(t)
        },
        updateSortData: function(e, i) {
            var n, s, o = this, a = this.options.getSortData;
            e.each(function() {
                n = t(this),
                s = {};
                for (var e in a)
                    i || "original-order" !== e ? s[e] = a[e](n, o) : s[e] = t.data(this, "isotope-sort-data")[e];
                t.data(this, "isotope-sort-data", s)
            })
        },
        _sort: function() {
            var e = this.options.sortBy
              , t = this._getSorter
              , i = this.options.sortAscending ? 1 : -1
              , n = function(n, s) {
                var o = t(n, e)
                  , a = t(s, e);
                return o === a && "original-order" !== e && (o = t(n, "original-order"),
                a = t(s, "original-order")),
                (o > a ? 1 : o < a ? -1 : 0) * i
            };
            this.$filteredAtoms.sort(n)
        },
        _getSorter: function(e, i) {
            return t.data(e, "isotope-sort-data")[i]
        },
        _translate: function(e, t) {
            return {
                translate: [e, t]
            }
        },
        _positionAbs: function(e, t) {
            return {
                left: e,
                top: t
            }
        },
        _pushPosition: function(e, t, i) {
            t = Math.round(t + this.offset.left),
            i = Math.round(i + this.offset.top);
            var n = this.getPositionStyles(t, i);
            this.styleQueue.push({
                $el: e,
                style: n
            }),
            this.options.itemPositionDataEnabled && e.data("isotope-item-position", {
                x: t,
                y: i
            })
        },
        layout: function(e, t) {
            var i = this.options.layoutMode;
            if (this["_" + i + "Layout"](e),
            this.options.resizesContainer) {
                var n = this["_" + i + "GetContainerSize"]();
                this.styleQueue.push({
                    $el: this.element,
                    style: n
                })
            }
            this._processStyleQueue(e, t),
            this.isLaidOut = !0
        },
        _processStyleQueue: function(e, i) {
            var n, o, a, r, l = this.isLaidOut && this.isUsingJQueryAnimation ? "animate" : "css", c = this.options.animationOptions, d = this.options.onLayout;
            if (o = function(e, t) {
                t.$el[l](t.style, c)
            }
            ,
            this._isInserting && this.isUsingJQueryAnimation)
                o = function(e, t) {
                    n = t.$el.hasClass("no-transition") ? "css" : l,
                    t.$el[n](t.style, c)
                }
                ;
            else if (i || d || c.complete) {
                var u = !1
                  , h = [i, d, c.complete]
                  , f = this;
                if (a = !0,
                r = function() {
                    if (!u) {
                        for (var t, i = 0, n = h.length; i < n; i++)
                            t = h[i],
                            "function" == typeof t && t.call(f.element, e, f);
                        u = !0
                    }
                }
                ,
                this.isUsingJQueryAnimation && "animate" === l)
                    c.complete = r,
                    a = !1;
                else if (s.csstransitions) {
                    for (var p, y = 0, v = this.styleQueue[0], w = v && v.$el; !w || !w.length; ) {
                        if (p = this.styleQueue[y++],
                        !p)
                            return;
                        w = p.$el
                    }
                    var A = parseFloat(getComputedStyle(w[0])[g]);
                    A > 0 && (o = function(e, t) {
                        t.$el[l](t.style, c).one(m, r)
                    }
                    ,
                    a = !1)
                }
            }
            t.each(this.styleQueue, o),
            a && r(),
            this.styleQueue = []
        },
        resize: function() {
            this["_" + this.options.layoutMode + "ResizeChanged"]() && this.reLayout()
        },
        reLayout: function(e) {
            this["_" + this.options.layoutMode + "Reset"](),
            this.layout(this.$filteredAtoms, e)
        },
        addItems: function(e, t) {
            var i = this._getAtoms(e);
            this.$allAtoms = this.$allAtoms.add(i),
            t && t(i)
        },
        insert: function(e, t) {
            this.element.append(e);
            var i = this;
            this.addItems(e, function(e) {
                var n = i._filter(e);
                i._addHideAppended(n),
                i._sort(),
                i.reLayout(),
                i._revealAppended(n, t)
            })
        },
        appended: function(e, t) {
            var i = this;
            this.addItems(e, function(e) {
                i._addHideAppended(e),
                i.layout(e),
                i._revealAppended(e, t)
            })
        },
        _addHideAppended: function(e) {
            this.$filteredAtoms = this.$filteredAtoms.add(e),
            e.addClass("no-transition"),
            this._isInserting = !0,
            this.styleQueue.push({
                $el: e,
                style: this.options.hiddenStyle
            })
        },
        _revealAppended: function(e, t) {
            var i = this;
            setTimeout(function() {
                e.removeClass("no-transition"),
                i.styleQueue.push({
                    $el: e,
                    style: i.options.visibleStyle
                }),
                i._isInserting = !1,
                i._processStyleQueue(e, t)
            }, 10)
        },
        reloadItems: function() {
            this.$allAtoms = this._getAtoms(this.element.children())
        },
        remove: function(e, t) {
            this.$allAtoms = this.$allAtoms.not(e),
            this.$filteredAtoms = this.$filteredAtoms.not(e);
            var i = this
              , n = function() {
                e.remove(),
                t && t.call(i.element)
            };
            e.filter(":not(." + this.options.hiddenClass + ")").length ? (this.styleQueue.push({
                $el: e,
                style: this.options.hiddenStyle
            }),
            this._sort(),
            this.reLayout(n)) : n()
        },
        shuffle: function(e) {
            this.updateSortData(this.$allAtoms),
            this.options.sortBy = "random",
            this._sort(),
            this.reLayout(e)
        },
        destroy: function() {
            var e = this.usingTransforms
              , t = this.options;
            this.$allAtoms.removeClass(t.hiddenClass + " " + t.itemClass).each(function() {
                var t = this.style;
                t.position = "",
                t.top = "",
                t.left = "",
                t.opacity = "",
                e && (t[l] = "")
            });
            var i = this.element[0].style;
            for (var n in this.originalStyle)
                i[n] = this.originalStyle[n];
            this.element.unbind(".isotope").undelegate("." + t.hiddenClass, "click").removeClass(t.containerClass).removeData("isotope"),
            _.unbind(".isotope")
        },
        _getSegments: function(e) {
            var t, i = this.options.layoutMode, n = e ? "rowHeight" : "columnWidth", s = e ? "height" : "width", a = e ? "rows" : "cols", r = this.element[s](), l = this.options[i] && this.options[i][n] || this.$filteredAtoms["outer" + o(s)](!0) || r;
            t = Math.floor(r / l),
            t = Math.max(t, 1),
            this[i][a] = t,
            this[i][n] = l
        },
        _checkIfSegmentsChanged: function(e) {
            var t = this.options.layoutMode
              , i = e ? "rows" : "cols"
              , n = this[t][i];
            return this._getSegments(e),
            this[t][i] !== n
        },
        _masonryReset: function() {
            this.masonry = {},
            this._getSegments();
            var e = this.masonry.cols;
            for (this.masonry.colYs = []; e--; )
                this.masonry.colYs.push(0)
        },
        _masonryLayout: function(e) {
            var i = this
              , n = i.masonry;
            e.each(function() {
                var e = t(this)
                  , s = Math.ceil(e.outerWidth(!0) / n.columnWidth);
                if (s = Math.min(s, n.cols),
                1 === s)
                    i._masonryPlaceBrick(e, n.colYs);
                else {
                    var o, a, r = n.cols + 1 - s, l = [];
                    for (a = 0; a < r; a++)
                        o = n.colYs.slice(a, a + s),
                        l[a] = Math.max.apply(Math, o);
                    i._masonryPlaceBrick(e, l)
                }
            })
        },
        _masonryPlaceBrick: function(e, t) {
            for (var i = Math.min.apply(Math, t), n = 0, s = 0, o = t.length; s < o; s++)
                if (t[s] === i) {
                    n = s;
                    break
                }
            var a = this.masonry.columnWidth * n
              , r = i;
            this._pushPosition(e, a, r);
            var l = i + e.outerHeight(!0)
              , c = this.masonry.cols + 1 - o;
            for (s = 0; s < c; s++)
                this.masonry.colYs[n + s] = l
        },
        _masonryGetContainerSize: function() {
            var e = Math.max.apply(Math, this.masonry.colYs);
            return {
                height: e
            }
        },
        _masonryResizeChanged: function() {
            return this._checkIfSegmentsChanged()
        },
        _fitRowsReset: function() {
            this.fitRows = {
                x: 0,
                y: 0,
                height: 0
            }
        },
        _fitRowsLayout: function(e) {
            var i = this
              , n = this.element.width()
              , s = this.fitRows;
            e.each(function() {
                var e = t(this)
                  , o = e.outerWidth(!0)
                  , a = e.outerHeight(!0);
                0 !== s.x && o + s.x > n && (s.x = 0,
                s.y = s.height),
                i._pushPosition(e, s.x, s.y),
                s.height = Math.max(s.y + a, s.height),
                s.x += o
            })
        },
        _fitRowsGetContainerSize: function() {
            return {
                height: this.fitRows.height
            }
        },
        _fitRowsResizeChanged: function() {
            return !0
        },
        _cellsByRowReset: function() {
            this.cellsByRow = {
                index: 0
            },
            this._getSegments(),
            this._getSegments(!0)
        },
        _cellsByRowLayout: function(e) {
            var i = this
              , n = this.cellsByRow;
            e.each(function() {
                var e = t(this)
                  , s = n.index % n.cols
                  , o = Math.floor(n.index / n.cols)
                  , a = (s + .5) * n.columnWidth - e.outerWidth(!0) / 2
                  , r = (o + .5) * n.rowHeight - e.outerHeight(!0) / 2;
                i._pushPosition(e, a, r),
                n.index++
            })
        },
        _cellsByRowGetContainerSize: function() {
            return {
                height: Math.ceil(this.$filteredAtoms.length / this.cellsByRow.cols) * this.cellsByRow.rowHeight + this.offset.top
            }
        },
        _cellsByRowResizeChanged: function() {
            return this._checkIfSegmentsChanged()
        },
        _straightDownReset: function() {
            this.straightDown = {
                y: 0
            }
        },
        _straightDownLayout: function(e) {
            var i = this;
            e.each(function() {
                var e = t(this);
                i._pushPosition(e, 0, i.straightDown.y),
                i.straightDown.y += e.outerHeight(!0)
            })
        },
        _straightDownGetContainerSize: function() {
            return {
                height: this.straightDown.y
            }
        },
        _straightDownResizeChanged: function() {
            return !0
        },
        _masonryHorizontalReset: function() {
            this.masonryHorizontal = {},
            this._getSegments(!0);
            var e = this.masonryHorizontal.rows;
            for (this.masonryHorizontal.rowXs = []; e--; )
                this.masonryHorizontal.rowXs.push(0)
        },
        _masonryHorizontalLayout: function(e) {
            var i = this
              , n = i.masonryHorizontal;
            e.each(function() {
                var e = t(this)
                  , s = Math.ceil(e.outerHeight(!0) / n.rowHeight);
                if (s = Math.min(s, n.rows),
                1 === s)
                    i._masonryHorizontalPlaceBrick(e, n.rowXs);
                else {
                    var o, a, r = n.rows + 1 - s, l = [];
                    for (a = 0; a < r; a++)
                        o = n.rowXs.slice(a, a + s),
                        l[a] = Math.max.apply(Math, o);
                    i._masonryHorizontalPlaceBrick(e, l)
                }
            })
        },
        _masonryHorizontalPlaceBrick: function(e, t) {
            for (var i = Math.min.apply(Math, t), n = 0, s = 0, o = t.length; s < o; s++)
                if (t[s] === i) {
                    n = s;
                    break
                }
            var a = i
              , r = this.masonryHorizontal.rowHeight * n;
            this._pushPosition(e, a, r);
            var l = i + e.outerWidth(!0)
              , c = this.masonryHorizontal.rows + 1 - o;
            for (s = 0; s < c; s++)
                this.masonryHorizontal.rowXs[n + s] = l
        },
        _masonryHorizontalGetContainerSize: function() {
            var e = Math.max.apply(Math, this.masonryHorizontal.rowXs);
            return {
                width: e
            }
        },
        _masonryHorizontalResizeChanged: function() {
            return this._checkIfSegmentsChanged(!0)
        },
        _fitColumnsReset: function() {
            this.fitColumns = {
                x: 0,
                y: 0,
                width: 0
            }
        },
        _fitColumnsLayout: function(e) {
            var i = this
              , n = this.element.height()
              , s = this.fitColumns;
            e.each(function() {
                var e = t(this)
                  , o = e.outerWidth(!0)
                  , a = e.outerHeight(!0);
                0 !== s.y && a + s.y > n && (s.x = s.width,
                s.y = 0),
                i._pushPosition(e, s.x, s.y),
                s.width = Math.max(s.x + o, s.width),
                s.y += a
            })
        },
        _fitColumnsGetContainerSize: function() {
            return {
                width: this.fitColumns.width
            }
        },
        _fitColumnsResizeChanged: function() {
            return !0
        },
        _cellsByColumnReset: function() {
            this.cellsByColumn = {
                index: 0
            },
            this._getSegments(),
            this._getSegments(!0)
        },
        _cellsByColumnLayout: function(e) {
            var i = this
              , n = this.cellsByColumn;
            e.each(function() {
                var e = t(this)
                  , s = Math.floor(n.index / n.rows)
                  , o = n.index % n.rows
                  , a = (s + .5) * n.columnWidth - e.outerWidth(!0) / 2
                  , r = (o + .5) * n.rowHeight - e.outerHeight(!0) / 2;
                i._pushPosition(e, a, r),
                n.index++
            })
        },
        _cellsByColumnGetContainerSize: function() {
            return {
                width: Math.ceil(this.$filteredAtoms.length / this.cellsByColumn.rows) * this.cellsByColumn.columnWidth
            }
        },
        _cellsByColumnResizeChanged: function() {
            return this._checkIfSegmentsChanged(!0)
        },
        _straightAcrossReset: function() {
            this.straightAcross = {
                x: 0
            }
        },
        _straightAcrossLayout: function(e) {
            var i = this;
            e.each(function() {
                var e = t(this);
                i._pushPosition(e, i.straightAcross.x, 0),
                i.straightAcross.x += e.outerWidth(!0)
            })
        },
        _straightAcrossGetContainerSize: function() {
            return {
                width: this.straightAcross.x
            }
        },
        _straightAcrossResizeChanged: function() {
            return !0
        }
    },
    t.fn.imagesLoaded = function(e) {
        function i() {
            e.call(s, o)
        }
        function n(e) {
            var s = e.target;
            s.src !== r && t.inArray(s, l) === -1 && (l.push(s),
            --a <= 0 && (setTimeout(i),
            o.unbind(".imagesLoaded", n)))
        }
        var s = this
          , o = s.find("img").add(s.filter("img"))
          , a = o.length
          , r = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw=="
          , l = [];
        return a || i(),
        o.bind("load.imagesLoaded error.imagesLoaded", n).each(function() {
            var e = this.src;
            this.src = r,
            this.src = e
        }),
        s
    }
    ;
    var x = function(t) {
        e.console && e.console.error(t)
    };
    t.fn.isotope = function(e, i) {
        if ("string" == typeof e) {
            var n = Array.prototype.slice.call(arguments, 1);
            this.each(function() {
                var i = t.data(this, "isotope");
                return i ? t.isFunction(i[e]) && "_" !== e.charAt(0) ? void i[e].apply(i, n) : void x("no such method '" + e + "' for isotope instance") : void x("cannot call methods on isotope prior to initialization; attempted to call method '" + e + "'")
            })
        } else
            this.each(function() {
                var n = t.data(this, "isotope");
                n ? (n.option(e),
                n._init(i)) : t.data(this, "isotope", new t.Isotope(e,this,i))
            });
        return this
    }
}(window, jQuery);
