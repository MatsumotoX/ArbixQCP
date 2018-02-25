<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LineWebhook;

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

    public function getReplyToken() {

        // Get POST body content
        $content = file_get_contents('php://input');
        // Parse JSON
        $events = json_decode($content, true);
        // Validate parsed JSON data
        
        $replyToken = $event['replyToken'];

        $line = new LineWebhook;
        $line->replyToken = 'hi';
        $line->save();
	
	}
}


