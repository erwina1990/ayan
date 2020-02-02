<?php

$db=mysqli_connect('185.113.56.47','ayan','#13980223?','kashan137');

if(!$db)
{
    echo mysqli_connect_error();
}

mysqli_query($db,"set names 'utf8'") ;
error_reporting(E_ALL);
ini_set('display_errors',1);
 session_start();



require_once 'function.php';
require_once 'action.php';

?>

