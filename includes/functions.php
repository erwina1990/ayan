<?php
/**
 * Created by PhpStorm.
 * User: Asadi
 * Date: 5/14/2019
 * Time: 11:29 AM
 */
require 'connection.php';
require 'date.php';
require 'lastupdate.php';
function sqli($db, $value)
{
    if (get_magic_quotes_gpc())
        $value = stripcslashes($value);
    if (function_exists("mysqli_real_escape_string"))
        $value = mysqli_real_escape_string($db, $value);
    else
        $value = addcslashes($value);

    return $value;
}


function getMediumContract($filter = null)
{
    $db = OpenCon();

    $query = "SELECT * FROM vtiger_mediumcontract INNER JOIN vtiger_mediumcontractcf ON vtiger_mediumcontractcf.mediumcontractid=vtiger_mediumcontract.mediumcontractid 
            INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_mediumcontract.mediumcontractid WHERE vtiger_crmentity.deleted='0' AND  cf_1660 <> 'قرارداد کلان'  AND cf_1682 <> 'طرف قرارداد سازمان میادین' ";

    if (isset($filter['mediumcontract_tks_mediumcontr']) && !empty($filter['mediumcontract_tks_mediumcontr']))
        $query .= 'AND mediumcontract_tks_mediumcontr = "' . sqli($db, $filter['mediumcontract_tks_mediumcontr']) . '"';

    if (isset($filter['mediumcontract_tks_startdate']) && !empty($filter['mediumcontract_tks_startdate'])) {
        $date = preg_split("/\//", sqli($db, trim($filter['mediumcontract_tks_startdate'])));
        $query .= 'AND mediumcontract_tks_startdate LIKE "%' . jalali_to_gregorian(trim($date[0]), trim($date[1]), trim($date[2])) . '%"';
    }

    if (isset($filter['mediumcontract_tks_enddate']) && !empty($filter['mediumcontract_tks_enddate'])) {
        $date = preg_split("/\//", sqli($db, trim($filter['mediumcontract_tks_enddate'])));
        $query .= 'AND mediumcontract_tks_enddate LIKE "%' . jalali_to_gregorian(trim($date[0]), trim($date[1]), trim($date[2])) . '%"';
    }

    if (isset($filter['cf_1410']) && !empty($filter['cf_1410']))
        $query .= 'AND cf_1410 LIKE "%' . sqli($db, $filter['cf_1410']) . '%"';

    if (isset($filter['mediumcontract_tks_contractor']) && !empty($filter['mediumcontract_tks_contractor']))
        $query .= 'AND mediumcontract_tks_contractor LIKE "%' . sqli($db, $filter['mediumcontract_tks_contractor']) . '%"';

    if (isset($filter['cf_1426']) && !empty($filter['cf_1426']))
        $query .= 'AND cf_1426 LIKE "%' . sqli($db, $filter['cf_1426']) . '%"';

    if (isset($filter['cf_1424']) && !empty($filter['cf_1424']))
        $query .= 'AND cf_1424 LIKE "%' . sqli($db, $filter['cf_1424']) . '%"';

    if (isset($filter['mediumcontract_tks_durationtom']) && !empty($filter['mediumcontract_tks_durationtom']))
        $query .= 'AND mediumcontract_tks_durationtom LIKE "%' . sqli($db, $filter['mediumcontract_tks_durationtom']) . '%"';


    if (isset($filter['cf_1412']) && !empty($filter['cf_1412']))
        $query .= 'AND cf_1412 = "' . trim(sqli($db, $filter['cf_1412'])) . '"';

    if (isset($filter['cf_1660']) && !empty($filter['cf_1660']))
        $query .= 'AND cf_1660 = "' . sqli($db, $filter['cf_1660']) . '"';

    $result = $db->query($query);
    CloseCon($db);
    return $result;
}

function getHugeContract($filter = null)
{
    $db = OpenCon();

    $query = "SELECT * FROM vtiger_mediumcontract INNER JOIN vtiger_mediumcontractcf ON vtiger_mediumcontractcf.mediumcontractid=vtiger_mediumcontract.mediumcontractid 
						INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_mediumcontract.mediumcontractid
					  INNER JOIN vtiger_cf_1660 ON vtiger_cf_1660.cf_1660=vtiger_mediumcontractcf.cf_1660
					WHERE vtiger_crmentity.deleted='0' AND vtiger_cf_1660.cf_1660id = 3 ";

    if (isset($filter['mediumcontract_tks_mediumcontr']) && !empty($filter['mediumcontract_tks_mediumcontr']))
        $query .= 'AND mediumcontract_tks_mediumcontr = "' . sqli($db, $filter['mediumcontract_tks_mediumcontr']) . '"';

    if (isset($filter['mediumcontract_tks_startdate']) && !empty($filter['mediumcontract_tks_startdate'])) {
        $date = preg_split("/\//", sqli($db, trim($filter['mediumcontract_tks_startdate'])));
        $query .= 'AND mediumcontract_tks_startdate LIKE "%' . jalali_to_gregorian(trim($date[0]), trim($date[1]), trim($date[2])) . '%"';
    }

    if (isset($filter['mediumcontract_tks_enddate']) && !empty($filter['mediumcontract_tks_enddate'])) {
        $date = preg_split("/\//", sqli($db, trim($filter['mediumcontract_tks_enddate'])));
        $query .= 'AND mediumcontract_tks_enddate LIKE "%' . jalali_to_gregorian(trim($date[0]), trim($date[1]), trim($date[2])) . '%"';
    }

    if (isset($filter['cf_1410']) && !empty($filter['cf_1410']))
        $query .= 'AND cf_1410 LIKE "%' . sqli($db, $filter['cf_1410']) . '%"';

    if (isset($filter['mediumcontract_tks_contractor']) && !empty($filter['mediumcontract_tks_contractor']))
        $query .= 'AND mediumcontract_tks_contractor LIKE "' . sqli($db, $filter['mediumcontract_tks_contractor']) . '%"';

    if (isset($filter['mediumcontract_tks_amountcontr']) && !empty($filter['mediumcontract_tks_amountcontr']))
        $query .= 'AND mediumcontract_tks_amountcontr LIKE "' . sqli($db, $filter['mediumcontract_tks_amountcontr']) . '%"';

    if (isset($filter['mediumcontract_tks_durationtom']) && !empty($filter['mediumcontract_tks_durationtom']))
        $query .= 'AND mediumcontract_tks_durationtom LIKE "' . sqli($db, $filter['mediumcontract_tks_durationtom']) . '"';

    if (isset($filter['cf_1412']) && !empty($filter['cf_1412']))
        $query .= 'AND cf_1412 = "' . trim(sqli($db, $filter['cf_1412'])) . '"';

    $result = $db->query($query);

    CloseCon($db);

    return $result;
}

