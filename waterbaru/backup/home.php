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
    <link href="css/sb-admin.css" rel="stylesheet">

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

</head>
   

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION["user"]; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!--li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li-->
                        <li class="divider"></li>
                        <li>
                            <a href="index.php?out"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
							<!--input type="button" value="Logout" onclick="window.location.href='index.php?out'"-->
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
					
                    <li  class="active">
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
					<?php if( $_SESSION["access"]=="Admin"){ ?><li>
                        <a href="user.php"><i class="fa fa-fw fa-wrench"></i> Administrator</a>
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
                    <!--li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Dropdown <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                    <li>
                        <a href="index-rtl.html"><i class="fa fa-fw fa-dashboard"></i> RTL Dashboard</a>
                    </li-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Peta Lokasi Sumur Air Minum
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Lokasi</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Lokasi
                            </li>
                        </ol>
                    </div>
                </div>
				
				
				
				
                <!-- /.row -->
				
                <div class="row">
                    <div class="col-lg-16">

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
							   center: new google.maps.LatLng(-6.28248, 107.096),
							   //zoom: 11,
							   zoom: 30,
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
						   <center><div align="center" id="map" style="width: 800px;  height: 400px"></div></center>
						 </body>
						
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
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>





