<?php
namespace ngpay;

use mysql_xdevapi\Exception;

class NgPay
{
    private static $apiKey;
    private static $apiEndpoint = "https://ngpay.net/api/";

    /**
     * @param mixed $apiKey
     */
    public static function setApiKey($apiKey)
    {
        self::$apiKey = $apiKey;
    }

    /**
     * @param $route
     * @param $data
     * @return mixed
     */
    public static function post($route, $data) {
        $contentType = "application/x-www-form-urlencoded";

        if(is_array($data)) {
            $contentType = "application/json";
            $data = json_encode($data);
        }

        if(is_object($data)) {
            $contentType = "application/json";
            if(method_exists($data, "toArray")) {
                $data = json_encode($data->toArray());
            }
            else {
                $data = json_encode($data);
            }
        }

        $ch = curl_init(self::$apiEndpoint . $route);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . self::$apiKey,
                'Content-Type: ' . $contentType,
                'Content-Length: ' . strlen($data))
        );

        $result = curl_exec($ch);
        if($result === false) {
            throw new Exception("Communication failure NG Pay POST /{$route} " . curl_error($ch));
        }

        $httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);

        if($httpCode != 200 && $httpCode != 201) {
            throw new Exception("Communication failure NG Pay POST /{$route} HTTP response code was {$httpCode}");
        }

        return json_decode($result, true);
    }

    /**
     * @param $route
     * @return mixed
     */
    public static function get($route) {
        $ch = curl_init(self::$apiEndpoint . $route);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . self::$apiKey
            )
        );

        $result = curl_exec($ch);
        if($result === false) {
            throw new Exception("Communication failure NG Pay GET /{$route} " . curl_error($ch));
        }

        $httpCode = curl_getinfo($ch,CURLINFO_HTTP_CODE);

        if($httpCode != 200 && $httpCode != 201) {
            throw new Exception("Communication failure NG Pay GET /{$route} HTTP response code was {$httpCode}");
        }

        return json_decode($result, true);
    }

}