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
    $raised = ((int)$etherscan_result->result/1000000000000000000);
    return number_format($raised,5);
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

    $raised = $explorer_result->balance;
    return number_format($raised,5);
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
    $explorer_result = json_decode(file_get_contents("http://explorer.vertcoin.info/ext/getbalance/".$w));
    return number_format($explorer_result,5);
}


function getVTCmined($w){
    $pool_result = json_decode(file_get_contents("https://vertcoin.easymine.online/json/miner2.php?address=".$w));
    $mined = $pool_result->vtc_balance;
    return number_format($mined, 5);
}

function getVTCminers($w){
    $pool_result = json_decode(file_get_contents("https://vertcoin.easymine.online/json/miner2.php?address=".$w));
    $i = 0;
    foreach($pool_result->workers as $id => $r){
    	if($r->hashRate>0){
    		$i++;
    	}
    }
    return $i;
}

function getBTCraised($w){
    $explorer_result = json_decode(file_get_contents("https://blockchain.info/q/addressbalance/".$w));
    return number_format(((int)$explorer_result/100000000),5);
}


function getBTCmined($w){
	/*
    $pool_result = json_decode(file_get_contents("https://vertcoin.easymine.online/json/miner2.php?address=".$w));
    $mined = $pool_result->vtc_balance;
    return number_format($mined, 5);
	*/
	//for now
	return 0;
}

function getBTCminers($w){
	/*
    $pool_result = json_decode(file_get_contents("https://vertcoin.easymine.online/json/miner2.php?address=".$w));
    $i = 0;
    foreach($pool_result->workers as $id => $r){
    	if($r->hashRate>0){
    		$i++;
    	}
    }
    return $i;*/
	//for now
	return 0;
}

header('Content-Type: application/json');
die(json_encode($response));