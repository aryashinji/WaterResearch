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
                        <a href="user.php"><i class="fa fa-fw fa-wrench"></i> Administrator</a>
                    </li>
                    <li>
                        <a href="lokasi.php"><i class="fa fa-fw fa-bar-chart-o"></i> Lokasi</a>
                    </li>
                    <li>
                        <a href="analisis_kualitas.php"><i class="fa fa-fw fa-table"></i> Analisis Kualitas</a>
                    </li>
                    <li>
                        <a href="permenkes.php"><i class="fa fa-fw fa-edit"></i> Permenkes</a>
                    </li>
                    <li   class="active">
                        <a href="kelasacuan.php"><i class="fa fa-fw fa-desktop"></i> Kelas Acuan</a>
                    </li>
                </ul>
            </div>
        </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper" style="padding:0">

            <div class="container-fluid">
                <!-- /.row -->
				<?php

					$resultx = mysql_query("SELECT * FROM Kelas_acuan WHERE id_kelas = '$idr' ");
						$row = mysql_fetch_array($resultx);
												$id = $row['id_kelas'];
											$nama = $row['temperatur_atas'];
											$isi = $row['temperatur_bawah'];
											$tembaga = $row['tembaga'];
											$phatas = $row['ph_atas'];
											$phbawah = $row['ph_bawah'];
											$tds = $row['tds'];
											$kadmium = $row['kadmium'];
											$deskripsi = $row['deskripsi'];
						
				?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="margin:0; padding:0">
                            Standar Kelas <?php echo $_GET["id"];?>
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <form action="editorKelas.php" method="post">
                            <label>Temperatur</label>
							 <div class="form-group input-group">
                                <input class="form-control" value=" <?php echo $isi; ;?> - <?php echo $nama; ;?>" name="tpbawah" readonly="readonly">
                                <span class="input-group-addon"><sup>o</sup> Celcius</span>
                            </div>
							<div class="form-group">
                                <label>PH</label>
                                <input class="form-control" value=" <?php echo $phbawah; ;?> - <?php echo $phatas; ;?>" name="phbawah" readonly="readonly">
                            </div>
							<label>Tembaga</label>
							<div class="form-group input-group">
                                <input class="form-control" value=" <?php echo $tembaga; ;?>" name="tembaga" readonly="readonly">
                                <span class="input-group-addon">mg/L</span>
                            </div>
                            <label>TDS</label>
							<div class="form-group input-group">
                                <input class="form-control" value=" <?php echo $tds; ;?>" name="tds" readonly="readonly">
                                <span class="input-group-addon">mg/L</span>
                            </div>
                            <label>Kadmium</label>
							<div class="form-group input-group">
                                <input class="form-control" value=" <?php echo $kadmium; ;?>" name="kadmium" readonly="readonly">
                                <span class="input-group-addon">mg/L</span>
                            </div>
							<div class="form-group">
                                <label>Fungsi</label>
                                <input class="form-control" value=" <?php echo $deskripsi; ;?>" name="deskripsi" readonly="readonly">
                            </div>
							
                            
                            <a href="Kelasacuan.php" class="btn btn-primary" role="button">Back</a><br><br>

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

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>





