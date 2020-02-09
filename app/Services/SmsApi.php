<?php

namespace App\Services;

use Facade\FlareClient\Http\Client;
use GuzzleHttp\Client as GuzzleHttpClient;

Class SmsApi
{
    protected $url;
    protected $http;
    protected $headers;



    public static function sendSMS($numbers,$message){
        $client = new GuzzleHttpClient();

        $response = [
            $client->get('http://apidocs.speedamobile.com/api/SendSMSMulti?api_id=API3620719589&api_password=e%rw658!&sms_type=T&encoding=T&sender_id=BAYLOR&phonenumber='.$numbers.'&textmessage='.$message.'', []),

                  ];
        return $response;
    }

    private function getResponse(string $uri = null)
    {
        $full_path = $this->url;
        $full_path .= $uri;

        $request = $this->http->get($full_path, [
            'headers'         => $this->headers,
            'timeout'         => 30,
            'connect_timeout' => true,
            'http_errors'     => true,
        ]);

        $response = $request ? $request->getBody()->getContents() : null;
        $status = $request ? $request->getStatusCode() : 500;

        if ($response && $status === 200 && $response !== 'null') {
            return (object) json_decode($response);
        }

        return null;
    }

    private function postResponse(string $uri = null, array $post_params = [])
    {
        $full_path = $this->url;
        $full_path .= $uri;

        $request = $this->http->post($full_path, [
            'headers'         => $this->headers,
            'timeout'         => 30,
            'connect_timeout' => true,
            'http_errors'     => true,
            'form_params'     => $post_params,
        ]);

        $response = $request ? $request->getBody()->getContents() : null;
        $status = $request ? $request->getStatusCode() : 500;

        if ($response && $status === 200 && $response !== 'null') {
            return (object) json_decode($response);
        }

        return null;
    }

    public function getMonitors()
    {
        return $this->getResponse('getMonitors');
    }



}


?>
