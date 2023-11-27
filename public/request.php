<?php

$userId = "1";
$token = "MmZhZTMyNjI5ZDRlZjRmYzYzNDFmMTc1MWI0MDVlNDUgMSAxNjUyNTQ3ODc1MDAwIA==";

$urlGetToken = "http://localhost/YouDance/User/listusersjson/findBy_token/".$token;
$result = file_get_contents($urlGetToken);
$jsonResult = json_decode($result);

if( sizeof($jsonResult->{'data'}) != 1 ){
    echo "FAILED: unique user not found";
    return;
}
$user = $jsonResult->{'data'}[0];
if($user->{'id'} != $userId){
    echo "FAILED: user id not as expected";
    return;
}

$urlValidateToken = "http://localhost/YouDance/Security/validateToken/".$token."/".$userId;
$result = file_get_contents($urlValidateToken);
$jsonResult = json_decode($result);

if($jsonResult->{'data'} == "FAILED"){
    echo "FAILED: Token not valid";
    return;
}
print_r($jsonResult->{'data'});
//print_r($user->{'login'});

?>