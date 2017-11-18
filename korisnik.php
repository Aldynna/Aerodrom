<?php
session_start();
//$host="localhost:3306"; // Host name
//$username="root"; // Mysql username
//$password=""; // Mysql password
//$db_name="mydb"; // Database name
//$tbl_name="korisnik"; // Table name

// Connect to server and select databse.
//$conn =mysqli_connect("$host", "$username", "$password","$db_name")or die("cannot connect");
//mysqli_select_db("$db_name")or die("cannot select DB");
require 'dbconfig/config.php';
if(isset($_POST['logout']))
{
session_destroy();
header('location:pocetna.php');
}
if (isset($_GET['novi'])&&(($_GET['novi'])=="nn") )
{
	
	echo '<script type="text/javascript"> alert("Korisnicki podaci su uspjesno promijenjeni..") </script>';
}
?>


?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Aerodrom - Korisnik</title>
   <link rel="icon" type="image/png" href="imgs/logo.png">
      <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">

  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <link rel='stylesheet' href='css/style.css' />

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <style>
  @font-face {
	font-family: TwentiethCentury;
	src: url('TwentiethCentury.ttf') format('truetype');
} </style>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
         <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <a class="navbar-brand" href="#"><img src="imgs/logo.png" style="height:30px; width:50px;"></a>
          <a class="navbar-brand" href="#">Aerodrom</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" method="post">
         <input name="logout" type="submit" class="btn btn-success" id="logout_btn" value="Odjavi se"/><br>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>
 
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron" style="background-image: url('imgs/pozadina2.jpg'); height:550px; width:100%; background-size:cover;">
      <div class="container"  style="margin-top: 100px;">
        <h1 style="text-align: center; padding: 60px 0 25px 0; color: black; font-family: TwentiethCentury; font-size: 45px;">Dobrodošli, <?php echo $_SESSION['username'] ?>!</h1>
        <p style="text-align: center; color: black;">Ovdje možete vidjeti sve moguće rute za Vaše željeno putovanje, sve prevoznike, kao i rezervisati kartu.<br>Sve na jednom mjestu!</p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
			<div style="display:inline-block;">
				<h4>Pogledajte sve moguće rute:</h4>
				<img src="imgs/rute.jpg" style="width:350px;height:250px;border:3px solid black;"> 
				<?php 
					$username = $_SESSION['username'];
					?>
				<td><a href='editkorisnik.php?username=<?php echo "$username";?> '><input type='button' id='register_btn' class='btn btn-primary' value='Edit'></a></td> 
				<p><a class="btn btn-default" href='editkorisnik.php?username=<?php echo "$username";?> ' role="button">Vidi više &raquo;</a></p>
			</div>
		
			<div style="display:inline-block;">
				<h4>Pogledajte sve moguće prevoznike:</h4>
				<img src="imgs/prevoznici.jpg" style="width:350px;height:250px;border:3px solid black;"> 
				<p><a class="btn btn-default" href="#" role="button">Vidi više &raquo;</a></p>
			</div>
        
			<div style="display:inline-block;">
				<h4>Pogledajte svoje karte i opciju kupovine novih:</h4>
				<img src="imgs/karte.jpg" style="width:350px;height:250px;border:3px solid black;"> 
				<p>
					<?php 
					$username = $_SESSION['username'];
					$sql = "SELECT Username FROM korisnik WHERE Username='$username'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
					echo "
					<a class='btn btn-default' href='edit.php?id=" . $row['username'] . "' role='button'>Vidi više &raquo;</a>
					";
					}}
	
					?></p>
			</div>
        </div>
	  
      <div style="font-size: 15px; color: #c9c9c9; border-top: 1px solid black; padding: 13px 0; text-align: center; margin: 100px 0 0 0;">
		<p>&copy; Aerodrom. Sva prava zadržana</p>
		</div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>