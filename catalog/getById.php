<?php
include '../connection.php';
$id=$_GET['id'];
$myArray=null;
if ($data = mysqli_query($conn, "select * from view_tugassiswa where id='$id';")) {
    while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
        $myArray[] = $row;
    }
    echo json_encode($myArray);
    http_response_code(200);
}
else
    {
        http_response_code(500);
        echo "Error in executing query.";
        die( print_r( mysqli_error($conn)));
    }
    mysqli_free_result($data);
    mysqli_close($conn);  
?>