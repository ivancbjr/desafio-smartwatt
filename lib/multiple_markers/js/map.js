// *
// * Add multiple markers
// * 2013 - en.marnoto.com
// *

// necessary variables
    var map;
    var infoWindow;

// markersData variable stores the information necessary to each marker

    var markersData;
    $.ajax({
        url: "ajax/data3.php",
        type: 'GET',
        async: true,
        dataType: "json",
        success: function (data) {
            markersData = data;
        }
    });


    function initialize() {
        var mapOptions = {
            /*center: new google.maps.LatLng(40.601203,-8.668173),*/
            zoom: 9,
            mapTypeId: 'roadmap'
        };

        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        // a new Info Window is created
        infoWindow = new google.maps.InfoWindow();

        // Event that closes the Info Window with a click on the map
        google.maps.event.addListener(map, 'click', function () {
            infoWindow.close();
        });

        // Finally displayMarkers() function is called to begin the markers creation
        displayMarkers();
    }

    google.maps.event.addDomListener(window, 'load', initialize);


// This function will iterate over markersData array
// creating markers with createMarker function
    function displayMarkers() {

        // this variable sets the map bounds according to markers position
        var bounds = new google.maps.LatLngBounds();

        // for loop traverses markersData array calling createMarker function for each marker
        for (var i = 0; i < markersData.length; i++) {

            var latlng = new google.maps.LatLng(markersData[i].lat, markersData[i].lng);
            var name = markersData[i].name;
            var info = markersData[i].info;

            createMarker(latlng, name, info);

            // marker position is added to bounds variable
            bounds.extend(latlng);
        }

        // Finally the bounds variable is used to set the map bounds
        // with fitBounds() function
        map.fitBounds(bounds);
    }

// This function creates each marker and it sets their Info Window content
    function createMarker(latlng, name, info) {
        var marker = new google.maps.Marker({
            map: map,
            position: latlng,
            title: name
        });

        // This event expects a click on a marker
        // When this event is fired the Info Window content is created
        // and the Info Window is opened.
        google.maps.event.addListener(marker, 'click', function () {

            // Creating the content to be inserted in the infowindow

            var iwContent = '<div id="iw_container">' +
                '<div class="iw_title">' + name + '</div>' +
                '<div class="iw_content">' + info + '<br /></div></div>';

            // including content to the Info Window.
            infoWindow.setContent(iwContent);

            // opening the Info Window in the current map and at the current marker location.
            infoWindow.open(map, marker);
        });
    }