function get_tender($filter = null)
{
    $db = OpenCon();

    $query = "SELECT *  FROM vtiger_tenderoffercf 
            INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_tenderoffercf.tenderofferid WHERE vtiger_crmentity.deleted='0' ";

    if (isset($filter['cf_1520']) && !empty($filter['cf_1520']))
        $query .= 'AND cf_1520 LIKE "%' . sqli($db, $filter['cf_1520']) . '%"';

    if (isset($filter['cf_1498']) && !empty($filter['cf_1498']))
        $query .= 'AND cf_1498 LIKE "' . sqli($db, $filter['cf_1498']) . '"';

    if (isset($filter['cf_1490']) && !empty($filter['cf_1490']))
        $query .= 'AND cf_1490 LIKE "%' . sqli($db, $filter['cf_1490']) . '%"';

    if (isset($filter['cf_1492']) && !empty($filter['cf_1492']))
        $query .= 'AND cf_1492 LIKE "%' . sqli($db, $filter['cf_1492']) . '%"';

    if (isset($filter['cf_1494']) && !empty($filter['cf_1494'])) {
        $date = preg_split("/\//", sqli($db, trim($filter['cf_1494'])));
        $query .= 'AND cf_1494 LIKE "%' . jalali_to_gregorian(trim($date[0]), trim($date[1]), trim($date[2])) . '%"';
    }

    if (isset($filter['cf_1496']) && !empty($filter['cf_1496'])) {
        $date = preg_split("/\//", sqli($db, trim($filter['cf_1496'])));
        $query .= 'AND cf_1496 LIKE "%' . jalali_to_gregorian(trim($date[0]), trim($date[1]), trim($date[2])) . '%"';
    }

    if (isset($filter['cf_1500']) && !empty($filter['cf_1500'])) {
        $date = preg_split("/\//", sqli($db, trim($filter['cf_1500'])));
        $query .= 'AND cf_1500 LIKE "%' . jalali_to_gregorian(trim($date[0]), trim($date[1]), trim($date[2])) . '%"';
    }
    if (isset($filter['cf_1504']) && !empty($filter['cf_1504']))
        $query .= 'AND cf_1504 LIKE "%' . sqli($db, $filter['cf_1504']) . '%"';

    if (isset($filter['cf_1506']) && !empty($filter['cf_1506']))
        $query .= 'AND cf_1506 LIKE "%' . sqli($db, $filter['cf_1506']) . '%"';

    if (isset($filter['cf_1508']) && !empty($filter['cf_1508'])) {
        $date = preg_split("/\//", sqli($db, trim($filter['cf_1508'])));
        $query .= 'AND cf_1508 LIKE "%' . jalali_to_gregorian(trim($date[0]), trim($date[1]), trim($date[2])) . '%"';
    }
    if (isset($filter['cf_1510']) && !empty($filter['cf_1510']))
        $query .= 'AND cf_1510 LIKE "%' . sqli($db, $filter['cf_1510']) . '%"';

    if (isset($filter['cf_1512']) && !empty($filter['cf_1512']))
        $query .= 'AND cf_1512 LIKE "%' . sqli($db, $filter['cf_1512']) . '%"';

    if (isset($filter['cf_1514']) && !empty($filter['cf_1514']))
        $query .= 'AND cf_1514 LIKE "%' . sqli($db, $filter['cf_1514']) . '%"';

    if (isset($filter['cf_1602']) && !empty($filter['cf_1602']))
        $query .= 'AND cf_1602 LIKE "%' . sqli($db, $filter['cf_1602']) . '%"';

    if (isset($filter['cf_1604']) && !empty($filter['cf_1604']))
        $query .= 'AND cf_1604 LIKE "%' . sqli($db, $filter['cf_1604']) . '%"';

    if (isset($filter['cf_1492']) && !empty($filter['cf_1492']))
        $query .= 'AND cf_1492 LIKE "%' . sqli($db, $filter['cf_1492']) . '%"';

    $query .=" ORDER BY vtiger_tenderoffercf.tenderofferid DESC ";
    $result = $db->query($query);

    CloseCon($db);
    return $result;


}


