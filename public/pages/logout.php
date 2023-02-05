<?php
session_start();
$session = array();
setcookie('userId', '');
session_destroy();
header('location: ../../index.php');

