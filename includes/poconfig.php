<?php
ini_set( "display_errors", true );
//define( "PODB_DSN", "sqlsrv:Server=172.16.142.9;Database=aramestan");
define( "PODB_DSN", "dblib:host=172.16.10.12;dbname=aramestan");
define( "PODB_USERNAME", "satia" );
define( "PODB_PASSWORD", "Aa123456?" );
define('PODB_CHARACSET', 'utf8');
require_once __DIR__.'/PODatabase.php';
//require_once 'modules/CustomerPortal/PODatabase.php';

//require_once ('My_pagination.php');
$podb=new PODatabase();
//$pg=New My_pagination();
if ( !function_exists('handleException')) {
    function handleException($exception)
    {
        echo $exception->getMessage();
    }

    set_exception_handler('handleException');
}
?>
