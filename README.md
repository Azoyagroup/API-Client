# PHP SDK for [Azoya API]

Welcome to the [Azoya API] PHP SDK. This SDK allows you to easily integrate [Azoya API] features into your PHP applications.

## Requirements

- PHP 5.6 or later
- [Composer](https://getcomposer.org/)

## Installation

To install the SDK, you can use Composer. Run the following command:

```bash
composer require azoyagroup/api-sdk
```

## Getting Started

Before you begin, you need to have an API key and secret from [Azoya]. If you don't have one, you can contact Azoya.

### Authentication

To authenticate your requests, you will need to use your API key and secret. Here's how you can set it up:

```php
require 'vendor/autoload.php';

use Azoya\API\SDK;
$apiUrl      = 'azoya_api_url';
$provideCode = 'your_provide_code_here';
$apiKey      = 'your_api_key_here';
$apiSecret   = 'your_api_secet_here';
$sdk = new SDK($apiUrl,$provideCode,$apiKey,$apiSecret);
```

### Making API Requests

Here's an example of how to make a simple API request using the SDK:

```php
$response = $sdk->getToken();
print_j($response);
$token = $response["token"];
```

## Examples

Here are some examples of common tasks you can perform with the SDK:

### Product Create

```php
$params = [
    'items' => [{
         "sku": "test sku",
         "name": "test name",
         // other required fields
    }],
];

try {
    $response = $sdk->ProductCreate($token,$params);
} catch (Exception $e) {
    echo "Error Product Create: " . $e->getMessage();
}
```

### Order Search

```php
$params = [
    'order_status' => 'processing',
    'per_count' => 50,
    // other required fields
];
try {
    $response = $sdk->OrderSearch($token,$params);
} catch (Exception $e) {
    echo "Error Order Search: " . $e->getMessage();
}
```

## License
The [Azoya API] PHP SDK is licensed under the [MIT License](LICENSE).

