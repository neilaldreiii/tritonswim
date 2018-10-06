<?php
/*
$server = 'localhost';
$user = 'id6537497_triton';
$password = 'triton';
$database = 'id6537497_admin';

if (@$con = mysqli_connect($server, $user, $password, $database)) {

} elseif(mysqli_connect_errno()) {

    echo 'Cannot Establish Connection';

}*/
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'admin';

if (@$con = mysqli_connect($server, $user, $password, $database)) {

} elseif(mysqli_connect_errno()) {

    echo 'Cannot Establish Connection';

}
/*
$server = 'localhost';
$user = 'id6580230_tritonadmin';
$password = 'triton';
$database = 'id6580230_admin';

if (@$con = mysqli_connect($server, $user, $password, $database)) {

} elseif(mysqli_connect_errno()) {

    echo 'Cannot Establish Connection';

}*/
?>