function getContractorList()
{
    $db = OpenCon();

    $query = "SELECT * FROM vtiger_cf_1412";

    $result = $db->query($query);

    CloseCon($db);

    return $result;
}

function getApprovalsList_cf_1738()
{
    $db = OpenCon();
    $query = "SELECT * FROM vtiger_cf_1738";
    $result = $db->query($query);

    CloseCon($db);

    return $result;
}

function getApprovalsList_cf_1756()
{
    $db = OpenCon();
    $query = "SELECT * FROM vtiger_cf_1756";
    $result = $db->query($query);

    CloseCon($db);

    return $result;
}

function getApprovalsList_cf_1742()
{
    $db = OpenCon();
    $query = "SELECT * FROM vtiger_cf_1742";
    $result = $db->query($query);

    CloseCon($db);

    return $result;
}

function getcontracType()
{

    $db = OpenCon();

    $query = "SELECT * FROM vtiger_cf_1660 WHERE cf_1660id <> 3 ";

    $result = $db->query($query);

    CloseCon($db);

    return $result;
}

function getDeposittypeList()
{
    $db = OpenCon();

    $query = "SELECT * FROM vtiger_bigsales_tks_deposittype";

    $result = $db->query($query);

    CloseCon($db);

    return $result;
}

function getTenderDeposittypeList()
{
    $db = OpenCon();

    $query = "SELECT * FROM vtiger_cf_1498";

    $result = $db->query($query);

    CloseCon($db);

    return $result;
}

function getBaazaarcheList()
{
    /*global $db;
    $query =mysqli_query($db,"SELECT * FROM vtiger_cf_1674");
    return  $query;*/

    $db = OpenCon();

    $query = "SELECT * FROM vtiger_cf_1674";

    $result = $db->query($query);

    CloseCon($db);

    return $result;
}

function StructuresBaazaarche()
{

    $db = OpenCon();

    $query = "SELECT * FROM vtiger_cf_1652";

    $result = $db->query($query);

    CloseCon($db);

    return $result;
}

function RegionsBaazaarche()
{

    $db = OpenCon();

    $query = "SELECT * FROM vtiger_cf_1652";

    $result = $db->query($query);

    CloseCon($db);

    return $result;
}

function GuildBaazaarche()
{
    $db = OpenCon();

    $query = "SELECT * FROM vtiger_cf_1672";

    $result = $db->query($query);

    CloseCon($db);

    return $result;
}

function get_project($filter = null)
{
    $db = OpenCon();

    $query = "SELECT *  FROM vtiger_projectlistcf INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_projectlistcf.projectlistid WHERE vtiger_crmentity.deleted='0'  ";

    if (isset($filter['cf_1392']) && !empty($filter['cf_1392']))
        $query .= 'AND cf_1392 LIKE "%' . sqli($db,trim($filter['cf_1392']))  . '%"';

    if (isset($filter['cf_1394']) && !empty($filter['cf_1394']))
        $query .= 'AND cf_1394 = "' . sqli($db, $filter['cf_1394']) . '"';

    if (isset($filter['cf_1396']) && !empty($filter['cf_1396'])) {
        $date = preg_split("/\//", sqli($db, trim($filter['cf_1396'])));
        $query .= 'AND cf_1396 LIKE "%' . jalali_to_gregorian($date[0], $date[1], $date[2]) . '%"';
    }

    if (isset($filter['cf_1398']) && !empty($filter['cf_1398']))
        $query .= 'AND cf_1398 LIKE "%' . sqli($db, $filter['cf_1398']) . '%"';

    if (isset($filter['cf_1436']) && !empty($filter['cf_1436']))
        $query .= 'AND cf_1436 LIKE "' . sqli($db, $filter['cf_1436']) . '%"';

    if (isset($filter['cf_1402']) && !empty($filter['cf_1402']))
        $query .= 'AND cf_1402 LIKE "%' . sqli($db, $filter['cf_1402']) . '%"';

    if (isset($filter['cf_1438']) && !empty($filter['cf_1438']))
        $query .= 'AND cf_1438 LIKE "' . sqli($db, $filter['cf_1438']) . '%"';

    if (isset($filter['cf_1406']) && !empty($filter['cf_1406']))
        $query .= 'AND cf_1406 LIKE "%' . sqli($db, $filter['cf_1406']) . '%"';

    $result = $db->query($query);

    CloseCon($db);

    return $result;


}

