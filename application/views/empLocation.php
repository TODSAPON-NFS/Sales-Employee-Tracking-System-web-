<?php include 'partials/header.php' ?>
<style>
   .table tr td{
       margin-left:100px;
   }
</style>

        <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
        <meta charset="utf-8">
        <title>Places Searchbox</title>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/mapstyle.css">
        <script src="<?php echo base_url();?>assets/js/searchByPlaces.js"></script>
    <h2>Employee Tracking</h2>
    <div>
        <table>
        <tr>
            <td>
            Enter The Employee ID:-
             </td>


            <td>
                <input id="pac-input" class="controls" type="text" placeholder="Search" style="width: 500px">
        <select id ="type">

            <option value="e1">e1</option>
            <option value="e2">e2</option>
            <option value="e3">e3</option>
            <option value="e4">e4</option>
        </select>
            </td>
            <td>
        <button id="search-by-selection" onclick="getMarker()">Search</button>
            </td>
        </tr>
        <table>
    </div>


    <div class="container-fluid">





        <div id="map">
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDccLlV_rbSEOElJchCKxcP8ayVoatGNFc&libraries=places&callback=initAutocomplete"
                    async defer>

            </script>

        </div>





    </div>


    <script type="text/javascript">
        //Function For Request Locations from Database
      //  getMarker();

        function getMarker() {
            var type = document.getElementById("type").value;
            //alert(type);
            $.ajax({
                type: "GET",
                url: "<?php echo base_url('index.php/Location_controller/getEmployeeLocations') ?>?keyword="+type,
                dataType: "json",

                success: function(data) {
                    //When Request Succeeded return Locations from Database;
                    console.log(data);
                    addMarkers(data);


                },
                error: function(){
                    console.log('error');
                }
            });
        }


        function addMarkers(data){

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: new google.maps.LatLng(6.902431,79.861326),
                // scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });


            var infowindow = new google.maps.InfoWindow();
            var marker, i;

            for (i = 0; i < data.length; i++) {
                var coords = [data[i].lat, data[i].lng];
                console.log(coords);
                // console.log(data[i].name)
                var pt = new google.maps.LatLng(parseFloat(coords[0]), parseFloat(coords[1]));
                marker = new google.maps.Marker({
                    position: pt,
                    map: map,
                    address: data[i].address,
                    title: data[i].name
                });


                var contentString = '<div id="content">'+
                    '<div id="siteNotice">'+
                    '</div>'+
                    '<h1 id="firstHeading" class="firstHeading">'+data[i].name+'</h1>'+
                    '<div id="bodyContent">'+
                    '<p><b>'+data[i].address+'</b></p></br>'+
                    '<p>'+data[i].description+'</p>'+
                    '</div>'+
                    '</div>';

                //marker.setMap(map);
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(
                            '<div id="content">'+
                            '<div id="siteNotice">'+
                            '</div>'+
                            '<h1 id="firstHeading" class="firstHeading">'+data[i].name+'</h1>'+
                            '<div id="bodyContent">'+
                            '<p><b>'+data[i].address+'</b></p></br>'+
                                //  '<p>'+data[i].description+'</p>'+
                                //'<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>'+
                            '</div>'+
                            '</div>'
                        );
                        infowindow.open(map, marker);
                        openModal(data[i].name);

                    }
                })
                (marker, i));


            }


//
//
//            var flightPlanCoordinates = [
//                {lat: 37.772, lng: -122.214},
//                {lat: 21.291, lng: -157.821},
//                {lat: -18.142, lng: 178.431},
//                {lat: -27.467, lng: 153.027}
//            ];
//            var flightPath = new google.maps.Polyline({
//                path: flightPlanCoordinates,
//                geodesic: true,
//                strokeColor: '#FF0000',
//                strokeOpacity: 1.0,
//                strokeWeight: 2
//            });
//
//            flightPath.setMap(map);


        }

        function openModal(id){
            var EmpID = id;
            // alert(EmpID);




        }






    </script>













<?php include 'partials/footer.php' ?>