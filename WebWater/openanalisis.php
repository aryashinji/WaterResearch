<?php require ('qs_connection.php'); 
$idr=$_GET["id"];
if(isset($_POST['alamat']) || isset($_POST['latitude']) || isset($_POST['longitude']) ){
	// run information through authenticator
	$query="UPDATE Kelas SET latitude='".$_POST["latitude"]."', longitude='".$_POST["longitude"]."', alamat='".$_POST["alamat"]."' where id='".$_POST["id"]."'";
	$result=mysql_query($query);
    if($result)header('Location: Kelas.php?edit=ok');
	else if(!$result)header('Location: Kelas.php?edit=gagal');
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

    <title>Water Quality Monitoring</title><link rel="shortcut icon" href="favicon.ico"><link rel="shortcut icon" href="favicon.ico">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-Admin.css" rel="stylesheet">

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
	<script>
	function myFunction() {
		document.getElementById("sepmconsole").innerHTML = "https://172.16.2.60:8443";
	}
	
	function myFunction2() {
		document.getElementById("sepmconsole").innerHTML = "https://172.16.2.60:8443";
	}
	</script>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo @$_SESSION["user"]; ?> <b class="caret"></b></a>
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
					
                    <li >
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
					<?php if($_SESSION["access"]=="Admin"){ ?><li>
                        <a href="user.php"><i class="fa fa-fw fa-wrench"></i> Administrator</a>
                    </li> <?php } ?>
                    <li>
                        <a href="Kelas.php"><i class="fa fa-fw fa-bar-chart-o"></i> Kelas</a>
                    </li>
                    <li>
                        <a href="analisis_kualitas.php"><i class="fa fa-fw fa-table"></i> Analisis Kualitas</a>
                    </li>
                    <li>
                        <a href="permenkes.php"><i class="fa fa-fw fa-edit"></i> Permenkes</a>
                    </li>
                    <li    class="active">
                        <a href="analisis_kualitas.php"><i class="fa fa-fw fa-desktop"></i> Kelas Acuan</a>
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
                            Open Kelas
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Kelas</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Open Kelas
                            </li>
                        </ol>
                    </div>
                </div>
				
				
				
				
                <!-- /.row -->
				<?php

					$resultx = mysql_query("SELECT * FROM analisis_kualitas a, lokasi l WHERE a.id=l.id AND id_analisis = '$idr' ");
						$row = mysql_fetch_array($resultx);
											$id = $row['id_analisis'];
											$nama = $row['tanggal_pengamatan'];
											$isi = $row['status_permenkes'];
											$statuskelas = $row['status_kelas'];
											$alamat = $row['alamat'];
											$bau = $row['bau'];
											$warna = $row['warna'];
											$rasa = $row['rasa'];
											$temperatur = $row['temperatur'];
											//$tembaga = $row['tembaga'];
											$dhl = $row['dhl'];
											$ph = $row['ph'];
											$tds = $row['tds'];
											$cadmium = $row['cadmium'];
											$besi = $row['besi'];
											$fluorida = $row['fluorida'];
											$no2= $row['no2'];
					
						
					
					
				?>
                <div class="row">
                    <div class="col-lg-12">

                        <form action="openanalisis.php" method="post">

							<div class="form-group">
                                    <label for="disabledSelect">ID</label>
                                    <input class="form-control" type="text" value="<?php echo $_GET["id"];?>" name="id" readonly="readonly">
                             </div>
							 <div class="form-group">
                                <label>Tanggal Pengamatan</label>
                                <input class="form-control" value=" <?php echo $nama; ;?>" name="tanggal" readonly="readonly"s>
                            </div>
							 <div class="form-group">
                                <label>Status Permenkes</label>
                                <input class="form-control" value=" <?php echo $isi; ;?>" name="statuspermenkes" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label>Status Kelas</label>
                                <input class="form-control" value=" <?php echo $statuskelas; ;?>" name="statuskelas" readonly="readonly">
                            </div>
							<div class="form-group">
                                <label>PH</label>
                                <input class="form-control" value=" <?php echo $ph; ;?>" name="ph" readonly="readonly">
                            </div>
							
							<div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" value=" <?php echo $alamat; ;?>" name="alamat" readonly="readonly">
                            </div>
							<div class="form-group">
                                <label>Bau</label>
                                <input class="form-control" value=" <?php echo $bau; ;?>" name="bau" readonly="readonly">
                            </div>
							<div class="form-group">
                                <label>Warna</label>
                                <input class="form-control" value=" <?php echo $warna; ;?>" name="warna" readonly="readonly">
                            </div>
							<div class="form-group">
                                <label>Rasa</label>
                                <input class="form-control" value=" <?php echo $rasa; ;?>" name="rasa" readonly="readonly">
                            </div>
							<div class="form-group">
                                <label>Temperatur</label>
                                <input class="form-control" value=" <?php echo $temperatur; ;?>" name="temperatur" readonly="readonly">
                            </div>
							<div class="form-group">
                                <label>DHL</label>
                                <input class="form-control" value=" <?php echo $dhl; ;?>" name="dhl" readonly="readonly">
                            </div>
							<div class="form-group">
                                <label>TDS</label>
                                <input class="form-control" value=" <?php echo $tds; ;?>" name="tds" readonly="readonly">
                            </div>
							<div class="form-group">
                                <label>Kadmium</label>
                                <input class="form-control" value=" <?php echo $cadmium; ;?>" name="cadmium" readonly="readonly">
                            </div>
							<div class="form-group">
                                <label>Besi</label>
                                <input class="form-control" value=" <?php echo $besi; ;?>" name="besi" readonly="readonly">
                            </div>
							<div class="form-group">
                                <label>Fluorida</label>
                                <input class="form-control" value=" <?php echo $fluorida; ;?>" name="fluorida" readonly="readonly">
                            </div>
							<div class="form-group">
                                <label>NO2</label>
                                <input class="form-control" value=" <?php echo $no2; ;?>" name="no2" readonly="readonly">
                            </div>
							
                            
                            <a href="analisis_kualitas.php" class="btn btn-primary" role="button">Back</a><br><br>

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

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>





