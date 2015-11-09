<?php require ('qs_connection.php'); 
$idr=$_GET["id"];
if(isset($_POST['id'])  ){
	$id=$_POST['id'];
	// run information through authenticator
	$query="DELETE FROM lokasi WHERE id = '$id' ";
	$result=mysql_query($query);
    if($result)header('Location: lokasi.php?delete=ok');
	else if(!$result)header('Location: lokasi.php?delete=gagal');
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
                        <?php if($_SESSION["access"]=="Admin"){ ?><li>
                        <a href="user.php"><i class="fa fa-fw fa-wrench"></i> Administrator</a>
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
                    <div class="col-lg-12" >
                        <h1 class="page-header" style="margin:0; padding:0">
                            Delete Lokasi
                        </h1>
                    </div>
                </div>
				
				
				
				
                <!-- /.row -->
				<?php

					$resultx = mysql_query("SELECT * FROM lokasi WHERE id = '$idr' ");
						$row = mysql_fetch_array($resultx);
												$id = $row['id'];
											$nama = $row['latitude'];
											$isi = $row['longitude'];
											$jabatan = $row['alamat'];
						
					
						
					
					
				?>
                <div class="row">
                    <div class="col-lg-12">

                        <form action="deletelokasi.php" method="post">

							<div class="form-group">
                                    <label for="disabledSelect">ID</label>
                                    <input class="form-control" type="text" value="<?php echo $_GET["id"];?>" name="id" readonly="readonly">
                             </div>
							 <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" value=" <?php echo $row["nama"]; ;?>" name="nama" readonly="readonly">
                            </div>
							
							<div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" value=" <?php echo $row["alamat"]; ;?>" name="alamat" readonly="readonly">
                            </div>
							
                            <div class="form-group">
                                <label>Latitude</label>
                                <input class="form-control" value=" <?php echo $row["latitude"]; ;?>" name="latitude" readonly="readonly">
                            </div>
							<div class="form-group">
                                <label>Longitude</label>
                                <input class="form-control" value=" <?php echo $row["longitude"]; ;?>" name="longitude" readonly="readonly">
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





