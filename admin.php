
<?php
session_start();
require 'dbconfig/config.php';
if(isset($_POST['logout']))
{
session_destroy();
header('location:index.php');
}
if (isset($_GET['novi'])&&(($_GET['novi'])=="nn") )
{
	
	echo '<script type="text/javascript"> alert("Korisnicki podaci su uspjesno promijenjeni..") </script>';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Aerodrom - Admin</title>
   <link rel="icon" type="image/png" href="imgs/logo.png">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
   
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style>
	.linija { border-style:hidden; }
	</style>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
		 <a class="navbar-brand" href="#"><img src="imgs/logo.png" style="height:30px; width:50px;"></a>
			<a class="navbar-brand" href="#">Stranica za administratore</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<form class="navbar-form navbar-right" method="post" action="pocetna.php">
				<div class="form-group">
					<a href="registracija.php"><input type="button" id="register_btn" class="button" value="Unesite novog korisnika" /></a>
					
				</div>
			</form>
        </div>
<!--/.navbar-collapse -->
    </div>
</nav>


<div class="panel panel-default" style="width:50%; height: 350px; float:left;">
    <div class="panel-heading">KORISNICI</div>
    <div class="panel-body">
        <div style="background-image: url('imgs/users.png');  height:250px; background-repeat:repeat-x;">
            <p style="text-align:center;">
			<a href="adminkorisnik.php"><input type="button" id="register_btn" class="button" value="Prikaži sve korisnike" /></a>
            </p>
        </div>
    </div>
</div>

<div class="panel panel-default" style="width:50%; height: 350px; float:left;">
    <div class="panel-heading">AVIOKOMPANIJE</div>
    <div class="panel-body">
        <div style="background-image: url('imgs/prevoznici.jpg');  height:250px; background-repeat:no-repeat;">
            <p style="text-align:center;">
                <a href="adminkompanija.php"><input type="button" id="register_btn" class="button" value="Prikaži sve aviokompanije" /></a>
            </p>
            </div>
        </div>
</div>

<div class="panel panel-default" style="width:50%; height: 350px; float:left;">
    <div class="panel-heading">PUTNE KLASE</div>
    <div class="panel-body">
        <div style="background-image: url('imgs/klase.jpg');  height:250px; background-repeat:no-repeat;">
            <p style="text-align:center;">
               <a href="adminkompanija.php"><input type="button" id="register_btn" class="button" value="Prikaži sve putne klase" /></a>
            </p>
            </div>
        </div>
</div>

<div class="panel panel-default" style="width:50%; height: 350px; float:left;">
    <div class="panel-heading">RUTE LETENJA</div>
    <div class="panel-body">
        <div style="background-image: url('imgs/rute2.jpg');  height:250px; background-repeat:no-repeat;">
            <p style="text-align:center;">
               <a href="adminkorisnik.php"><input type="button" id="register_btn" class="button" value="Prikaži sve rute letenja" /></a>
            </p>
            </div>
        </div>
</div>

<div id="navbar" class="navbar-collapse collapse"  style="margin: 30px 50px 0 50px; width: 50%;">
			<form class="navbar-form navbar-right" method="post" action="pocetna.php">
				<div class="form-group">
					<input name="logout" type="submit" class="btn btn-success" id="logout_btn" value="Odjavi se"><br>
					
				</div>
			</form>
        </div>

<div style="font-size: 15px; color: #c9c9c9; border-top: 1px solid black; padding: 13px 0; text-align: center; margin: 10px 0 0 0;">
		<p>&copy; Aerodrom. Sva prava zadržana</p>
		</div>
</body>
</html>