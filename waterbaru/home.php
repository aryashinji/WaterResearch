<?php require ('qs_connection.php'); 
$idr=isset($_GET["id"]);
if ($_SESSION['user']=="" && $_SESSION['access']=="")header('Location: index.php');
if(isset($_POST['alamat']) || isset($_POST['latitude']) || isset($_POST['longitude']) ){
	// run information through authenticator
	$query="UPDATE lokasi SET latitude='".$_POST["latitude"]."', longitude='".$_POST["longitude"]."', alamat='".$_POST["alamat"]."' where id='".$_POST["id"]."'";
	$result=mysql_query($query);
    if($result)header('Location: lokasi.php?edit=ok');
	else if(!$result)header('Location: lokasi.php?edit=gagal');
}
?> 

<html xmlns="http://www.w3.org/1999/xhtml" >

<!DOCTYPE html>
<html lang="en">

<head>    
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">    
  <meta name="viewport" content="width=device-width, initial-scale=1">    
  <meta name="description" content="">    
  <meta name="author" content="">    
  <title>Water Quality Monitoring</title>    
  <!-- Bootstrap Core CSS -->    
  <link href="css/bootstrap.min.css" rel="stylesheet">    
  <!-- Custom CSS -->    
  <link href="css/sb-admin-2.css" rel="stylesheet">    
  <!-- Morris Charts CSS -->    
  <link href="css/plugins/morris.css" rel="stylesheet">    
  <!-- Custom Fonts -->    
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">    
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->    
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->    
  <!--[if lt IE 9]>        
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>        
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>    
  <![endif]-->
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
.controls {
  margin-top: 10px;
  border: 1px solid transparent;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  height: 32px;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 300px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

.pac-container {
  font-family: Roboto;
}

#type-selector {
  color: #fff;
  background-color: #4d90fe;
  padding: 5px 11px 0px 11px;
}

