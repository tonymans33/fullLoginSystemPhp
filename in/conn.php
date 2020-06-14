<?php

$servername = "localhost";
$serveruser = "root";
$serverpwd = "" ;
$dbname = "final";

$conn = mysqli_connect($servername , $serveruser , $serverpwd, $dbname);

if(!$conn)
{
    echo "Connection Failed";
}

?>