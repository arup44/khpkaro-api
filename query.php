<?php 
class query {

public function create($tableName, $tableField, $arrayData, $id)
{
    include 'connection.php';
    require_once 'implode.php';
    $fields=implode(', ', $tableField);
    $data= implodeArray($arrayData);
    $sql = "INSERT INTO $tableName (id, $fields) VALUES  ('$id', $data)";
    $stmt = mysqli_query($conn, $sql);
    
    if( $stmt === false ) {
        
        http_response_code(500);
        die( print_r( mysqli_error($conn)));
    }
    else{
        http_response_code(200);
        echo 'Data Sent!';
    }
    mysqli_close($conn);   
}

public function delete($tableName, $paramField, $paramValue)
{
    include 'connection.php';
    if ($data = mysqli_query($conn, "DELETE FROM $tableName where $paramField='$paramValue'")) {
        echo 'Data Deleted!';
        http_response_code(200);
    }
    else
    {
        http_response_code(500);
        echo "Error in executing query.</br>";
        die( print_r( mysqli_error($conn)));
    }
    mysqli_close($conn);   
}

public function update($tableName, $tableField, $arrayData, $idField, $idData) 
{
    include 'connection.php';
    $sql = "UPDATE $tableName set ";
    foreach ($tableField as $key => $field) {
        if(substr($arrayData[$key],0,7)=='convert')
        {
            $sql=$sql.$tableField[$key]."=".$arrayData[$key];
        }
        else
        {
            $sql=$sql.$tableField[$key]."='".$arrayData[$key]."'";
        }
        if($key!=(sizeof($tableField)-1))
        {
            $sql=$sql.",";
        }
    }
    $sql=$sql." WHERE ".$idField."='".$idData."'";
    echo $sql;
    
    $stmt = mysqli_query($conn, $sql);
    if( $stmt === false ) {
        
        http_response_code(500);
        die( print_r( mysqli_error($conn)));
    }
    else{
        http_response_code(200);
        echo 'Data Updated!';
    }
    
    mysqli_close($conn);   
}
}
?>