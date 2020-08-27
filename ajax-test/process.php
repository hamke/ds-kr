<?php
error_reporting(0);

if( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && ( strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) ) {

  // $_POST['imp_uid']

  $filename = "./download/";
  echo $filename;

} else {

  exit;

}
