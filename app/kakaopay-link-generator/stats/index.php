<?php
session_start(); /* Starts the session */

if($_SESSION['logged_in'] == false){ /* Redirects user to Login.php if not logged in */
  header("location:./login/");
  exit;
}

// Fetch Data
error_reporting(0);

date_default_timezone_set('Asia/Seoul');

$json_file = './logs.json';

$historyData_01 = json_decode( file_get_contents( $json_file ), true );

$historyData_02 = array_reverse( $historyData_01, true );

// Pick First Several Data
if ( !empty( $_GET['count'] ) ) {
  $data_count = $_GET['count'];
} else {
  $data_count = 50;
}

$historyData_02 = array_slice( $historyData_02, 0, $data_count, true );

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <!-- <meta http-equiv="refresh" content="0; URL=http://random.wp-data.com/cn/"> -->
    <meta name="robots" content="noindex, nofollow">
    <title></title>
    <style>
      body {
        font-size: 1.1rem;
      }
      .content {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: unset;
      }
      @media screen and (max-width: 600px) {
        body {
          font-size: 0.9rem;
        }
      }
    </style>
  </head>
  <body>
    <div class="content">
      <center>
        <a href="./../" target="_blank">Home</a> -
        <a href="./logout/">Logout</a>
      </center>
      <hr>
      <?php
        foreach ( $historyData_02 as $key => $value ) {
          echo $key . ' : ' . '<br>- Message : ' . $value['message'] . '<br>- Link : <a href="' . $value['link'] . '" target="_blank">' . $value['link'] . '</a><br>- ShortLink (Bit.ly) : <a href="' . $value['bitly_shortlink'] . '" target="_blank">' . $value['bitly_shortlink'] . '</a><br>- Date : ' . $value['date'] . '<br><br>';
        }
      ?>
    </div>

  </body>
</html>
