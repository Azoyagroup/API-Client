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

        curl_close($curl);

        if ($err) {
            return ['status' => -500, 'message' => $err];
        } else {
            return json_decode($response, true);
        }
    }
}

