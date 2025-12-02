(function ($) {

  // Main init for ONE .acf-map element
  function initAcfMap($el) {
    var $markers = $el.find('.marker');

    var mapStyle = [
      { featureType: "poi", elementType: "all", stylers: [{ visibility: "off" }] },
      { featureType: "poi.business", elementType: "all", stylers: [{ visibility: "off" }] },
      { featureType: "administrative.land_parcel", elementType: "labels", stylers: [{ visibility: "off" }] },
      { featureType: "road.local", elementType: "labels", stylers: [{ visibility: "on" }] }
    ];

    var mapArgs = {
      zoom: getResponsiveZoom($el),
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      fullscreenControl: false,
      streetViewControl: false,
      mapTypeControl: false,
      zoomControl: true,
      scrollwheel: false,
      styles: mapStyle,
      clickableIcons: false
    };

    var map = new google.maps.Map($el[0], mapArgs);

    map.markers = [];
    $markers.each(function () {
      initMarker($(this), map);
    });

    centerMap(map);
    return map;
  }

  function initMarker($marker, map) {
    var lat = $marker.data('lat');
    var lng = $marker.data('lng');
    var latLng = { lat: parseFloat(lat), lng: parseFloat(lng) };

    var marker = new google.maps.Marker({
      position: latLng,
      map: map,
      // icon: { url: '/path/to/pin.png', scaledSize: new google.maps.Size(32, 32) }
    });

    map.markers.push(marker);

    if ($marker.html()) {
      var infowindow = new google.maps.InfoWindow({ content: $marker.html() });
      google.maps.event.addListener(marker, 'click', function () {
        infowindow.open(map, marker);
      });
    }
  }

  function isMobile() {
    return window.matchMedia('(max-width: 1280px)').matches;
  }

  function getResponsiveZoom($el) {
    var zDesktop = parseInt($el.data('zoom') || 16, 10);
    var zMobile  = parseInt($el.data('zoom-mobile') || (zDesktop - 2), 10);
    return isMobile() ? zMobile : zDesktop;
  }

  function shouldOffset() {
    return window.matchMedia('(min-width: 1280px)').matches;
  }

  function setOffsetCenter(map, latLng, offsetX, offsetY) {
    var scale = Math.pow(2, map.getZoom());
    var proj = map.getProjection();
    if (!proj) {
      google.maps.event.addListenerOnce(map, 'projection_changed', function(){
        setOffsetCenter(map, latLng, offsetX, offsetY);
      });
      return;
    }
    var worldPoint = proj.fromLatLngToPoint(latLng);
    var newPoint = new google.maps.Point(
      worldPoint.x - (offsetX / scale),
      worldPoint.y + (offsetY / scale)
    );
    map.setCenter(proj.fromPointToLatLng(newPoint));
  }

  function centerMap(map) {
    var bounds = new google.maps.LatLngBounds();
    map.markers.forEach(function (marker) {
      bounds.extend({ lat: marker.position.lat(), lng: marker.position.lng() });
    });

    if (map.markers.length === 1) {
      var c = bounds.getCenter();
      map.setCenter(c);
      if (shouldOffset()) {
        setOffsetCenter(map, c, 270, 60);
      } else {
        setOffsetCenter(map, c, 130, 20);
      }
    } else {
      map.fitBounds(bounds);
      google.maps.event.addListenerOnce(map, 'idle', function () {
        if (shouldOffset()) map.panBy(270, 60);
      });
    }
  }

  //  Run after DOM is ready AND after Google Maps is available
  window.initMap = function () {
    jQuery(function ($) {
      $('.acf-map').each(function () {
        initAcfMap($(this));
      });
    });
  };

})(jQuery);