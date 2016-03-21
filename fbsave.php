<?php


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization, Content-Type, Accept");

$request_body = file_get_contents('php://input');
$datastring = json_decode($request_body, true);

$img = $datastring["imgBase64"];
$filename = $datastring["filename"];

$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
// $file = UPLOAD_DIR . $filename . '.png';
$file = './fb/' . $filename . '.png';
// echo $file;
$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';

?>