function search($txt)
{

    $db = OpenCon();

    $val = sqli($db, $txt);
    $terms = explode(" ", $val);
    $searchClause = "";
    $i = 0;
    foreach ($terms as $each) {
        $i++;
        if ($i == 1 && !empty($each))
            $searchClause .= "title LIKE '%$each%' ";
        else if (!empty($each))
            $searchClause .= "OR title LIKE '%$each%' ";
    }

    $query = "SELECT * FROM(SELECT mediumcontract_tks_contractor as title,mediumcontractid as id ,modifiedtime as lasttime FROM vtiger_mediumcontract
              INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_mediumcontract.mediumcontractid WHERE vtiger_crmentity.deleted='0') as tbl  WHERE " . $searchClause;
    $preresult = $db->query($query);
    $i = 0;
    $result = array();
    while ($row = $preresult->fetch_array()) {
        $row['type'] = 'hcontract';
        $row['id'] = $row['id'];
        $row['title'] = $row['title'];
        $row['lasttime']=$row['lasttime'];
        $result[$i] = $row;
        $i++;
    }

    $query = "SELECT * FROM(SELECT cf_1410 as title, vtiger_mediumcontractcf.mediumcontractid as id ,modifiedtime as lasttime FROM vtiger_mediumcontract
    INNER JOIN vtiger_mediumcontractcf ON vtiger_mediumcontractcf.mediumcontractid=vtiger_mediumcontract.mediumcontractid
    INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_mediumcontractcf.mediumcontractid WHERE vtiger_crmentity.deleted='0') as tbl WHERE " . $searchClause;
    $preresult = $db->query($query);
    while ($row = $preresult->fetch_array()) {
        $row['type'] = 'mcontract';
        $row['id'] = $row['id'];
        $row['title'] = $row['title'];
        $row['lasttime']=$row['lasttime'];
        $result[$i] = $row;
        $i++;
    }

    $query = "SELECT * FROM(SELECT cf_1392 as title ,modifiedtime as lasttime, projectlistid as id  FROM vtiger_projectlistcf
              INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_projectlistcf.projectlistid WHERE vtiger_crmentity.deleted='0') as tbl WHERE " . $searchClause;
    $preresult = $db->query($query);
    while ($row = $preresult->fetch_array()) {
        $row['type'] = 'project';
        $row['id'] = $row['id'];
        $row['title'] = $row['title'];
        $row['lasttime']=$row['lasttime'];
        $result[$i] = $row;
        $i++;
    }

    $query = "SELECT * FROM(SELECT cf_1520 as title, tenderofferid as id ,modifiedtime as lasttime FROM vtiger_tenderoffercf
              INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_tenderoffercf.tenderofferid WHERE vtiger_crmentity.deleted='0') as tbl WHERE " . $searchClause;
    $preresult = $db->query($query);
    while ($row = $preresult->fetch_array()) {
        $row['type'] = 'tender';
        $row['id'] = $row['id'];
        $row['title'] = $row['title'];
        $row['lasttime']=$row['lasttime'];
        $result[$i] = $row;
        $i++;
    }

    $query = "SELECT * FROM(SELECT cf_1572 as title, bigsalesid as id ,modifiedtime as lasttime FROM vtiger_bigsalescf   
             INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_bigsalescf.bigsalesid WHERE vtiger_crmentity.deleted='0') as tbl WHERE " . $searchClause;
    $preresult = $db->query($query);
    while ($row = $preresult->fetch_array()) {
        $row['type'] = 'bigsales';
        $row['id'] = $row['id'];
        $row['title'] = $row['title'];
        $row['lasttime']=$row['lasttime'];
        $result[$i] = $row;
        $i++;
    }

    CloseCon($db);
    return $result;


}

function getHugeContractById($id)
{
    $db = OpenCon();

    $query = "SELECT * FROM vtiger_hugecontract INNER JOIN vtiger_hugecontractcf ON vtiger_hugecontractcf.hugecontractid=vtiger_hugecontract.hugecontractid 
           INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_hugecontractcf.hugecontractid WHERE vtiger_crmentity.deleted='0' AND vtiger_hugecontractcf.hugecontractid=" . $id;

    $result = $db->query($query);



    return $result;
}

function getMediumContractById($id)
{
    $db = OpenCon();

    $query = "SELECT * FROM vtiger_mediumcontract INNER JOIN vtiger_mediumcontractcf ON vtiger_mediumcontractcf.mediumcontractid=vtiger_mediumcontract.mediumcontractid
    INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_mediumcontractcf.mediumcontractid WHERE vtiger_crmentity.deleted='0' AND  vtiger_mediumcontractcf.mediumcontractid=" . $id;

    $result = $db->query($query);

    return $result;
}

function getTenderById($id)
{
    $db = OpenCon();

    $query = "SELECT *  FROM vtiger_tenderoffercf 
            INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_tenderoffercf.tenderofferid WHERE vtiger_crmentity.deleted='0' AND  vtiger_tenderoffercf.tenderofferid= " . $id;

    $result = $db->query($query);

    return $result;
}

function getBigsaleById($id)
{
    $db = OpenCon();

    $query = "SELECT * FROM vtiger_bigsales INNER JOIN vtiger_bigsalescf  ON vtiger_bigsales.bigsalesid=vtiger_bigsalescf.bigsalesid INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_bigsales.bigsalesid WHERE vtiger_bigsales.bigsalesid=" . $id;

    $result = $db->query($query);

    return $result;
}

function getProjectById($id)
{
    $db = OpenCon();

    $query = "SELECT * FROM vtiger_projectlistcf INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_projectlistcf.projectlistid WHERE projectlistid=" . $id;

    $result = $db->query($query);

    return $result;
}

