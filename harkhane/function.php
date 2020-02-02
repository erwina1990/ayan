<?php
require_once 'db.php';

/*function get_typetree()

{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM vtiger_cf_1851 ORDER BY cf_1851id DESC ");
    return $query;
}*/

function set_crmentity($crmid, $smcreatorid, $smownerid, $modifiedby, $setype, $createdtime, $modifiedtime, $version, $presence, $deleted, $smgroupid, $source)
{
    global $db;
    $query = mysqli_query($db, "INSERT INTO vtiger_crmentity (crmid,smcreatorid,smownerid,modifiedby,setype,createdtime,modifiedtime,version,presence,deleted,smgroupid,source) VALUES ('$crmid','$smcreatorid','$smownerid','$modifiedby','$setype','$createdtime','$modifiedtime','$version','$presence','$deleted','$smgroupid','$source') ");
    return $query;
}


/*function register($name, $family, $address, $mobile, $postcode, $quantityC, $quantityS, $quantityA, $quantityZ, $quantityN, $quantityAB, $quantitySi, $quantityB, $quantityH, $quantityZA)*/
function register($name, $family, $address, $mobile, $postcode, $typeoftree)
{

    global $db;
    $query = mysqli_query($db, " UPDATE vtiger_crmentity_seq SET id=id+1; ");

    $query = mysqli_query($db, " SELECT id FROM vtiger_crmentity_seq  ");
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $id = $row['id'];


            date_default_timezone_set("Asia/Tehran");
            $t = time();
            $createdtime = date("Y-m-d G.i:s", $t);
            $modifiedtime = date("Y-m-d G.i:s", $t);

            /*$createdtime=date("Y-m-d G.i:s",time());*/
            /*$modifiedtime = date("Y-m-d G.i:s", time());*/
            /*
                        $sql = "INSERT INTO vtiger_harkhaneyekderakhtcf (harkhaneyekderakhtid,harkhaneyekderakht_tks_name, cf_1172 , cf_1176  , cf_1174 , cf_1178 ,     cf_1202 )
                                                                    VALUES ('$id',                '$name'                  ,'$family','$address','$mobile','$postcode','$typeoftree')";*/
            /*   $query = mysqli_query($db, $sql);*/
            $query = mysqli_query($db, "INSERT INTO vtiger_harkhaneyekderakht (harkhaneyekderakhtid)VALUES ('$id')");

            $query = mysqli_query($db, "INSERT INTO vtiger_crmentity (crmid,smcreatorid,smownerid,modifiedby,setype,            createdtime   ,modifiedtime  ,version,presence,deleted,smgroupid,source) 
                                                                    VALUES ('$id',    '1',        '1',    '1',    'Harkhaneyekderakht','$createdtime','$modifiedtime','0'   ,'1'     ,'0'    ,'0'      ,'CRM') ");

            /* var_dump($sql);*/

            var_dump($query);
            if ($query) {

                return true;

            }
        }
    } else {
        return false;
    }

}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


function get_user_order()
{
    global $db;
    $query = mysqli_query($db, "SELECT * FROM vtiger_cf_1851 ORDER BY cf_1851id  ");
    $orders = array();
    while ($row = mysqli_fetch_array($query)) {
        $orders[] = $row;
    }
    return $orders;
}
