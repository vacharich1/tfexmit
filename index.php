<?php
$host= "sql6.freemysqlhosting.net";
$db = "sql6162161";
$CHAR_SET = "charset=utf8"; 

$username = "sql6162161";    
$password = "XWhdUiDJPk"; 
	

$link = mysqli_connect($host, $username, $password, $db);
if (!$link) {
    	die('Could not connect: ' . mysqli_connect_errno());
}
else
{
	echo "connect";
}
#$access_token = 'Dqr+iU0lp4zbOxG7zGj/YHmp9WJTpDPi+uUGu9arjaQQ6R6XOLPsosQT6MLzMjwlzLpPGQKlye6PSMd7EN9xGcI1/wPrJAUNaaILNn4kLbrHsXNGfOak1aU6BX7H+c+kK4YdUkcDOXMtLBB/Fgiu7wdB04t89/1O/w1cDnyilFU=';
$access_token = '2+FKgwMGyEk3CabCTZaEdzWSYPV3+Q9GEHnK6iAPWkmWbdJn9ae32mvubg5VyBDhIKyDO+ApnlTKizVMeNi0TbjEsTvB7cLij3nV96mD/Th3ESufR+cHN9qJuFeSCISBIxV0+AuTLdw/ucb+sS1+WgdB04t89/1O/w1cDnyilFU=';
// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);

// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		$replyToken = $event['replyToken'];
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			$messages55 = ['type' => 'text','text' => $event['source']['groupId']];
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
								'replyToken' => $replyToken,
								'messages' => [$messages55]
							];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
							
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);
			
		}
			// Get replyToken
			$replyToken = $event['replyToken'];
			
			if($text == '##addroombyjay')
			{
					$messages55 = ['type' => 'text','text' => $event['source']['groupId']];
					// Make a POST Request to Messaging API to reply to sender
					$url = 'https://api.line.me/v2/bot/message/reply';
					$data = [
								'replyToken' => $replyToken,
								'messages' => [$messages55]
							];
					$post = json_encode($data);
					$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
							
					$ch = curl_init($url);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
					curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
					$result = curl_exec($ch);
					curl_close($ch);
			}	
		}
	}
}
echo "OK";
