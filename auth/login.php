<?php
include '../connection.php';
$login = (object)$_POST;
$username = ''; $password = '';
if(isset($login->username)){
    $username = $login->username;
    $password = sha1($login->password);
}
$result=[];
if ($data = mysqli_query($conn, "select * from tbl_user where email='$username' and password='$password';")) {
    while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
        $result[] = $row;
    }
}
if(sizeof($result)==1)
{
    $token = $result;
    unset($token[0]['password']);
     // set response code
     http_response_code(200);
  
     // generate jwt
     echo json_encode(
             array(
                "code" => "200",
                 "message" => "Successful login.",
                 "jwt" => $token
             )
         );
}
else
{
    http_response_code(200);
    echo json_encode(array(
        "code" => "404",
        "message" => "User dan Password salah!",
        "content" => $login
    )  
    );
}
mysqli_free_result($data);
mysqli_close($conn);
?>
