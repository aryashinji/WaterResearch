<?php
require'qs_connection.php';
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
                    <li>
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
					<?php if($_SESSION["access"]=="Admin"){ ?><li>
                         <?php if($_SESSION["access"]=="Admin"){ ?><a href="user.php"><i class="fa fa-fw fa-wrench"></i> Administrator</a><?php }?>
                    </li> <?php } ?>
                    <li>
                        <a href="lokasi.php"><i class="fa fa-fw fa-bar-chart-o"></i> Lokasi</a>
                    </li>
                    <li   class="active">
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
                            Analisis Kualitas
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
				
				<?php if(isset($_GET["edit"]) && $_GET["edit"]=="ok"){ ?>
				<div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>OPERASI BERHASIL</strong> </i>
                        </div>
                    </div>
                </div>
				<?php } ?>
				<?php if(isset($_GET["edit"]) && $_GET["edit"]=="gagal" )  { ?>
				<div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>EDIT GAGAL ! </strong> </i>
                        </div>
                    </div>
                </div>
				<?php } ?>
				
                <div class="row">
					
                    <div class="col-lg-12" style="margin:0; padding:0">
                        <center><h2>List analisis</h2>
						<!--center><a href="addnews.php" class="btn btn-primary" role="button">ADD NEWS</a><br><br-->
                        <center><a href="addanalisis.php" class="btn btn-primary" role="button">ADD ANALISIS BARU</a><br><br>
                        <div class="table-responsive">
                           
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><center>Nama Spot</th>
										<th><center>Alamat Spot</th>
                                        <th><center>Tanggal Pengamatan</th>
										<th><center>Status Permenkes</th>
										<th><center>Tingkat Air</th>
                                        <th><center></th>
										<th><center></th>
                                        <th><center></th>
                                    </tr>
                                </thead>
								<tbody>
									<?php
										
										$result = mysql_query("SELECT * 
													FROM (
														SELECT id_analisis, latitude, longitude, nama, alamat, lokasi.id, tanggal_pengamatan, status_permenkes, tingkat_air From analisis_kualitas, lokasi where analisis_kualitas.id=lokasi.id
														ORDER BY tanggal_pengamatan desc 
													) AS sub
													GROUP BY id");// or die("Invalid query");
										
										if (!$result) {
											$message  = 'Invalid query: ' . mysql_error() . "\n";
											$message .= 'Whole query: ' . $query;
											die($message);
										}
										
										while ($row = mysql_fetch_assoc($result)) {
											$id = $row['id_analisis'];
											$lokasi = $row['id'];
											$tanggal = $row['tanggal_pengamatan'];
											$nama = $row['nama'];
											$isi = $row['status_permenkes'];
											$tingkat_air=$row['tingkat_air'];
											$lat=$row['latitude'];
											$lon=$row['longitude'];
											//$statuskelas = $row['status_kelas'];
											$alamat = $row['alamat'];
											//$bau = $row['bau'];
											//$warna = $row['warna'];
											//$rasa = $row['rasa'];
											//$temperatur = $row['temperatur'];
											//$tembaga = $row['tembaga'];
											//$dhl = $row['dhl'];
											//$ph = $row['ph'];
											//$tds = $row['tds'];
											//$cadmium = $row['cadmium'];
											//$besi = $row['besi'];
											//$fluorida = $row['fluorida'];
											//$no2= $row['no2'];
											echo "<tr><td><center><b>"."$nama"."  </td>";
											echo "<td><center>"."$alamat"."</td>";
											echo "<td><center>"."$tanggal"."</td>";
											echo "<td><center>"."$isi"."</td>";
											echo "<td><center>"."$tingkat_air"."</td>";
											echo "<td><center><a href=\"viewmap.php?lat=$lat&lon=$lon\"><button type=\"button\" class=\"btn btn-lg btn-warning\">View Map</button></a></td>";
											echo "<td><center><a href=\"openanalisis.php?id=$id\"><button type=\"button\" class=\"btn btn-lg btn-success\">Open</button></a></td>";
											echo "<td><center><a href=\"history.php?id=$lokasi\"><button type=\"button\" class=\"btn btn-lg btn-info\">History</button></a></td></tr>";
											
											//echo "<td><center><a href=\"editoranalisis.php?id=$id\"><button type=\"button\" class=\"btn btn-lg btn-info\">Edit</button></a></td>";
											//echo "<td><center><a href=\"deleteanalisis.php?id=$id\"><button type=\"button\" class=\"btn btn-lg btn-danger\">Delete</button></a></td></tr>";
											
											
										}
																			
										
									  
									?>
								</tbody>
                            </table>
                        </div>
                </div>
                <!-- /.row -->

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
