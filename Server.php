<?php

$onlineServer = @file_get_contents('http://192.168.0.10:9090/api/v1/query?query=mc_players_online_total');
$json = $onlineServer;

if ($json == false) {
	 $sumOfUsers = '--';
}
else{
    $encodedData = json_decode($json, true)['data']['result'];
    $sumOfUsers = 0;

    foreach ($encodedData as $key => $value) {
        if (array_key_exists('value', $value)) {
            $sumOfUsers += end($value['value']);
        }
    }
}
echo $sumOfUsers;
?>