<?php
require_once 'functions.php';

$type = @$_POST['type'];
$kt = @$_POST['keytitle'];

if ($type && $kt) {
    $api_search = 'https://api.tls.moe/?app=bangumi&key=search&kt=' . $kt . '&type=' . $type;
    $data_s = curl_get_contents($api_search);
    $data_s = json_decode($data_s, true);

    $sid = $data_s['list'][0]['id'];

    if ($sid) {
        $api_info = 'https://api.tls.moe/?app=bangumi&key=info&sid=' . $sid . '&type=' . $type;
        $data_i = curl_get_contents($api_info);
        $data_i = str_replace('http:\/\/lain.bgm.tv', 'https:\/\/lain.bgm.tv', $data_i);
        print_r($data_i);
    } else {
        print_r('');
    }
}
