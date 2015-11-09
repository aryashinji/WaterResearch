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
	
	if($_POST["tds"]>=0&&$_POST["tds"]<=1000 && $_POST["dhl"]>=0&&$_POST["dhl"]<=1000)$tingkatair="Aman";
	else if($_POST["tds"]<=10000&&$_POST["dhl"]<=1500)$tingkatair="Rawan";
	else if($_POST["tds"]<=100000&&$_POST["dhl"]<=5000)$tingkatair="Kritis";
	else $tingkatair="Rusak";
	
	$query="INSERT INTO analisis_kualitas(id,status_permenkes, status_kelas, temperatur,ph,tds,cadmium,dhl,bau,warna, rasa,besi,no2,fluorida,tingkat_air) VALUES ('".$_POST["idlokasi"]."' , '$status_permenkes','','".$_POST["temperatur"]."' , '".$_POST["ph"]."','".$_POST["tds"]."','".$_POST["cadmium"]."', '".$_POST["dhl"]."','".$_POST["bau"]."','".$_POST["warna"]."','".$_POST["rasa"]."', '".$_POST["besi"]."', '".$_POST["no2"]."', '".$_POST["fluorida"]."', '$tingkatair')";
	
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
                            Add Analisis
                        </h1>
                    </div>
                </div>
                <!-- /.row -->
				<?php
				
				
				?>
                <div class="row">
                    <div class="col-lg-12">

						 <form role="form" action="addanalisis.php" method="post">
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
                                <label>PH</label>
                                <input class="form-control" name="ph" >
                            </div>
                            <label>Bau</label>
							<div class="form-group">
                                <select class="form-control">
                                    <option>Berbau</option>
                                    <option>Tidak Berbau</option>
                                </select>
                            </div>
                            <label>Warna</label>
							<div class="form-group input-group">
                                <input type="text" class="form-control" name="warna" >
								<span class="input-group-addon">TCU (Test Color Unit)</span>
                            </div>
                            <label>Rasa</label>
							<div class="form-group">
                                <select class="form-control">
                                    <option>Berasa</option>
                                    <option>Tidak Berasa</option>
                                </select>
                            </div>
                            <label>Temperatur</label>
							<div class="form-group input-group">
                                <input type="text" class="form-control" name="temperatur"  >
								<span class="input-group-addon"><sup>o</sup> Celcius</span>
                            </div>
                            <label>DHL</label>
							<div class="form-group input-group">
                                <input type="text" class="form-control" name="dhl"  >
                                <span class="input-group-addon">µmhos/cm</span>
                            </div>
                            <label>TDS</label>
							<div class="form-group input-group">
                                <input type="text" class="form-control" name="tds"  >
                                <span class="input-group-addon">mg/L</span>
                            </div>
                            <label>Kadmium</label>
							<div class="form-group input-group">
                                <input type="text" class="form-control"  name="cadmium"  >
								<span class="input-group-addon">mg/L</span>
                            </div>
                            <label>Besi</label>
							<div class="form-group input-group">
                                <input type="text" class="form-control" name="besi"  >
								<span class="input-group-addon">mg/L</span>
                            </div>
                            <label>Fluorida</label>
							<div class="form-group input-group">
                                <input type="text" class="form-control" name="fluorida"  >
								<span class="input-group-addon">mg/L</span>
                            </div>
                            <label>NO2</label>
							<div class="form-group input-group">
                                <input type="text" class="form-control"  name="no2"  >
								<span class="input-group-addon">mg/L</span>
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
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

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/sb-admin-2.js"></script>

</body>

</html>





