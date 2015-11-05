<?php
require'qs_connection.php';
if ($_SESSION['user']=="" && $_SESSION['access']=="")header('Location: index.php');
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
					
                    <li>
                        <a href="home.php"><i class="fa fa-fw fa-dashboard"></i> Home</a>
                    </li>
					<?php if($_SESSION["access"]=="Admin"){ ?><li>
                        <a href="user.php"><i class="fa fa-fw fa-wrench"></i> Administrator</a>
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
                            Analisis Kualitas
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="#">Administrator Menu</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Analisis Kualitas
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				
				<?php if(isset($_GET["edit"]) && $_GET["edit"]==ok){ ?>
				<div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>OPERASI BERHASIL</strong> </i>
                        </div>
                    </div>
                </div>
				<?php } ?>
				<?php if(isset($_GET["edit"]) && $_GET["edit"]==gagal )  { ?>
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
					
                    <div class="col-lg-12">
                        <center><h2>List analisis</h2>
						<!--center><a href="addnews.php" class="btn btn-primary" role="button">ADD NEWS</a><br><br-->
                        <div class="table-responsive">
						<center><a href="addanalisis.php" class="btn btn-primary" role="button">ADD ANALISIS BARU</a><br><br>
                           
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th><center>ID analisis</th>
										<th><center>Tanggal Pengamatan</th>
                                        <th><center>Status Permenkes</th>
										<th><center>Status Kelas</th>
                                        <th><center>ID Lokasi</th>
                                        
										<th><center></th>
                                    </tr>
                                </thead>
								<tbody>
									<?php
										
										$result = mysql_query("SELECT * FROM analisis_kualitas ORDER BY id ASC, tanggal_pengamatan DESC");// or die("Invalid query");
										
										if (!$result) {
											$message  = 'Invalid query: ' . mysql_error() . "\n";
											$message .= 'Whole query: ' . $query;
											die($message);
										}
										
										while ($row = mysql_fetch_assoc($result)) {
											$id = $row['id_analisis'];
											$nama = $row['tanggal_pengamatan'];
											$isi = $row['status_permenkes'];
											$statuskelas = $row['status_kelas'];
											$alamat = $row['id'];
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
											//$fluorida = $row['fluorida'];
											$no2= $row['no2'];
											echo "<tr><td><center><b>"."$id"."  </td>";
											echo "<td><center>"."$nama"."</td>";
											echo "<td><center>"."$isi"."</td>";
											echo "<td><center>"."$statuskelas"."</td>";
											echo "<td><center>"."$alamat"."</td>";
											echo "<td><center><a href=\"openanalisis.php?id=$id\"><button type=\"button\" class=\"btn btn-lg btn-success\">Open</button></a></td>";
											
											//echo "<td><center><a href=\"editoranalisis.php?id=$id\"><button type=\"button\" class=\"btn btn-lg btn-info\">Edit</button></a></td>";
											//echo "<td><center><a href=\"deleteanalisis.php?id=$id\"><button type=\"button\" class=\"btn btn-lg btn-danger\">Delete</button></a></td></tr>";
											
											
										}
																			
										
									  
									?>
								</tbody>
                                <!--tbody>
                                    <tr>
                                        <td>/index.html</td>
                                        <td>1265</td>
                                        <td>32.3%</td>
                                        <td>$321.33</td>
                                    </tr>
                                    <tr>
                                        <td>/about.html</td>
                                        <td>261</td>
                                        <td>33.3%</td>
                                        <td>$234.12</td>
                                    </tr>
                                    <tr>
                                        <td>/sales.html</td>
                                        <td>665</td>
                                        <td>21.3%</td>
                                        <td>$16.34</td>
                                    </tr>
                                    <tr>
                                        <td>/blog.html</td>
                                        <td>9516</td>
                                        <td>89.3%</td>
                                        <td>$1644.43</td>
                                    </tr>
                                    <tr>
                                        <td>/404.html</td>
                                        <td>23</td>
                                        <td>34.3%</td>
                                        <td>$23.52</td>
                                    </tr>
                                    <tr>
                                        <td>/services.html</td>
                                        <td>421</td>
                                        <td>60.3%</td>
                                        <td>$724.32</td>
                                    </tr>
                                    <tr>
                                        <td>/blog/post.html</td>
                                        <td>1233</td>
                                        <td>93.2%</td>
                                        <td>$126.34</td>
                                    </tr>
                                </tbody-->
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

</body>

</html>
