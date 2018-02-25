<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LineWebbhook extends Controller
{
    public function verify() {
        $access_token = 'pToloaOV2TgYIOjrnWPWnsoBuVWrbIHsyGd0FygG902nwCXDrxE46Hx3c+tvNx1eiUpBDi1JNNH+sidjRAoTFbYPyCgmUCAQOTAYSdiEwCLHnMrMLEYOpNtv7F4lagtp8WJORXx0A8iYuEdmhTPEcwdB04t89/1O/w1cDnyilFU=';

        $url = 'https://api.line.me/v1/oauth/verify';

        $headers = array('Authorization: Bearer ' . $access_token);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        echo $result;
    }

    public function getReplyToken(Request $request) {
        $access_token = 'pToloaOV2TgYIOjrnWPWnsoBuVWrbIHsyGd0FygG902nwCXDrxE46Hx3c+tvNx1eiUpBDi1JNNH+sidjRAoTFbYPyCgmUCAQOTAYSdiEwCLHnMrMLEYOpNtv7F4lagtp8WJORXx0A8iYuEdmhTPEcwdB04t89/1O/w1cDnyilFU=';

        // Get POST body content
        $content = $request;
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

                    // Build message to reply back
                    $messages = [
                        
                        'type' => 'text',
                        'text' => $event['source']['groupId']
                        
                    ];

                    // Make a POST Request to Messaging API to reply to sender
                    $url = 'https://api.line.me/v2/bot/message/reply';
                    $data = [
                        'replyToken' => $replyToken,
                        'messages' => [$messages],
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

                    echo $result . "\r\n";
            

		}
	}
}
echo "OK";
    }
}
