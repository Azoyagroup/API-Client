<?php
require 'sdk.php';

use Azoya\API\SDK;

define('TEST_API_URL', 'https://apitest.example.com');

// This is demo!
$sdk = new SDK(TEST_API_URL, 'exampleProvideCode', 'exampleApiKey', 'exampleApiSecret');

// Get Token
try {
    $tokenResponse = $sdk->getToken();
    $token = $tokenResponse["token"];
    echo 'Token: ' . $token . "\n";
} catch (Exception $e) {
    echo "Error Get Token: " . $e->getMessage();
    return;
}


// Product Create
$ProductCreateJson = '{
    "items": [
        {
            "sku": "exampletest80001",
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
            "sku": "exampletest80002",
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
try {
    $productCreateParams = json_decode($ProductCreateJson, true);
    $productCreateResponse = $sdk->ProductCreate($token, $productCreateParams);
    echo 'ProductCreate Response:' . print_r($productCreateResponse, true) . "\n";
} catch (Exception $e) {
    echo "Error Product Create: " . $e->getMessage();
    return;
}


// Order Search
$orderSearchParamsJson = '{
  "order_status": "processing",
  "per_count": 50
}';
$orderSearchParams = json_decode($orderSearchParamsJson, true);
try {
    $orderSearchResponse = $sdk->OrderSearch($token, $orderSearchParams);
    echo 'orderSearch Response:' . print_r($orderSearchResponse, true) . "\n";
} catch (Exception $e) {
    echo "Error Order Search: " . $e->getMessage();
    return;
}