function get_bigsales($filter = null)
{
    $db = OpenCon();

    $query = "SELECT * FROM vtiger_bigsales INNER JOIN vtiger_bigsalescf ON vtiger_bigsales.bigsalesid=vtiger_bigsalescf.bigsalesid  
              INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_bigsales.bigsalesid WHERE vtiger_crmentity.deleted='0' ";

    if (isset($filter['cf_1572']) && !empty($filter['cf_1572']))
        $query .= 'AND cf_1572 LIKE "%' . $filter['cf_1572'] . '%"';

    if (isset($filter['bigsales_tks_deposittype']) && !empty($filter['bigsales_tks_deposittype']))
        $query .= 'AND bigsales_tks_deposittype LIKE "%' . $filter['bigsales_tks_deposittype'] . '%"';

    if (isset($filter['cf_1554']) && !empty($filter['cf_1554']))
        $query .= 'AND cf_1554 LIKE "%' . $filter['cf_1554'] . '%"';

    if (isset($filter['cf_1556']) && !empty($filter['cf_1556']))
        $query .= 'AND cf_1556 LIKE "%' . $filter['cf_1556'] . '%"';

    if (isset($filter['cf_1558']) && !empty($filter['cf_1558'])) {
        $date = preg_split("/\//", sqli($db, trim($filter['cf_1558'])));
        $query .= 'AND cf_1558 LIKE "%' . jalali_to_gregorian($date[0], $date[1], $date[2]) . '%"';
    }

    if (isset($filter['cf_1574']) && !empty($filter['cf_1574'])) {
        $date = preg_split("/\//", sqli($db, trim($filter['cf_1574'])));
        $query .= 'AND cf_1574 LIKE "%' . jalali_to_gregorian($date[0], $date[1], $date[2]) . '%"';
    }

    if (isset($filter['cf_1566']) && !empty($filter['cf_1566'])) {
        $date = preg_split("/\//", sqli($db, trim($filter['cf_1566'])));
        $query .= 'AND cf_1566 LIKE "%' . jalali_to_gregorian($date[0], $date[1], $date[2]) . '%"';
    }

    if (isset($filter['cf_1576']) && !empty($filter['cf_1576']))
        $query .= 'AND cf_1576 LIKE "%' . $filter['cf_1576'] . '%"';

    if (isset($filter['cf_1560']) && !empty($filter['cf_1560']))
        $query .= 'AND cf_1560 LIKE "%' . $filter['cf_1560'] . '%"';

    if (isset($filter['cf_1562']) && !empty($filter['cf_1562'])) {
        $date = preg_split("/\//", sqli($db, trim($filter['cf_1562'])));
        $query .= 'AND cf_1562 LIKE "%' . jalali_to_gregorian($date[0], $date[1], $date[2]) . '%"';
    }

    if (isset($filter['cf_1564']) && !empty($filter['cf_1564']))
        $query .= 'AND cf_1564 LIKE "%' . $filter['cf_1564'] . '%"';

    if (isset($filter['cf_1568']) && !empty($filter['cf_1568']))
        $query .= 'AND cf_1568 LIKE "%' . $filter['cf_1568'] . '%"';

    if (isset($filter['cf_1606']) && !empty($filter['cf_1606']))
        $query .= 'AND cf_1606 LIKE "%' . $filter['cf_1606'] . '%"';
    if (isset($filter['cf_1608']) && !empty($filter['cf_1608']))
        $query .= 'AND cf_1608 LIKE "%' . $filter['cf_1608'] . '%"';

    if (isset($filter['cf_1570']) && !empty($filter['cf_1570']))
        $query .= 'AND cf_1570 LIKE "%' . $filter['cf_1570'] . '%"';
    $query .=" ORDER BY vtiger_bigsales.bigsalesid DESC ";
    $result = $db->query($query);

    return $result;

}

function get_baazaarche($filter = null)
{
    $db = OpenCon();
    $query = "SELECT * FROM vtiger_booth
                INNER JOIN vtiger_markets ON vtiger_booth.cf_1682 = vtiger_markets.marketsid
                INNER JOIN vtiger_crmentity ON vtiger_booth.boothid = vtiger_crmentity.crmid
                LEFT JOIN vtiger_crmentityrel ON (vtiger_crmentityrel.relcrmid = vtiger_crmentity.crmid OR vtiger_crmentityrel.crmid = vtiger_crmentity.crmid)
                LEFT JOIN vtiger_mediumcontract ON vtiger_crmentityrel.relcrmid = vtiger_mediumcontract.mediumcontractid
				LEFT JOIN vtiger_marketscf ON vtiger_markets.marketsid = vtiger_marketscf.marketsid
				INNER JOIN vtiger_boothcf ON vtiger_boothcf.boothid = vtiger_booth.boothid WHERE vtiger_crmentity.deleted='0' ";


    if (isset($filter['markets_tks_markettitle']) && !empty($filter['markets_tks_markettitle']))
        $query .= 'AND markets_tks_markettitle LIKE "%' . $filter['markets_tks_markettitle'] . '%"';

    if (isset($filter['booth_tks_plaquenumber']) && !empty($filter['booth_tks_plaquenumber']))
        $query .= 'AND booth_tks_plaquenumber LIKE "%' . $filter['booth_tks_plaquenumber'] . '%"';

    if (isset($filter['cf_1654']) && !empty($filter['cf_1654']))
        $query .= 'AND cf_1654 LIKE "%' . $filter['cf_1654'] . '%"';

    if (isset($filter['cf_1652']) && !empty($filter['cf_1652']))
        $query .= 'AND cf_1652 LIKE "%' . $filter['cf_1652'] . '%"';

    if (isset($filter['cf_1672']) && !empty($filter['cf_1672']))
        $query .= 'AND cf_1672 LIKE "%' . $filter['cf_1672'] . '%"';

    if (isset($filter['cf_1674']) && !empty($filter['cf_1674']))
        $query .= 'AND cf_1674 LIKE "' . $filter['cf_1674'] . '"';

    if (isset($filter['cf_1915']) && !empty($filter['cf_1915']))
        $query .= 'AND cf_1915 LIKE "%' . $filter['cf_1915'] . '%"';

    if (isset($filter['cf_1913']) && !empty($filter['cf_1913']))
        $query .= 'AND cf_1913 LIKE "%' . $filter['cf_1913'] . '%"';

    $result = $db->query($query);

    return $result;
}

