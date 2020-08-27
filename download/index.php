<meta name="robots" content="noindex, nofollow">
<?php
error_reporting(0);

if ( !empty($_SERVER['HTTP_REFERER']) ) {

  // if( !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && ( strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) ) {

    $path = "./file.zip";

    // $mime_type=mime_content_type($path);
    // header("Pragma: public");
    // header("Expires: 0");
    // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    // header("Cache-Control: public");
    // header("Content-Description: File Transfer");
    // header("Content-Type: " . $mime_type);
    // header("Content-Length: " .(string)(filesize($path)) );
    // header('Content-Disposition: attachment; filename="'.basename($path).'"'); // filename=PHP다운로드예시파일입니다.pdf
    // header("Content-Transfer-Encoding: binary\n");
    header("Content-disposition: attachment; filename=download-file.zip");
    // header("Content-type: application/pdf");
    readfile( $path );
    exit();

} else { // !empty($_SERVER['HTTP_REFERER'])

  exit();

}
