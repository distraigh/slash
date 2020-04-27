<?php
include 'cokot.php';

$hajar = new tri();
$imei = "869240048309852";
echo "Masukkan No Telepon : ";
$msisdn = trim(fgets(STDIN));
$otp = $tri->request_otp($msisdn,$imei);
echo $otp[1] . "\r\n";
echo "Masukkan OTP : ";
$otp = trim(fgets(STDIN));
$login = $tri->login($msisdn,$otp);
$login = json_decode($login,true);
$bearer = $login['access_token'];
$id = $tri->trans($bearer);
$id = json_decode($id,true);
$id = $id['data'][0]['rewardTransactionId'];
for($id1 = 1500; $id1 < 1600;$id1++)
{
  $hajar = $tri->claim($bearer,$id,$id1);
  echo $hajar . "\r\n";
  sleep(2);
}


?>
