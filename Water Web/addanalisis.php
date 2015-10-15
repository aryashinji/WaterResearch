<?php
require'qs_connection.php';

if(isset($_POST['idlokasi']) && isset($_POST['ph'] )  ){
	// run information through authenticator
	//$alamat=$_POST["alamat"];$latitude=$_POST["latitude"];$longitude=$_POST["longitude"];$nama=$_POST["nama"];
	
	$resultx = mysql_query("SELECT * FROM permenkes WHERE id_permenkes");
						$row = mysql_fetch_array($resultx);
											
											$bau = $row['bau'];
											$warna = $row['warna'];
											$rasa = $row['rasa'];
											$temperatur_atas = $row['temperatur_atas'];
											$temperatur_bawah = $row['temperatur_bawah'];
											//$tembaga = $row['tembaga'];
											//$dhl = $row['dhl'];
											$ph_atas = $row['ph_atas'];
											$ph_bawah = $row['ph_bawah'];
											$tds = $row['tds'];
											$besi = $row['besi'];
											$fluorida = $row['fluorida'];
											$no2= $row['no2'];
	
	if($_POST["ph"]<=$ph_atas&&
	$_POST["ph"]>=$ph_bawah&&
	$_POST["bau"]==$bau &&
	$_POST["warna"]<=$warna &&
	$_POST["rasa"]==$rasa &&
	$_POST["temperatur"]>=$temperatur_bawah &&
	$_POST["temperatur"]<=$temperatur_atas &&
	$_POST["tds"]<=$tds &&
	$_POST["besi"] <= $besi &&
	$_POST["fluorida"] <= $fluorida &&
	$_POST["no2"] <= $no2  ) $status_permenkes="Aman untuk diminum";
	else $status_permenkes="Tidak aman untuk diminum";
	
	$query="INSERT INTO analisis_kualitas(id,status_permenkes, status_kelas, temperatur,ph,tds,cadmium,dhl,bau,warna, rasa,besi,no2,fluorida) VALUES ('".$_POST["idlokasi"]."' , '$status_permenkes','','".$_POST["temperatur"]."' , '".$_POST["ph"]."','".$_POST["tds"]."','".$_POST["cadmium"]."', '".$_POST["dhl"]."','".$_POST["bau"]."','".$_POST["warna"]."','".$_POST["rasa"]."', '".$_POST["besi"]."', '".$_POST["no2"]."', '".$_POST["fluorida"]."')";
	
	$result1 = mysql_query($query);
	
	//$resultloc = mysql_query("SELECT * FROM lokasi WHERE id='".$_POST["idlokasi"]."'");
						//$rowloc = mysql_fetch_array($resultloc);
	if($status_permenkes=="Aman untuk diminum"){$status="aman";}else $status="rusak";
	$insertloc = mysql_query("UPDATE lokasi SET status='$status' WHERE id='".$_POST["idlokasi"]."'");			
						
	//echo $query;	
		//$result1 = mysql_query("INSERT INTO analisis_kualitas(id,status_permenkes, status_kelas, temperatur,ph,tds,cadmium,dhl,bau,warna, rasa,besi,no2,fluor) VALUES ('".$_POST["idlokasi"]."' , '$status_permenkes','','".$_POST["temperatur"]."' , '".$_POST["ph"]."','".$_POST["tds"]."','".$_POST["cadmium"]."', '".$_POST["dhl"]."','".$_POST["bau"]."','".$_POST["warna"]."','".$_POST["rasa"]."', '".$_POST["besi"]."', '".$_POST["no2"]."', '".$_POST["fluor"]."')");
				
			//echo $query;
	//echo $bau;
											//echo $warna;
											//echo $rasa;
											//echo $temperatur_atas;
											//echo $temperatur_bawah ;
											//$tembaga = $row['tembaga'];
											//$dhl = $row['dhl'];
											//echo $ph_atas ;
											//echo $ph_bawah ;
											//echo $tds ;
											//echo $besi ;
											//echo $fluorida ;
											//echo $no2;
		header('Location: analisis_kualitas.php?status=ok');
		
	

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
                            Add Analisis
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Analisis Kualitas</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Add Analisis
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<?php
				
				
				?>
                <div class="row">
                    <div class="col-lg-12">

						 <form action="addanalisis.php" method="post">

							<div class="form-group">
                                <label>PH</label>
                                <input class="form-control" name="ph" >
								
                            </div>
							
							
							<?php
							$query = mysql_query("Select * from lokasi"); // Run your query

							echo '<div class="form-group"> <label>Lokasi</label><select class="form-control" name="idlokasi">'; // Open your drop down box

							// Loop through the query results, outputing the options one by one
							while ($row = mysql_fetch_array($query)) {
							   echo '<option value="'.$row['id'].'">'.$row['alamat'].'</option>';
							}

							echo '</select></div>';// Close your drop down box
							?>
							<div class="form-group">
                                <label>Bau</label>
                                <input class="form-control" name="bau" >
								<p class="help-block">Berbau / Tidak Berbau </p>
                            </div>
							<div class="form-group">
                                <label>Warna</label>
                                <input class="form-control" name="warna" >
								<p class="help-block">Unit of measure : TCU</p>
                            </div>
							<div class="form-group">
                                <label>Rasa</label>
                                <input class="form-control" name="rasa" >
								<p class="help-block">Berasa / Tidak Berasa</p>
                            </div>
							<div class="form-group">
                                <label>Temperatur</label>
                                <input class="form-control" name="temperatur"  >
								<p class="help-block">Unit of measure : derajat Celcius </p>
                            </div>
							<div class="form-group">
                                <label>DHL</label>
                                <input class="form-control" name="dhl"  >
								<p class="help-block">Unit of measure : µmhos/cm</p>
                            </div>
							<div class="form-group">
                                <label>TDS</label>
                                <input class="form-control" name="tds"  >
								<p class="help-block">Unit of measure : mg/L</p>
                            </div>
							<div class="form-group">
                                <label>Kadmium</label>
                                <input class="form-control"  name="cadmium"  >
								<p class="help-block">Unit of measure : mg/L</p>
                            </div>
							<div class="form-group">
                                <label>Besi</label>
                                <input class="form-control" name="besi"  >
								<p class="help-block">Unit of measure : mg/L</p>
                            </div>
							<div class="form-group">
                                <label>Fluorida</label>
                                <input class="form-control" name="fluorida"  >
								<p class="help-block">Unit of measure : mg/L</p>
                            </div>
							<div class="form-group">
                                <label>NO2</label>
                                <input class="form-control"  name="no2"  >
								<p class="help-block">Unit of measure : mg/L</p>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                            <a href="addanalisis.php" class="btn btn-primary" role="button">Back</a><br><br>

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





