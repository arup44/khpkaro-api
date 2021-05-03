<?php
require_once '../guid.php';
require_once '../query.php';
require_once '../connection.php';
date_default_timezone_set("Asia/Jakarta");
$id=$_POST['id'];
$query = new query();
$tbl='tbl_hasil';
$field= array("id_siswa","id_olimpiade","created_on");
$params = array($_POST['id_siswa'],$_POST['id_olimpiade'],date("Y/m/d H:i:s"));  
return $query->create($tbl, $field, $params, $id);
?>