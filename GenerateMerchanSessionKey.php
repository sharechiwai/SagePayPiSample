<?php
$vendorName= "sandbox";
$username='hJYxsw7HLbj40cB8udES8CDRFLhuJ8G54O6rDpUXvE6hYDrria';
$password ='o2iHSrFybYMZpmWOQMuhsXP52V4fBtpuSDshrKDSWsBY1OiN6hwd9Kb12z4j5Us5u';

function GenerateMerchantSessionKey($vendorName, $username, $password){
    $AuthorizationHeader = base64_encode($username.":".$password);
    $merchantSessionKey = "";

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "https://pi-test.sagepay.com/api/v1/merchant-session-keys",
  CURLOPT_RETURNTRANSFER => true,
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false),
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => '{ "vendorName":"'.$vendorName.'"}',
  CURLOPT_HTTPHEADER => array(
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
   
    $merchantSessionKey = $jsonData->merchantSessionKey;
}else{
echo "Errorr";
}
echo $merchantSessionKey;
}
echo "yehahea";
GenerateMerchantSessionKey($vendorName, $username, $password);
