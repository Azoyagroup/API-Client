<?php
require 'sdk.php';

use Azoya\SDK\API;

define('TEST_API_URL', 'https://apitest-v2.azoyagroup.com');

// This is demo!
$sdk = new API(TEST_API_URL, 'baltini', 'pIFRZVcgcSDwyZhT', 'YRVXxO7yWNDgFCXmilCcc61vSRP0SJqI');
$sdk = new API(TEST_API_URL, 'exampleProvideCode', 'exampleApiKey', 'exampleApiSecret');

// Get Token
$tokenResponse = $sdk->getToken();
if (isset($tokenResponse["status"]) && $tokenResponse["status"] != 0) {
    echo 'Get Token err: ' . $tokenResponse["message"] . "\n";
    return;
}
$token = $tokenResponse["token"];
echo 'Token: ' . $token . "\n";


// Product Create
$ProductCreateJson = '{
    "items": [
        {
            "sku": "baltinitest80001",
            "name": "Down jacket for testM / Black0.8kg",
            "price": 3000,
            "special_price": 3000,
            "currency_code": "EUR",
            "qty": 1007,
            "is_in_stock": 1,
            "status": 1,
            "fields": [
                {
                    "name": "secondary_name",
                    "value": "Down jacket for testM / Black0.8kg"
                },
                {
                    "name": "size",
                    "value": "0.8kg"
                },
                {
                    "name": "barcode",
                    "value": "11002233"
                },
                {
                    "name": "color",
                    "value": "Black"
                }
            ]
        },
        {
            "sku": "baltinitest80002",
            "name": "Down jacket for testL / Red0.8kg",
            "price": 3100,
            "special_price": 3100,
            "currency_code": "EUR",
            "qty": 18,
            "is_in_stock": 1,
            "status": 1,
            "fields": [
                {
                    "name": "secondary_name",
                    "value": "Down jacket for testL / Red0.8kg"
                },
                {
                    "name": "size",
                    "value": "0.8kg"
                },
                {
                    "name": "color",
                    "value": "Red"
                }
            ]
        }
    ]
}';
$productCreateParams = json_decode($ProductCreateJson, true);
$productCreateResponse = $sdk->ProductCreate($token, $productCreateParams);
echo 'ProductCreate Response:' . print_r($productCreateResponse, true) . "\n";


// Order Search
$orderSearchParamsJson = '{
  "order_status": "processing",
  "per_count": 50
}';
$orderSearchParams = json_decode($orderSearchParamsJson, true);
$orderSearchResponse = $sdk->OrderSearch($token, $orderSearchParams);
echo 'orderSearch Response:' . print_r($orderSearchResponse, true) . "\n";