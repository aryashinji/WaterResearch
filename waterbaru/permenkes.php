<?php require ('qs_connection.php'); 
//$idr=$_GET["id"];
if(isset($_POST['alamat']) || isset($_POST['latitude']) || isset($_POST['longitude']) ){
	// run information through authenticator
	$query="UPDATE Permenkes SET latitude='".$_POST["latitude"]."', longitude='".$_POST["longitude"]."', alamat='".$_POST["alamat"]."' where id='".$_POST["id"]."'";
	$result=mysql_query($query);
    if($result)header('Location: Permenkes.php?edit=ok');
	else if(!$result)header('Location: Permenkes.php?edit=gagal');
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
					<?php if($_SESSION["access"]=="Admin"){ ?><li>
                         <?php if($_SESSION["access"]=="Admin"){ ?><a href="user.php"><i class="fa fa-fw fa-wrench"></i> Administrator</a><?php }?>
                    </li> <?php } ?>
                    <li>
                        <a href="lokasi.php"><i class="fa fa-fw fa-bar-chart-o"></i> Lokasi</a>
                    </li>
                    <li>
                        <a href="analisis_kualitas.php"><i class="fa fa-fw fa-table"></i> Analisis Kualitas</a>
                    </li>
                    <li     class="active">
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

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="margin:0; padding:0">
                            Standar Permenkes
                        </h1>
                    </div>
                </div>				
                <!-- /.row -->
				<?php

					$resultx = mysql_query("SELECT * FROM permenkes WHERE id_permenkes = '1' ");
						$row = mysql_fetch_array($resultx);
												$id = $row['id_permenkes'];
												$bau = $row['bau'];
												$warna = $row['warna'];
												$rasa = $row['rasa'];
											//$nama = $row['temperatur_atas'];
											//$isi = $row['temperatur_bawah'];
											$besi = $row['besi'];
											$phatas = $row['ph_atas'];
											$phbawah = $row['ph_bawah'];
											$tds = $row['tds'];
											$fluorida = $row['fluorida'];
											$no2= $row['no2'];	
				?>
                <div class="row">
                    <div class="col-lg-12" style="margin:0; padding:0">

                        <form action="editorpermenkes.php" method="post">
							 <div class="form-group">
                                <label>Bau</label>
                                <input class="form-control" value=" <?php echo $bau; ;?>" name="bau" readonly="readonly"s>
                            </div>
                            <label>Warna</label>
							 <div class="form-group input-group">
                                <input class="form-control" value=" <?php echo $warna; ;?>" name="warna" readonly="readonly">
                                <span class="input-group-addon">TCU</span>
                            </div>
							<div class="form-group">
                                <label>Rasa</label>
                                <input class="form-control" value=" <?php echo $rasa; ;?>" name="rasa" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label>PH Atas</label>
                                <input class="form-control" value=" <?php echo $phatas; ;?>" name="phatas" readonly="readonly">
                            </div>
							<div class="form-group">
                                <label>PH Bawah</label>
                                <input class="form-control" value=" <?php echo $phbawah; ;?>" name="phbawah" readonly="readonly">
                            </div>
							<label>Besi</label>
							<div class="form-group input-group">
                                <input class="form-control" value=" <?php echo $besi; ;?>" name="besi" readonly="readonly">
                                <span class="input-group-addon">mg/L</span>
                            </div>
                            <label>TDS</label>
							<div class="form-group input-group">
                                <input class="form-control" value=" <?php echo $tds; ;?>" name="tds" readonly="readonly">
                                <span class="input-group-addon">mg/L</span>
                            </div>
                            <label>Fluorida</label>
							<div class="form-group input-group">
                                <input class="form-control" value=" <?php echo $fluorida; ;?>" name="fluorida" readonly="readonly">
                                <span class="input-group-addon">mg/L</span>
                            </div>
                            <label>NO2</label>
							<div class="form-group input-group">
                                <input class="form-control" value=" <?php echo $no2; ;?>" name="no2" readonly="readonly">
                                <span class="input-group-addon">mg/L</span>
                            </div>
							
                            
                            <!--a href="Permenkesacuan.php" class="btn btn-primary" role="button">Back</a--><br><br>

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





