<?php

session_start();
require 'dbconfig/config.php';



if (isset($_GET['username']) )

{

$username = $_GET['username'];
$sql=("DELETE FROM AvioKompanija WHERE NazivAviokompanije='$username'");
$result = mysqli_query($conn, $sql);
header("Location: admin.php");
}
else
{
session_destroy();
header("Location: pocetna.php");

}

?>