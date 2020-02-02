<?php
    ini_set("display_errors","1");
    ini_set("soap.wsdl_cache_enabled", 0);
    $param = array('lon' => $_GET['Latitude'], 'lat' => $_GET['Longitude']);
    $client = new SoapClient('http://185.113.56.12:8082/service.asmx?WSDL');
    $results = $client->GetBuldingRulesArak($param);
    echo $results->GetBuldingRulesArakResult;
    //echo $regions[$results->GetRegionArakResult];
