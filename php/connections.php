<?php

$localhost = "localhost";
$root = "root";
$password = "";
$database ="parkingdb";

$connections = mysqli_connect($localhost, $root, $password, $database);

if($connections->connect_errno){
    echo "Error:" .$connections->errno;
}
