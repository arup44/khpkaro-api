<?php
 $file = $_GET['namafile'];
$url="uploads/".$file;
 if (file_exists($url)) {
     header("Access-Control-Allow-Origin: *");
     header('Content-Description: File Transfer');
     header('Content-Type: application/octet-stream');
     header('Content-Disposition: attachment; filename="'.basename($url).'"');
     header('Expires: 0');
     header('Cache-Control: must-revalidate');
     header('Pragma: public');
     header('Content-Length: ' . filesize($url));
     readfile($url);
     exit;
 }
 else{
     echo '404';
 }
?>