#type-selector label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}

    </style>
    <title>Places Searchbox</title>
    <style>
      #target {
        width: 345px;
      }
    </style>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">Water Quality Monitoring</a>
            </div>
            <!-- Top Menu Items -->
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION["user"]; ?> <b class="caret"></b></a>
                    <ul class="nav nav-second-level">
                            <li class="divider"></li>
                        <li>
                            <a href="index.php?out"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
							<!--input type="button" value="Logout" onclick="window.location.href='index.php?out'"-->
                        </li>
                        </ul>
                    <!-- /.dropdown-user -->
                    </li>
                    <li  class="active">
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
					<?php if($_SESSION["access"]=="Admin"){ ?><li>
                         <?php if($_SESSION["access"]=="Admin"){ ?><a href="user.php"><i class="fa fa-fw fa-wrench"></i> Administrator</a><?php }?>
                    </li> <?php } ?>
                    <li>
                        <a href="lokasi.php"><i class="fa fa-fw fa-bar-chart-o"></i> Lokasi</a>
                    </li>
                    <li>
                        <a href="analisis_kualitas.php"><i class="fa fa-fw fa-table"></i> Analisis Kualitas</a>
                    </li>
                    <li>
                        <a href="permenkes.php"><i class="fa fa-fw fa-edit"></i> Permenkes</a>
                    </li>
                    <li>
                        <a href="kelasacuan.php"><i class="fa fa-fw fa-desktop"></i> Kelas Acuan</a>
                    </li>
                </ul>
            </div>
        </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" style="padding:0">
            <!-- /.row -->
            <div class="row" style="margin:0">

                <div class="row" >
                    <div class="col-lg-12" style="margin:0">
                        <head>
                           <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
                           <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
                           <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
                           <script type="text/javascript">
                           //<![CDATA[
                           var customIcons = {
                             aman: {
                               icon: 'http://labs.google.com/ridefinder/images/mm_20_green.png',
                               shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
                             },
                             rusak: {
                               icon: 'http://labs.google.com/ridefinder/images/mm_20_red.png',
                               shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
                             },
                             rawan: {
                               icon: 'http://labs.google.com/ridefinder/images/mm_20_yellow.png',
                               shadow: 'http://labs.google.com/ridefinder/images/mm_20_shadow.png'
                             }
                             
                           };


                           function load() {
                             var map = new google.maps.Map(document.getElementById("map"), {
                               //center: new google.maps.LatLng(-6.2382699, 106.97557260000008),
                               center: new google.maps.LatLng(-7.3281875, 109.9076899),
                               //zoom: 11,
                               zoom: 8,
                               mapTypeId: 'roadmap'
                             });
                             var infoWindow = new google.maps.InfoWindow;

                             // Rubah nama ini sesuai sengan script php yg menghasilkan script XML
                             downloadUrl("test.php", function(data) {
                               var xml = data.responseXML;
                               var markers = xml.documentElement.getElementsByTagName("marker");
                               for (var i = 0; i < markers.length; i++) {
                                 var name = markers[i].getAttribute("name");
                                 var address = markers[i].getAttribute("address");
                                 var type = markers[i].getAttribute("type");
                                 var point = new google.maps.LatLng(
                                     parseFloat(markers[i].getAttribute("lat")),
                                    parseFloat(markers[i].getAttribute("lng")));
                                 var html = "<b>" + name + "</b> <br/>" + address;
                                 var icon = customIcons[type] || {};
                                 var marker = new google.maps.Marker({
                                   map: map,
                                   position: point,
                                   icon: icon.icon,
                                   shadow: icon.shadow
                                 });
                                 bindInfoWindow(marker, map, infoWindow, html);

                               }
                             });
                           }
                           function bindInfoWindow(marker, map, infoWindow, html) {
                             google.maps.event.addListener(marker, 'click', function() {
                               infoWindow.setContent(html);
                               infoWindow.open(map, marker);
                             });
                           }
                           function downloadUrl(url, callback) {
                             var request = window.ActiveXObject ?
                                 new ActiveXObject('Microsoft.XMLHTTP') :
                                 new XMLHttpRequest;
                             request.onreadystatechange = function() {
                               if (request.readyState == 4) {
                                 request.onreadystatechange = doNothing;
                                 callback(request, request.status);
                               }
                             };
                             request.open('GET', url, true);
                             request.send(null);
                           }
                           function doNothing() {}
                           //]]>
                         </script>
                         </head>
                         <body onload="load()">

                            <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                            <div id="map" style="width: 100%;  height: 90%"></div>
                            <script>
                        // This example adds a search box to a map, using the Google Place Autocomplete
                        // feature. People can enter geographical searches. The search box will return a
                        // pick list containing a mix of places and predicted search terms.

                        function initAutocomplete() {
                          var map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: -33.8688, lng: 151.2195},
                            zoom: 13,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                          });

                          // Create the search box and link it to the UI element.
                          var input = document.getElementById('pac-input');
                          var searchBox = new google.maps.places.SearchBox(input);
                          map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                          // Bias the SearchBox results towards current map's viewport.
                          map.addListener('bounds_changed', function() {
                            searchBox.setBounds(map.getBounds());
                          });

                          var markers = [];
                          // [START region_getplaces]
                          // Listen for the event fired when the user selects a prediction and retrieve
                          // more details for that place.
                          searchBox.addListener('places_changed', function() {
                            var places = searchBox.getPlaces();

                            if (places.length == 0) {
                              return;
                            }

                            // Clear out the old markers.
                            markers.forEach(function(marker) {
                              marker.setMap(null);
                            });
                            markers = [];

                            // For each place, get the icon, name and location.
                            var bounds = new google.maps.LatLngBounds();
                            places.forEach(function(place) {
                              var icon = {
                                url: place.icon,
                                size: new google.maps.Size(71, 71),
                                origin: new google.maps.Point(0, 0),
                                anchor: new google.maps.Point(17, 34),
                                scaledSize: new google.maps.Size(25, 25)
                              };

                              // Create a marker for each place.
                              markers.push(new google.maps.Marker({
                                map: map,
                                icon: icon,
                                title: place.name,
                                position: place.geometry.location
                              }));

                              if (place.geometry.viewport) {
                                // Only geocodes have viewport.
                                bounds.union(place.geometry.viewport);
                              } else {
                                bounds.extend(place.geometry.location);
                              }
                            });
                            map.fitBounds(bounds);
                          });
                          // [END region_getplaces]
                        }


                            </script>
                         </body>
                    </div>
                </div>
            </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAL0QJzVzAfGHqk135byL6SCS_-Kv8TLwk&libraries=places&callback=initAutocomplete"
                                 async defer></script>
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>
    
</body>

</html>





