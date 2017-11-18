
<?php
session_start();
require 'dbconfig/config.php';
if(isset($_POST['logout']))
{
session_destroy();
header('location:index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Planer za putovanja - Admin</title>
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

<body style="background-image: url('imgs/pozadinareg.jpg'); background-size:cover;">
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
		 <a class="navbar-brand" href="#"><img src="imgs/logo.png" style="height:30px; width:50px;"></a>
			<a class="navbar-brand" href="#">Stranica za administratore</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<form class="navbar-form navbar-right" method="post" action="pocetna.php">
				<div class="form-group">
					<a href="addkompanija.php"><input type="button" id="register_btn" class="button" value="Unesite novu kompaniju" /></a>
					
				</div>
			</form>
        </div>
<!--/.navbar-collapse -->
    </div>
</nav>

	<div style="margin-top: 150px; margin-left: 200px;">
		<table id="myTable" style="width:80%;" class="linija">
			<form action='drugiadmin.php' method='post'>
				<tr>
					<th style="height: 50px;  text-align: center; background-color: #699bcc; color: white;">Sifra aviokompanije</th>
					<th style="height: 50px;  text-align: center; background-color: #699bcc; color: white;">Naziv aviokompanije</th>
				
					<th style="height: 50px;  text-align: center; background-color: #699bcc; color: white;">Obriši</th>
				</tr>
			
<?php 
$sql = "SELECT * FROM AvioKompanija";
$result = mysqli_query($conn, $sql)or die(mysqli_error($result));;

if (mysqli_num_rows($result) > 0) {
    // output data of each row
$counter = 0; 
    while($row = mysqli_fetch_assoc($result)) {
$counter++;
	echo 
			"<tr >
				<td id='uname'>". $row["AviokompanijaID"]. "</td> 
				<td> " . $row["NazivAviokompanije"]. " </td>
		
				<td><a href='deletekompanija.php?username=" . $row['NazivAviokompanije'] . "'><input type='button' id='register_btn' class='btn btn-primary' value='Obriši'></a></td> 
   
				
			</tr> ";
    }
} else {
    echo '0 results';
}

?>
 


</form>
</table>
</div>
<div id="navbar" class="navbar-collapse collapse"  style="margin: 30px 50px 0 50px; width: 50%;">
			<form class="navbar-form navbar-right" method="post" action="pocetna.php">
				<div class="form-group">
					<input name="logout" type="submit" class="btn btn-success" id="logout_btn" value="Odjavi se"><br>
					
				</div>
			</form>
        </div>

<div style="font-size: 15px; color: #c9c9c9; border-top: 1px solid white; border-top-width:3px; padding: 13px 0; text-align: center; margin: 10px 0 0 0;">
		<p>&copy; Planer za putovanja. Sva prava zadržana</p>
		</div>
</body>
</html>