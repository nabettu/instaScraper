<?php
header('Access-Control-Allow-Origin: *');
$user = $_GET['u'];
$url = "https://www.instagram.com/" . $user. "/";

$cp = curl_init();
curl_setopt($cp, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($cp, CURLOPT_URL, $url);
curl_setopt($cp, CURLOPT_TIMEOUT, 60);
$contents = curl_exec($cp);
curl_close($cp);

$varStr = "window._sharedData = ";
$content = mb_convert_encoding($contents, 'UTF-8', 'auto');
$strStart = substr($content, strpos($content, $varStr) + strlen($varStr));

$closetag = "</script>";
$data = substr($strStart, 0, strpos($strStart, '<script') - strlen($closetag) - 1);
echo $data;
exit();
?>
