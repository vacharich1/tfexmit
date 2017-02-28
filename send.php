<?php

$access_token = 'Dqr+iU0lp4zbOxG7zGj/YHmp9WJTpDPi+uUGu9arjaQQ6R6XOLPsosQT6MLzMjwlzLpPGQKlye6PSMd7EN9xGcI1/wPrJAUNaaILNn4kLbrHsXNGfOak1aU6BX7H+c+kK4YdUkcDOXMtLBB/Fgiu7wdB04t89/1O/w1cDnyilFU=';
$host= "sql6.freemysqlhosting.net";
$db = "sql6157803";
$CHAR_SET = "charset=utf8"; 

$username = "sql6157803";    
$password = "XErmELW5R3"; 
	

$link = mysqli_connect($host, $username, $password, $db);
if (!$link) {
    	die('Could not connect: ' . mysqli_connect_errno());
}
else
{
	echo "connect";
}

$userid="";
$text="";
$sql1 = "SELECT * FROM `tfexmit` WHERE 1";
$result = $link->query($sql1);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$userid=$row["userid"];
		$text=$row["textuse"];
	}

}


$format_text = [
					"type" => "text",
					"text" => $text
				];		

//'to' => $userid,
$data = [
			'to' => 'Ub5f45b12f0f8f8a3a08e5b52ebbcc96b',
			'messages' => [$format_text]
];
		
$header = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

echo "ssss";

$ch = curl_init('https://api.line.me/v2/bot/message/push');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$result = curl_exec($ch);
curl_close($ch);

?>