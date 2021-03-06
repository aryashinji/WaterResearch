<?php
require'qs_connection.php';
if ($_SESSION['user']=="" && $_SESSION['access']=="")header('Location: index.php');
if(isset($_POST['alamat'])  ){
	// run information through authenticator
	$alamat=$_POST["alamat"];$latitude=$_POST["latitude"];$longitude=$_POST["longitude"];$nama=$_POST["nama"];
	
		$result1 = mysql_query("INSERT INTO lokasi(id,latitude,longitude,alamat,nama) VALUES ('' , '$latitude' , '$longitude','$alamat','$nama')");
				
			
		header('Location: lokasi.php?status=ok');
		
	

}
// output error to user

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

    <title>Water Quality Monitoring</title><link rel="shortcut icon" href="favicon.ico"><link rel="shortcut icon" href="favicon.ico">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-Admin-2.css" rel="stylesheet">

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
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu"> 
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION["user"]; ?> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php?out"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                <!--input type="button" value="Logout" onclick="window.location.href='index.php?out'"-->
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <li >
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
                    <li>
                        <?php if($_SESSION["access"]=="Admin"){ ?><li>
                         <?php if($_SESSION["access"]=="Admin"){ ?><a href="user.php"><i class="fa fa-fw fa-wrench"></i> Administrator</a><?php }?>
                    </li> <?php } ?>
                    </li>
                    <li   class="active">
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

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="margin:0; padding:0">
                            Add Lokasi
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <form action="addLokasi.php" method="post">
							<div class="form-group">
                                <label>Nama</label>
                                <input placeholder="Nama Lokasi"class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input placeholder="Alamat Lokasi" class="form-control" name="alamat">
                            </div>
                            <label>Latitude & Longitude</label>
                            <div class="form-group">
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" onclick="hapus()" checked> Manual
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2" onclick="getLocation()"> Automatically
                                </label>
                            </div>
							<div class="form-group">
                                <input placeholder="Latitude" id="lat" class="form-control" name="latitude">
                            </div>
							<div class="form-group">
                                <input placeholder="Longitude" id="long" class="form-control" name="longitude">
                            </div>
                            
                            <button type="submit" class="btn btn-default">Submit</button>
                            <a href="lokasi.php" class="btn btn-primary" role="button">Back</a><br><br>
                        </form>
                    </div>
                    
						

                        
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <script>
        var la = document.getElementById("lat");
        var lo = document.getElementById("long");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }

        function showPosition(position) {
            la.value = position.coords.latitude;
            lo.value = position.coords.longitude;
        }

        function hapus() {
	
            la.value = "";
            lo.value = "";
        }

    </script>
        <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>





