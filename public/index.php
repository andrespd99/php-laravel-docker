<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$json = file_get_contents('php://input');
$data = json_decode($json);

$from = "emergencyapp@tuvelozexpress.com";
$to = $data->email;

$otp = $data->otp;

$subject = "Verificación de OTP";

$message = "Tu código OTP es: $otp";
$message = mb_convert_encoding($message, "UTF-8", "ISO-8859-1");

$headers = "From:" . $from . "\r\n";
$headers .= "Content-Type: text/html;charset=utf-8\r\n";

mail($to, $subject, $message, $headers);

echo "Email sended";
