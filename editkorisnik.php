<?php
session_start();
require 'dbconfig/config.php';
if (isset($_GET['ww'])&&(($_GET['ww'])=="n") )
{
	
	echo '<script type="text/javascript"> alert("Korisnik ne postoji. Izvrsite registraciju") </script>';
}
if (isset($_GET['gr'])&&(($_GET['gr'])=="n") )
{
	
echo '<script type="text/javascript"> alert("Password i confirm password se ne podudaraju!!") </script>';
}
if (!isset($_GET['username']) )

{
	session_destroy();
header("Location: pocetna.php");
}
if(isset($_POST['btn-signup']))
{
		
	$username = $_GET['username'];

	$ime = $_POST['first_name'];
	$prez = $_POST['last_name'];
	$password = $_POST['password'];
	$mail = $_POST['email'];
	$cpassword = $_POST['password_confirmation'];
	if($password==$cpassword)
	{
		$query= "select * from Korisnik WHERE Username='$username'";
		$query_run = mysqli_query($conn,$query) or die("I cannot connect to the database because: " . mysqli_error($conn));;
		if(!mysqli_num_rows($query_run)>0)
		{
				echo '<script type="text/javascript"> alert("Zao nam je ali taj username ne postoji...") </script>';
		} 
		
		else
		{
			$hashed = hash('sha512', $password);
			$query= "UPDATE Korisnik SET Ime='$ime',Prezime='$prez',Email='$mail',Password='$password' WHERE Username='$username'";
			$query_run = mysqli_query($conn,$query);
			if($query_run)
			{	
				echo '<script type="text/javascript"> alert("Korisnicki podaci su uspjesno promijenjeni..") </script>';
				if ($_SESSION['username']=='admin') header('location:admin.php?novi=nn');
				else header('location:korisnik.php?novi=nn');
			}
			else
			{
				echo '<script type="text/javascript"> alert("Doslo je do greske, molimo Vas pokusajte opet kasnije!") </script>';
			}
		}
	
	}else
	{
			
			header('location:registracija.php?gr=n');
	}

	
}	

?>
<!DOCTYPE html>
<html>
<head>
<title>Planer za putovanja - Edit podataka za korisnika</title>

<link rel="icon" href="imgs/logo.png" type="image/png">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
   

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    

</head>

<body style="background-image: url('imgs/pozadinareg.jpg'); background-size:cover;">

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
          <a class="navbar-brand" href="#">Planer putovanja</a>
        </div>
       
      </div>
    </nav>

<div class="container" style="margin-top:80px;">

    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form role="form" method="post"  >
                <h2>Uredi podatke</h2>
                <hr class="colorgraph">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="Ime" tabindex="1">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Prezime" tabindex="2">
                        </div>
                    </div>
                </div>
              
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="E-mail adresa" tabindex="4">
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Potvrdite Password" tabindex="6">
                        </div>
                    </div>
                </div>
               

                <hr class="colorgraph">
                <div class="row">

                    <div class="col-xs-12 col-md-6"><button type="submit" name="btn-signup" value="Save" class="btn btn-primary btn-block btn-lg" tabindex="7">Save</button></div>
                   

                </div>
            </form>
        </div>
    </div>
    
<div style="font-size: 15px; color: white; border-top: 1px solid #efefef; border-top-width:3px;  padding: 13px 0; text-align: center; margin: 100px 0 0 0;">
		<p>&copy; Planer za putovanja. Sva prava zadržana</p>
		</div>

</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

</body>
</html>