function get_management($filter = null)
{
    $db = opencon();

    $query = "SELECT * FROM `vtiger_managers` INNER JOIN `vtiger_managerscf` ON vtiger_managers.managersid=vtiger_managerscf.managersid 
                INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_managers.managersid WHERE vtiger_crmentity.deleted='0'    ";

    if (isset($filter['managers_tks_name']) && !empty($filter['managers_tks_name']))
        $query .= 'AND managers_tks_name like"%' . trim($filter['managers_tks_name']) . '%"';

    if (isset($filter['cf_1786']) && !empty($filter['cf_1786']))
        $query .= 'AND cf_1786 like"%' . $filter['cf_1786'] . '%"';

    if (isset($filter['cf_1788']) && !empty($filter['cf_1788']))
        $query .= 'AND cf_1788 like"%' . $filter['cf_1788'] . '%"';

    if (isset($filter['cf_1790']) && !empty($filter['cf_1790']))
        $query .= 'AND cf_1790 like"%' . $filter['cf_1790'] . '%"';
    $query .= " ORDER BY vtiger_managers.managers_tks_name";

    $result = $db->query($query);

    return $result;
}

function get_commission($filter = null)
{
    $db = OpenCon();

    $query = "SELECT *  FROM vtiger_commissioncf INNER JOIN vtiger_commission  ON vtiger_commission.commissionid=vtiger_commissioncf.commissionid
INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid= vtiger_commission.commissionid WHERE vtiger_crmentity.deleted='0'  ";

    if (isset($filter['commission_tks_title']) && !empty($filter['commission_tks_title']))
        $query .= 'AND commission_tks_title LIKE "%' . $filter['commission_tks_title'] . '%"';

    if (isset($filter['cf_1586']) && !empty($filter['cf_1586']))
        $query .= 'AND cf_1586 LIKE "%' . $filter['cf_1586'] . '%"';

    if (isset($filter['cf_1588']) && !empty($filter['cf_1588']))
        $query .= 'AND cf_1588 LIKE "%' . $filter['cf_1588'] . '%"';

    if (isset($filter['cf_1590']) && !empty($filter['cf_1590']))
        $query .= 'AND cf_1590 LIKE "%' . $filter['cf_1590'] . '%"';


    $result = $db->query($query);

    return $result;
}

function get_names_shoraaha($filter = null)
{

    $db = OpenCon();

    $query = "SELECT * FROM `vtiger_councilmembers` INNER JOIN `vtiger_councilmemberscf` 
                ON vtiger_councilmembers.councilmembersid = vtiger_councilmemberscf.councilmembersid
                INNER JOIN vtiger_crmentity ON vtiger_councilmembers.councilmembersid = vtiger_crmentity.crmid  WHERE vtiger_crmentity.deleted=0  ";

    if (isset($filter['councilmembers_tks_name']) && !empty($filter['councilmembers_tks_name']))
        $query .= 'AND councilmembers_tks_name LIKE "%' . $filter['councilmembers_tks_name'] . '%"';

    if (isset($filter['cf_1798']) && !empty($filter['cf_1798']))
        $query .= 'AND cf_1798 LIKE "%' . $filter['cf_1798'] . '%"';

    if (isset($filter['cf_1800']) && !empty($filter['cf_1800']))
        $query .= 'AND cf_1800 LIKE "%' . $filter['cf_1800'] . '%"';

    $result = $db->query($query);

    return $result;
}

function get__counter_mos()
{
    $db = OpenCon();
    $query = "SELECT * FROM `vtiger_sessioninfo` INNER JOIN `vtiger_sessioninfocf` ON vtiger_sessioninfo.sessioninfoid=vtiger_sessioninfocf.sessioninfoid
		INNER JOIN `vtiger_approvals`    ON vtiger_sessioninfo.sessioninfoid=vtiger_approvals.cf_1824
		INNER JOIN  `vtiger_approvalscf` ON vtiger_approvals.approvalsid=vtiger_approvalscf.approvalsid  ";
    $result = $db->query($query);

    return $result;
}

function get_sessions($filter = null)
{

    $db = OpenCon();

    /*$query = "SELECT * FROM `vtiger_approvals` INNER JOIN vtiger_approvalscf ON vtiger_approvals.approvalsid = vtiger_approvalscf.approvalsid  ";*/
    $query = "SELECT * FROM `vtiger_sessioninfo` INNER JOIN `vtiger_sessioninfocf` ON vtiger_sessioninfo.sessioninfoid=vtiger_sessioninfocf.sessioninfoid 
                INNER JOIN vtiger_crmentity ON vtiger_sessioninfo.sessioninfoid=vtiger_crmentity.crmid  WHERE vtiger_crmentity.deleted=0  ";

    if (isset($filter['sessioninfo_tks_sessionnumber']) && !empty($filter['sessioninfo_tks_sessionnumber']))
        $query .= 'AND sessioninfo_tks_sessionnumber LIKE "%' . $filter['sessioninfo_tks_sessionnumber'] . '%"';

    if (isset($filter['cf_1770']) && !empty($filter['cf_1770']))
        $query .= 'AND cf_1770 LIKE "%' . $filter['cf_1770'] . '%"';

    if (isset($filter['cf_1766']) && !empty($filter['cf_1766']))
        $query .= 'AND cf_1766 LIKE "%' . $filter['cf_1766'] . '%"';

    $result = $db->query($query);

    return $result;
}

