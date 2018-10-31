<?php
require 'Assets/Include/core.inc.php';
require 'Assets/Include/connect.inc.php';

session_destroy();

header("Location: triton.php");
?>