<?php 
if (isset($_POST['amount']) && isset($_POST['receipt'])) {
$amount = $_POST['amount'];
$receipt = $_POST['receipt'];

// Live key
// $keyId = "rzp_live_ljsAaxpqhWlZl7";
// $keySecret = "HK9WXH4HWh9EIw2Eqme6bUwB";

// test key
$keyId = "rzp_test_pMx35tTSCT8lza";
$keySecret = "NEQ1DhaEstFZSXg6fSoepy2h";
$displayCurrency = "INR";
$formData = array('amount' => $amount, 'receipt' => $receipt, "currency" => $displayCurrency);
$data = json_encode($formData);
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/orders");
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERPWD, $keyId . ":" . $keySecret);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));

$result = curl_exec($ch);
$returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// $resp = json_decode($result, true);

// print_r($result);
$id = json_decode($result)->{'id'};

echo $id;
}
