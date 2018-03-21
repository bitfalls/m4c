<?php

use Dotenv\Dotenv;

require_once '../vendor/autoload.php';

$dotenv = new Dotenv(__DIR__.'/..');
$dotenv->load();

$methodTypes = ['raised', 'mined', 'miners'];
$response = [];
foreach (json_decode(file_get_contents("php://input")) as $ticker => $w) {
    foreach ($methodTypes as $type) {
        $methodName = 'get'.$ticker.$type;
        if (function_exists($methodName)) {
            $response[$ticker][$type] = $methodName($w);
        }
    }
}

function getETHraised($w){
    $etherscan_result = json_decode(file_get_contents("https://api.etherscan.io/api?module=account&action=balance&address=".$w."&tag=latest&apikey=".getenv('ETHERSCAN_KEY')));
    $eth_raised = ($etherscan_result->result/1000000000000000000);
    return number_format($eth_raised,5);
}


function getETHmined($w){
    $nanopool_result = json_decode(file_get_contents("https://api.nanopool.org/v1/eth/balance/".$w));
    $eth_mined = $nanopool_result->data;
    return number_format($eth_mined,5);
}


function getETHminers($w){
    $nanopool_result = json_decode(file_get_contents("https://api.nanopool.org/v1/eth/workers/".$w));
    $eth_workers = count($nanopool_result->data);
    return $eth_workers;
}


function getUBQraised($w){
    $explorer_result = json_decode(file_get_contents("https://ubiqexplorer.com/api/Account/".$w));

    $UBQ_raised = $explorer_result->balance;
    return number_format($UBQ_raised,5);
}


function getUBQmined($w){
    $pool_result = json_decode(file_get_contents("https://ubiqpool.io/api/accounts/".$w));
    $UBQ_mined = $pool_result->payments ? $pool_result->payments : 0;
    return number_format($UBQ_mined,5);
}


function getUBQminers($w){
    $pool_result = json_decode(file_get_contents("https://ubiqpool.io/api/accounts/".$w));
    return $pool_result->workersOnline;
}

function getVTCraised($w){
    //address on bittrex, needs checking
    //https://explore.UBQ.tech/hashes/f6e0a3d764218d82a203c8615cc5df4bf6b56635467ae49abcc5d77954922c20

    $UBQ_raised = 0;
    return number_format($UBQ_raised,5);
}


function getVTCmined($w){
    //$pool_result = json_decode(file_get_contents("https://UBQmining.com/api/v1/addresses/".$w."/summary"));
    //$UBQ_mined = $pool_result->balance;
    //return number_format($UBQ_mined,5);
    return 0;
}


function getVTCminers($w){
    //$pool_result = json_decode(file_get_contents("https://UBQmining.com/api/v1/addresses/".$w."/workers"));
    //$i=0;
    //foreach($pool_result as $r){
    //	if($r->intervals[0]->hash_rate>0){
    //		$i++;
    //	}
    //}
    //$UBQ_workers = count($pool_result);
    //return $i;
    return 0;
}

header('Content-Type: application/json');
die(json_encode($response));