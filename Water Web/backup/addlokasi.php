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
                            Add Lokasi
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Lokasi Management</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Add Lokasi
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<?php
				
				
				?>
                <div class="row">
                    <div class="col-lg-12">

                        <form action="addlokasi.php" method="post">
							<div class="form-group">
                                <label>Nama</label>
                                <input class="form-control" name="nama">
                                <p class="help-block">Masukkan nama Lokasi.</p>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input class="form-control" name="alamat">
                                <p class="help-block">Masukkan alamat Lokasi.</p>
                            </div>
							
							<div class="form-group">
                                <label>Latitude</label>
                                <input class="form-control" name="latitude">
                                <p class="help-block">Masukkan latitude.</p>
                            </div>
							<div class="form-group">
                                <label>Longitude</label>
                                <input class="form-control" name="longitude">
                                <p class="help-block">Masukkan longitude.</p>
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

</body>

</html>





