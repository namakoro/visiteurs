<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Société X</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/logo-nav.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <!-- Logo du site -->
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="../index.html">Acceuil</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Visiteurs <b class="caret"></b>
                        </a>
                            <ul class="dropdown-menu">
                            	<li><a href="selallvi.php">Tous les visiteurs</a></li>
                                <li><a href="seltodvi.php">Aujourd'hui</a></li>
                                <li><a href="selyestvi.php">Hier</a></li>
                                
                            </ul>   
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

        <?php
	// Connect to MySQL
	$mysqli = new mysqli( '192.168.0.22', 'nama', 'djene88', 'baseVisitor' );

	// Check our connection
	if ( $mysqli->connect_error ) {
		die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
	}

	// Select our data
	$sql = "SELECT date_visit, l_name, f_name, company, profession, contact, v_object, obersation FROM Visitor WHERE DATE(date_visit) < CURDATE()";

	$result = $mysqli->query($sql);
	?>

<center><h1> Les visiteurs d'hier </h1>
<br>
<table width="1000px" cellpadding=5 cellspacing=5 border=2>
<tr>
<th style="width: auto; text-align: center;">Date</th>
<th style="width: auto; text-align: center;">Nom</th>
<th style="width: auto; text-align: center;">Prenom</th>
<th style="width: auto; text-align: center;">Nom de la societe</th>
<th style="width: auto; text-align: center;">Profession</th>
<th style="width: auto; text-align: center;">Contact</th>
<th style="width: auto; text-align: center;">Objet de la visite</th>
<th style="width: auto; text-align: center;">Observation</th>
</tr>
<?php while($row = mysqli_fetch_array($result)):?>
<tr>
<td align="center"><?php echo $row['date_visit'];?></td>
<td align="center"><?php echo $row['l_name'];?></td>
<td align="center"><?php echo $row['f_name'];?></td>
<td align="center"><?php echo $row['company'];?></td>
<td align="center"><?php echo $row['profession'];?></td>
<td align="center"><?php echo $row['contact'];?></td>
<td align="center"><?php echo $row['v_object'];?></td>
<td align="center"><?php echo $row['obersation'];?></td>
</tr>
<?php endwhile;
	  $mysqli->close();	?>
</table>
</center>
<br>
<hr>
<br>
<a href="selyestvi.php"><input type="submit" value="Acutalisez"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <script src="../js/boot-drop-hover.js"></script>

      <script>
      //$('[data-toggle="dropdown"]').bootstrapDropdownHover();
      $.fn.bootstrapDropdownHover();
      //$('#dropdownMenu1').bootstrapDropdownHover();
      //$('.navbar [data-toggle="dropdown"]').bootstrapDropdownHover();
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>


</body>

</html>

