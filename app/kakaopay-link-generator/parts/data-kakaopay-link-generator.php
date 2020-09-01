<?php

date_default_timezone_set('Asia/Seoul');

$stats_json_file = './stats/logs.json';

$currentData = json_decode(file_get_contents($stats_json_file), true);

$extraData = [
  'message' => $message,
  'link' => $qrcode_link,
  'bitly_shortlink' => $bitly_shortlink,
  'date' => date('Y-m-d-H-i-s')
];

array_push( $currentData, $extraData );

$storedData = json_encode( $currentData );

file_put_contents( $stats_json_file, $storedData );

?>
