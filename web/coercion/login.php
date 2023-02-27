<?php
$json = json_decode(file_get_contents("php://input"));

$secret = "IDEH{Type_Ju9G11ng_CH411En93}";
$username = $json->username;
$password = $json->password;

$auth = base64_encode($username.":".$password);

$result = "";

if (empty($username)) {
    $result = '{"status":"error","message":"Username missing"}';
} else if(empty($password)){
    $result = '{"status":"error","message":"password missing"}';
} else {
    if($password == $secret){
        $flag = $secret;
        $result = '{"status":"success","message":"Successfully authenticated","flag":"'.$flag.'"}';
    } else {
        $result = '{"status": "error", "message":"Invalid username or password"}';
    }
}

echo $result;

?>