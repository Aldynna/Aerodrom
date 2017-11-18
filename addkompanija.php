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

if(isset($_POST['btn-signup']))
{
		
	$username = $_POST['display_name'];

	if($username!=null)
	{
		$query= "select * from AvioKompanija WHERE NazivAviokompanije='$username'";
		$query_run = mysqli_query($conn,$query) or die("I cannot connect to the database because: " . mysqli_error($conn));;
		if(mysqli_num_rows($query_run)>0)
		{
				echo '<script type="text/javascript"> alert("Aviokompanija je vec u bazi, unesite drugu...") </script>';
		} 
		
		else
		{
			
			$query= "insert into AvioKompanija (NazivAviokompanijevalues) values ('$username')";
			$query_run = mysqli_query($conn,$query);
			if($query_run)
			{	
				echo '<script type="text/javascript"> alert("Aviokompanija uspjesno dodana..") </script>';
				
				header('location:pocetna.php?novi=nn');
			}
			else
			{
				echo '<script type="text/javascript"> alert("Doslo je do greske, molimo Vas pokusajte opet kasnije!") </script>';
			}
		}
	
	}else
	{
			
			header('location:addkompanija.php?gr=n');
	}

	
}	

?>
<!DOCTYPE html>
<html>
<head>
<title>Unos nove kompanije</title>

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
                <h2>Registriraj se</h2>
                <hr class="colorgraph">
               
                <div class="form-group">
                    <input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Naziv kompanije" tabindex="3">
                </div>
               
          
                

                <hr class="colorgraph">
                <div class="row">

                    <div class="col-xs-12 col-md-6"><button type="submit" name="btn-signup" value="Dodaj" class="btn btn-primary btn-block btn-lg" tabindex="7">Dodaj</button></div>
                   

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