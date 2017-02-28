<?php
$access_token = 'Dqr+iU0lp4zbOxG7zGj/YHmp9WJTpDPi+uUGu9arjaQQ6R6XOLPsosQT6MLzMjwlzLpPGQKlye6PSMd7EN9xGcI1/wPrJAUNaaILNn4kLbrHsXNGfOak1aU6BX7H+c+kK4YdUkcDOXMtLBB/Fgiu7wdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];

			if($text == '##addroombyjay')
			{
					$messages55 = ['type' => 'text','text' => $event['source']['userId']];
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