<?php

namespace Azoya\API;

class SDK
{
    protected $providerCode;
    protected $apiBaseUrl;
    protected $apiKey;
    protected $apiSecret;

    public function __construct($apiBaseUrl, $providerCode, $apiKey, $apiSecret)
    {
        $this->providerCode = $providerCode;
        $this->apiBaseUrl = $apiBaseUrl;
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    // Get Token
    public function getToken()
    {
        $url = $this->apiBaseUrl . '/v2/token';
        $data = [
            'provider_code' => $this->providerCode,
            'app_key' => $this->apiKey,
            'secret' => $this->apiSecret,
        ];
        $headers = [
            'Content-Type:application/json'
        ];
        $response = $this->makeRequest($url, 'POST', $data, $headers);
        if (isset($response["status"]) && $response["status"] !== 0) {
            throw new \Exception("API error: {$response["message"]}");
        }
        return $response;
    }

    // Product Create
    public function ProductCreate($token, $params)
    {
        $url = $this->apiBaseUrl . '/v2/catalog/product/create';
        $headers = [
            'Authorization: Bearer ' . $token,
            'Content-Type:application/json'
        ];

        $response = $this->makeRequest($url, 'POST', $params, $headers);
        if (isset($response["status"]) && $response["status"] !== 0) {
            throw new \Exception("API error: {$response["message"]}");
        }
        return $response;
    }

    // Product Synchronize
    public function ProductSynchronize($token, $params)
    {
        $url = $this->apiBaseUrl . '/v2/catalog/product/synchronize';
        $headers = [
            'Authorization: Bearer ' . $token,
            'Content-Type:application/json'
        ];

        $response = $this->makeRequest($url, 'POST', $params, $headers);
        if (isset($response["status"]) && $response["status"] !== 0) {
            throw new \Exception("API error: {$response["message"]}");
        }
        return $response;
    }

    // Price Synchronize
    public function PriceSynchronize($token, $params)
    {
        $url = $this->apiBaseUrl . '/v2/catalog/price/synchronize';
        $headers = [
            'Authorization: Bearer ' . $token,
            'Content-Type:application/json'
        ];

        $response = $this->makeRequest($url, 'POST', $params, $headers);
        if (isset($response["status"]) && $response["status"] !== 0) {
            throw new \Exception("API error: {$response["message"]}");
        }
        return $response;
    }

    // Qty Synchronize
    public function QtySynchronize($token, $params)
    {
        $url = $this->apiBaseUrl . '/v2/catalog/qty/synchronize';
        $headers = [
            'Authorization: Bearer ' . $token,
            'Content-Type:application/json'
        ];

        $response = $this->makeRequest($url, 'POST', $params, $headers);
        if (isset($response["status"]) && $response["status"] !== 0) {
            throw new \Exception("API error: {$response["message"]}");
        }
        return $response;
    }


    // Order Search
    public function OrderSearch($token, $params)
    {
        $url = $this->apiBaseUrl . '/v2/sales/order/search';
        $headers = [
            'Authorization: Bearer ' . $token,
            'Content-Type:application/json'
        ];

        $response = $this->makeRequest($url, 'POST', $params, $headers);
        if (isset($response["status"]) && $response["status"] !== 0) {
            throw new \Exception("API error: {$response["message"]}");
        }
        return $response;
    }

    // Order Cancel
    public function OrderCancel($token, $params)
    {
        $url = $this->apiBaseUrl . '/v2/sales/order/cancel';
        $headers = [
            'Authorization: Bearer ' . $token,
            'Content-Type:application/json'
        ];

        $response = $this->makeRequest($url, 'POST', $params, $headers);
        if (isset($response["status"]) && $response["status"] !== 0) {
            throw new \Exception("API error: {$response["message"]}");
        }
        return $response;
    }

    // Order Synchronize
    public function OrderSynchronize($token, $params)
    {
        $url = $this->apiBaseUrl . '/v2/sales/order/synchronize';
        $headers = [
            'Authorization: Bearer ' . $token,
            'Content-Type:application/json'
        ];

        $response = $this->makeRequest($url, 'POST', $params, $headers);
        if (isset($response["status"]) && $response["status"] !== 0) {
            throw new \Exception("API error: {$response["message"]}");
        }
        return $response;
    }

    // Shipment Synchronize
    public function ShipmentSynchronize($token, $params)
    {
        $url = $this->apiBaseUrl . '/v2/logistics/shipment/synchronize';
        $headers = [
            'Authorization: Bearer ' . $token,
            'Content-Type:application/json'
        ];

        $response = $this->makeRequest($url, 'POST', $params, $headers);
        if (isset($response["status"]) && $response["status"] !== 0) {
            throw new \Exception("API error: {$response["message"]}");
        }
        return $response;
    }

    // Shipment Notice
    public function ShipmentNotice($token, $params)
    {
        $url = $this->apiBaseUrl . '/v2/logistics/shipment/notice';
        $headers = [
            'Authorization: Bearer ' . $token,
            'Content-Type:application/json'
        ];

        $response = $this->makeRequest($url, 'POST', $params, $headers);
        if (isset($response["status"]) && $response["status"] !== 0) {
            throw new \Exception("API error: {$response["message"]}");
        }
        return $response;
    }



    protected function  getHttpStatusMessage($code) {
        // 定义一个数组，映射 HTTP 状态码到对应的信息
        $httpStatusMessages = array(
            100 => 'Continue',
            101 => 'Switching Protocols',
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            307 => 'Temporary Redirect',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Time-out',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Request Entity Too Large',
            414 => 'Request-URI Too Large',
            415 => 'Unsupported Media Type',
            416 => 'Requested range not satisfiable',
            417 => 'Expectation Failed',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Time-out',
            505 => 'HTTP Version not supported'
        );
        return isset($httpStatusMessages[$code]) ? $httpStatusMessages[$code]:'Unknown Status';
    }


    // Send HTTP Request
    protected function makeRequest($url, $method, $data = [], $headers = [])
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);

        if (!empty($data) && in_array($method, ['POST', 'PUT'])) {
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
        }

        if (!empty($headers)) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        }

        $response = curl_exec($curl);
        $err = curl_error($curl);

        $httpStatusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        if ($httpStatusCode != 200){
            return ['status' => -500, 'message' => 'Response http status:'.$httpStatusCode." ".$this->getHttpStatusMessage($httpStatusCode)];
        }
        if ($err) {
            return ['status' => -1, 'message' => $err];
        }

        return json_decode($response, true);
    }
}