function get_mo($id, $filter = null)
{
    $db = OpenCon();
    $query = "SELECT   * FROM `vtiger_approvals` INNER JOIN `vtiger_approvalscf` ON `vtiger_approvals`.approvalsid=`vtiger_approvalscf`.approvalsid
              INNER JOIN  vtiger_sessioninfocf ON vtiger_sessioninfocf.sessioninfoid = vtiger_approvals.cf_1824  
							INNER JOIN vtiger_crmentity ON vtiger_approvals.approvalsid=vtiger_crmentity.crmid WHERE  vtiger_crmentity.deleted=0 AND vtiger_approvals.cf_1824= $id ";

    if (isset($filter['approvals_tks_approvaltitle']) && !empty($filter['approvals_tks_approvaltitle']))
        $query .= 'AND approvals_tks_approvaltitle LIKE "%' . $filter['approvals_tks_approvaltitle'] . '%"';

    if (isset($filter['cf_1728']) && !empty($filter['cf_1728']))
        $query .= 'AND cf_1728 LIKE "%' . $filter['cf_1728'] . '%"';

    if (isset($filter['cf_1734']) && !empty($filter['cf_1734']))
        $query .= 'AND cf_1734 LIKE "%' . $filter['cf_1734'] . '%"';

    if (isset($filter['cf_1766']) && !empty($filter['cf_1766'])) {
        $date = preg_split("/\//", sqli($db, trim($filter['cf_1766'])));
        $query .= 'AND cf_1766 LIKE "%' . jalali_to_gregorian($date[0], $date[1], $date[2]) . '%"';
    }

    if (isset($filter['cf_1744']) && !empty($filter['cf_1744']))
        $query .= 'AND cf_1744 LIKE "%' . $filter['cf_1744'] . '%"';

    if (isset($filter['cf_1746']) && !empty($filter['cf_1746']))
        $query .= 'AND cf_1746 LIKE "%' . $filter['cf_1746'] . '%"';

    if (isset($filter['cf_1748']) && !empty($filter['cf_1748']))
        $query .= 'AND cf_1748 LIKE "%' . $filter['cf_1748'] . '%"';

    if (isset($filter['cf_1756']) && !empty($filter['cf_1756']))
        $query .= 'AND cf_1756 LIKE "%' . $filter['cf_1756'] . '%"';

    if (isset($filter['cf_1738']) && !empty($filter['cf_1738']))
        $query .= 'AND cf_1738 LIKE "%' . $filter['cf_1738'] . '%"';

    if (isset($filter['cf_1742']) && !empty($filter['cf_1742']))
        $query .= 'AND cf_1742 LIKE "%' . $filter['cf_1742'] . '%"';
    $result = $db->query($query);
    return $result;
}

function View_details($num, $id)
{
    $db = OpenCon();
    $query = "SELECT * FROM `vtiger_approvals` INNER JOIN `vtiger_approvalscf` ON `vtiger_approvals`.approvalsid=`vtiger_approvalscf`.approvalsid 
               INNER JOIN  vtiger_sessioninfocf ON vtiger_sessioninfocf.sessioninfoid = vtiger_approvals.cf_1824  WHERE vtiger_approvals.cf_1824=$num AND vtiger_approvals.approvalsid=$id";

    $result = $db->query($query);

    return $result;
}

function get_approvals($filter = null)
{
    $db = OpenCon();
    $query = "SELECT * FROM `vtiger_sessioninfo` INNER JOIN `vtiger_sessioninfocf` ON vtiger_sessioninfo.sessioninfoid=vtiger_sessioninfocf.sessioninfoid
			INNER JOIN vtiger_approvals ON vtiger_approvals.cf_1824 = vtiger_sessioninfocf.sessioninfoid
			INNER JOIN vtiger_approvalscf ON vtiger_approvals.approvalsid = vtiger_approvalscf.approvalsid 
			INNER JOIN vtiger_crmentity ON vtiger_sessioninfo.sessioninfoid=vtiger_crmentity.crmid	WHERE vtiger_crmentity.deleted=0 ";

    if (isset($filter['approvals_tks_approvaltitle']) && !empty($filter['approvals_tks_approvaltitle']))
        $query .= 'AND approvals_tks_approvaltitle LIKE "%' . $filter['approvals_tks_approvaltitle'] . '%"';

    if (isset($filter['cf_1728']) && !empty($filter['cf_1728']))
        $query .= 'AND cf_1728 LIKE "%' . $filter['cf_1728'] . '%"';

    if (isset($filter['cf_1734']) && !empty($filter['cf_1734']))
        $query .= 'AND cf_1734 LIKE "%' . $filter['cf_1734'] . '%"';

    if (isset($filter['cf_1766']) && !empty($filter['cf_1766'])) {
        $date = preg_split("/\//", sqli($db, trim($filter['cf_1766'])));
        $query .= 'AND cf_1766 LIKE "%' . jalali_to_gregorian($date[0], $date[1], $date[2]) . '%"';
    }

    if (isset($filter['cf_1744']) && !empty($filter['cf_1744']))
        $query .= 'AND cf_1744 LIKE "%' . $filter['cf_1744'] . '%"';

    if (isset($filter['cf_1746']) && !empty($filter['cf_1746']))
        $query .= 'AND cf_1746 LIKE "%' . $filter['cf_1746'] . '%"';

    if (isset($filter['cf_1748']) && !empty($filter['cf_1748']))
        $query .= 'AND cf_1748 LIKE "%' . $filter['cf_1748'] . '%"';

    if (isset($filter['cf_1756']) && !empty($filter['cf_1756']))
        $query .= 'AND cf_1756 LIKE "%' . $filter['cf_1756'] . '%"';

    if (isset($filter['cf_1738']) && !empty($filter['cf_1738']))
        $query .= 'AND cf_1738 LIKE "%' . $filter['cf_1738'] . '%"';

    if (isset($filter['cf_1742']) && !empty($filter['cf_1742']))
        $query .= 'AND cf_1742 LIKE "%' . $filter['cf_1742'] . '%"';


    $result = $db->query($query . 'ORDER BY cf_1766 DESC');

    return $result;
}

