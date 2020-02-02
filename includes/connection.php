<?php
/**
 * Created by PhpStorm.
 * User: Asadi
 * Date: 5/14/2019
 * Time: 11:29 AM
 */

DEFINE ('DB_HOSTNAME', '185.113.56.47');
DEFINE ('DB_DATABASE', 'kashan137');
DEFINE ('DB_USERNAME', 'ayan');
DEFINE ('DB_PASSWORD', '#13980223?');

function OpenCon()
{
    $conn = new mysqli(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die("Connect failed: %s\n". $conn -> error);
    mysqli_set_charset($conn,"utf8");
    error_reporting(E_ALL);
    ini_set('display_errors',1);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

function CloseCon($conn)
{
    $conn -> close();
}
define('URLhome','http://ayan.arak.ir/');
define('Header_Address','http://185.113.56.50/ayan-new/views/header1.php');




