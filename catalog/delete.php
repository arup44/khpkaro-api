<?php
require_once '../connection.php';
require_once '../guid.php';
include '../query.php';
$query = new query();
$id=$_GET['id'];
$result=array();
if ($data = mysqli_query($conn, "select dokumen from view_tugassiswa where id='$id';")) {
    while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
        $result[] = $row;
    }
}
if(sizeof($result)==1)
{
    $file=($result[0]['dokumen']);
    if($file!=null)
    {
        $urlfile='uploads/'.$file;
        unlink($urlfile);
    }
}


$tbl='tbl_penilaian';
return $query->delete($tbl,'id', $_GET['id']);
?>