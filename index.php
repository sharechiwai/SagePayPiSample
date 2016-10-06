<?php

$username='hJYxsw7HLbj40cB8udES8CDRFLhuJ8G54O6rDpUXvE6hYDrria';
$password ='o2iHSrFybYMZpmWOQMuhsXP52V4fBtpuSDshrKDSWsBY1OiN6hwd9Kb12z4j5Us5u';

$merchantSessionKey = "";

$AuthorizationHeader = base64_encode($username.":".$password);

echo $AuthorizationHeader;
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://pi-test.sagepay.com/api/v1/merchant-session-keys",
  CURLOPT_RETURNTRANSFER => true,
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false),
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => '{ "vendorName": "sandbox" }',
  CURLOPT_HTTPHEADER => array(
    //"Authorization: Basic aEpZeHN3N0hMYmo0MGNCOHVkRVM4Q0RSRkxodUo4RzU0TzZyRHBVWHZFNmhZRHJyaWE6bzJpSFNyRnliWU1acG1XT1FNdWhzWFA1MlY0ZkJ0cHVTRHNocktEU1dzQlkxT2lONmh3ZDlLYjEyejRqNVVzNXU=",
    "Authorization: Basic $AuthorizationHeader",
    "Cache-Control: no-cache",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if($err==""){
    $jsonData = json_decode($response);
    echo "<p>";
    $merchantSessionKey = $jsonData->merchantSessionKey;
}else{
var_dump ($err); 
}



echo $merchantSessionKey;


