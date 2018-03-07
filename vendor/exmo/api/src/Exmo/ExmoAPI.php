<?php
namespace Exmo\Api\Tests;

use Exmo\Api\Request;

/**
 * Class ExmoAPI
 * @package Exmo\Api\Tests
 */
class ExmoAPI 
{

    protected $key;         // API key
    protected $secret;      // API secret
    protected $url;         // API base URL
    protected $curl;        // curl handle

    /**
     * Constructor for ExmoAPI
     */
    function __construct()
    {
        $this->key        = config('exmo.auth.key');
        $this->secret     = config('exmo.auth.secret');
        $this->url        = config('exmo.urls.api');
        $this->curl       = curl_init();
    }

    private function request($url, $params = [], $method = 'GET')
    {
        $this->url = config('exmo.urls.api');
        $query   = http_build_query($params, '', '&');
        // Set URL & Header
        curl_setopt($this->curl, CURLOPT_URL, $this->url . $url."?".$query);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, array());
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);

        //Add post vars
        if($method == 'POST')
        {
            curl_setopt($this->curl, CURLOPT_POST, count($params));
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $params);
        }

        //Get result
        $result = curl_exec($this->curl);
        $result = json_decode($result);

        return $result;
    }

    public function getOrderBookLimit($pair,$limit)
    {
        $data = [
            'pair' => $pair,
            'limit' => $limit
        ];
        return $this->request('order_book', $data);
    }



    
    public function setUp()
    {

    }

    public function testRequestUserInfo()
    {
        $request = $this->createExmoApiRequest();
        $result = $request->query('user_info');
        $this->assertArrayNotHasKey('error', $result);
        $this->assertArrayHasKey('server_date', $result);
        $this->assertArrayHasKey('uid', $result);
        $this->assertArrayHasKey('balances', $result);
        $this->assertNotEmpty($result['balances']);
    }

    public function testRequestUserCancelledOrders()
    {
        $request = $this->createExmoApiRequest();
        $result = $request->query('user_cancelled_orders', ['limit' => 1, 'offset' => 0]);
        $this->assertArrayNotHasKey('error', $result);
    }

    /**
     * @return Request
     */
    private function createExmoApiRequest()
    {
        return new Request('your_key', 'your_secret');
    }
}