function get_amlakShahrdari($txt,$filter = null)
{

    $db = OpenCon();

    $query = "SELECT * FROM `vtiger_amlak` INNER JOIN vtiger_amlakcf ON vtiger_amlak.amlakid=vtiger_amlakcf.amlakid
INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_amlak.amlakid WHERE vtiger_crmentity.deleted=0 AND vtiger_amlakcf.cf_1937= $txt ";

    if (isset($filter['amlak_tks_propertydetails']) && !empty($filter['amlak_tks_propertydetails']))
        $query .= 'AND amlak_tks_propertydetails LIKE "%' . trim(sqli($db, $filter['amlak_tks_propertydetails'] )). '%"';

    if (isset($filter['cf_1937']) && !empty($filter['cf_1937']))
        $query .= 'AND cf_1937 LIKE "%' . trim(sqli($db, $filter['cf_1937'] )). '%"';

    if (isset($filter['cf_1935']) && !empty($filter['cf_1935']))
        $query .= 'AND cf_1935 LIKE "%' . trim(sqli($db, $filter['cf_1935'])) . '%"';

if (isset($filter['cf_1961']) && !empty($filter['cf_1961']))
        $query .= 'AND cf_1961 LIKE "%' . trim(sqli($db, $filter['cf_1961'])) . '%"';

    $result = $db->query($query);

    return $result;
}

function get_amlakStore($filter = null)
{

    $db = OpenCon();

    $query = "SELECT * FROM `vtiger_store` INNER JOIN vtiger_storecf ON vtiger_store.storeid=vtiger_storecf.storeid 
INNER JOIN vtiger_crmentity ON vtiger_crmentity.crmid=vtiger_store.storeid  WHERE vtiger_crmentity.deleted='0' ";

    if (isset($filter['store_tks_tenantname']) && !empty($filter['store_tks_tenantname']))
        $query .= 'AND store_tks_tenantname LIKE "%' . trim(sqli($db, $filter['store_tks_tenantname'] )). '%"';

    if (isset($filter['cf_1971']) && !empty($filter['cf_1971']))
        $query .= 'AND cf_1971 LIKE "%' . trim(sqli($db, $filter['cf_1971'] )). '%"';

    if (isset($filter['cf_1983']) && !empty($filter['cf_1983']))
        $query .= 'AND cf_1983 LIKE "%' . trim(sqli($db, $filter['cf_1983'])) . '%"';

 if (isset($filter['cf_1973']) && !empty($filter['cf_1973']))
        $query .= 'AND cf_1973 LIKE "%' . trim(sqli($db, $filter['cf_1973'])) . '%"';

    $result = $db->query($query);

    return $result;
}

function register_nazarat($name,$email,$comment)
{
    $db = OpenCon();
    $query = mysqli_query($db, " UPDATE vtiger_crmentity_seq SET id=id+1; ");
    $query = mysqli_query($db, " SELECT id FROM vtiger_crmentity_seq  ");
    if ($query->num_rows > 0) {
        while ($row = $query->fetch_assoc()) {
            $id = $row['id'];
            date_default_timezone_set("Asia/Tehran");
            $t = time();
            $createdtime = date("Y-m-d G.i:s", $t);
            $modifiedtime = date("Y-m-d G.i:s", $t);
            $sql = "INSERT INTO vtiger_nazaratshahrvand (nazaratshahrvandid,nazaratshahrvand_tks_name )
                                                                    VALUES ('$id',                '$name')";
            $query = mysqli_query($db, $sql);
            $query = mysqli_query($db, "INSERT INTO vtiger_nazaratshahrvandcf (nazaratshahrvandid,cf_1947,cf_1949)VALUES  ('$id',' $email','$comment')");

            $query = mysqli_query($db, "INSERT INTO vtiger_crmentity (crmid,smcreatorid,smownerid,modifiedby,setype            ,createdtime   ,modifiedtime  ,version,presence,deleted,smgroupid,source) 
                                                                    VALUES ('$id',    '1',        '1',    '1',    'Nazaratshahrvand','$createdtime','$modifiedtime','0'   ,'1'     ,'0'    ,'0'      ,'CRM') ");

            if ($query) {
                return true;
            }
        }
    } else {
        return false;
    }

}

function check_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
