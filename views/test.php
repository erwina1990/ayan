<?php
include_once("../includes/functions.php");

$result = getEmployees();

$rows = array();
foreach ($result as $r) {
    $row['FirstName'] = $r['FirstName'];
    $row['LastName'] = $r['LastName'];
    $row['Code'] = $r['Code'];
    $row['NationalID'] = $r['NationalID'];
    $row['post'] = $r['post'];
    $row['EmploymentDate'] = $r['EmploymentDate'];
    $row['emptype'] = $r['emptype'];
    $rows[] = $row;
}
var_dump($rows);
?>

