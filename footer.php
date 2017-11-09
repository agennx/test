<footer class="footer text-right">
                    2017 © PLATE101.
                </footer>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            
            

        </div>
        <!-- END wrapper -->


    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->

        <script src="js/jquery.scrollTo.min.js"></script>
        <script src="assets/chat/moment-2.2.1.js"></script>
        <script src="assets/jquery-sparkline/jquery.sparkline.min.js"></script>
        <script src="assets/jquery-detectmobile/detect.js"></script>
        <script src="assets/fastclick/fastclick.js"></script>
        <script src="assets/jquery-slimscroll/jquery.slimscroll.js"></script>
        <script src="assets/jquery-blockui/jquery.blockUI.js"></script>

        <!-- sweet alerts -->
        <script src="assets/sweet-alert/sweet-alert.min.js"></script>
        <script src="assets/sweet-alert/sweet-alert.init.js"></script>

        <!-- flot Chart -->
        <script src="assets/flot-chart/jquery.flot.js"></script>
        <script src="assets/flot-chart/jquery.flot.time.js"></script>
        <script src="assets/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="assets/flot-chart/jquery.flot.resize.js"></script>
        <script src="assets/flot-chart/jquery.flot.pie.js"></script>
        <script src="assets/flot-chart/jquery.flot.selection.js"></script>
        <script src="assets/flot-chart/jquery.flot.stack.js"></script>
        <script src="assets/flot-chart/jquery.flot.crosshair.js"></script>

        <!-- Counter-up -->
        <script src="assets/counterup/waypoints.min.js" type="text/javascript"></script>
        <script src="assets/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="js/jquery.app.js"></script>

        <!-- Dashboard -->
        <script src="js/jquery.dashboard.js"></script>

        <!-- Chat -->
        <script src="js/jquery.chat.js"></script>

        <!-- Todo -->
        <script src="js/jquery.todo.js"></script>



        <script type="text/javascript" src="assets/gallery/isotope.js"></script>
        <script type="text/javascript" src="assets/magnific-popup/magnific-popup.js"></script> 
        
<script async defer
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKz5ap_LX7qrvPK8ym1UwzQEpTITHLMeM&callback=initMap">
                        </script> 






        <script type="text/javascript">
        navigator.geolocation.getCurrentPosition(success, error);

        function success(position) {

            var GEOCODING = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + position.coords.latitude + '%2C' + position.coords.longitude + '&language=en';

            $.getJSON(GEOCODING).done(function(location) {
                $('#country').html(location.results[0].address_components[5].long_name);
                $('#state').html(location.results[0].address_components[4].long_name);
                $('#cityfield').html(location.results[0].address_components[2].long_name);
                $('#areafield').html(location.results[0].address_components[1].long_name);
                $('#address').html(location.results[0].formatted_address);
                $('#latitude').html(position.coords.latitude);
                $('#longitude').html(position.coords.longitude);
                var cityvalue = location.results[0].address_components[2].long_name;
                get_areas(document.getElementById("city").value, location.results[0].address_components[1].long_name);
                if ( cityvalue =="Islamabad") {
                        document.getElementById("city").value= "10";

                        document.getElementById("areas").value= "42";
                    }
                    else {
                        document.getElementById("city").value= "4";
                        document.getElementById("areas").value= "167";
                    }




            })

        }

        function error(err) {
            console.log(err)
        }
    </script>
    




        <script type="text/javascript">
            


        
            $(window).load(function(){
                var $container = $('.portfolioContainer');
                $container.isotope({
                    filter: '*',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });

                $('.portfolioFilter a').click(function(){
                    $('.portfolioFilter .current').removeClass('current');
                    $(this).addClass('current');

                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                    return false;
                }); 
            });
            $(document).ready(function() {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick:false,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });
        
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });

/*
            function initMap() {
              var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 4,
                center: {lat: 40.731, lng: -73.997}
              });
              var geocoder = new google.maps.Geocoder;
              var infowindow = new google.maps.InfoWindow;

             
              var input = document.getElementById('latlng').value;
              var latlngStr = input.split(',', 2);
              var latlng = {lat: parseFloat(latlngStr[0]), lng: parseFloat(latlngStr[1])};
              geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === 'OK') {
                  if (results[0]) {
                    map.setZoom(11);
                    map.setCenter(latlng);
                    var marker = new google.maps.Marker({
                      position: latlng,
                      map: map
                    });
                    
                    
                    var cityvalue = results[0].address_components[2].long_name;
                    var areasvalue = results[0].address_components[1].long_name;

                    infowindow.open(map, marker);
                    infowindow.setContent(results[0].formatted_address);
                    if (cityvalue=="Islamabad") {
                        document.getElementById("city").value= "10";

                        document.getElementById("areas").value= "42";
                    }
                    else {
                        document.getElementById("city").value= "4";
                        document.getElementById("areas").value= "167";
                    }
                    
                    alert(cityvalue + areasvalue);


                  } else {
                    window.alert('No results found');
                  }
                } else {
                  window.alert('Geocoder failed due to: ' + status);
                }
              });
            }    




      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;

      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 6
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }
*/

        </script>



    
    </body>
</html>