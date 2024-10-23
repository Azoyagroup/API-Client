# PHP SDK for [Azoya API]

Welcome to the [Azoya API] PHP SDK. This SDK allows you to easily integrate [Azoya API] features into your PHP applications.

## Requirements

- PHP 5.6 or later
- [Composer](https://getcomposer.org/)
- [Guzzle HTTP Client](https://docs.guzzlephp.org/en/stable/) (optional, but recommended for making HTTP requests)

## Installation

To install the SDK, you can use Composer. Run the following command:

```bash
composer require azoyagroup/api-sdk
```

## Getting Started

Before you begin, you need to have an API key from [Azoya API]. If you don't have one, you can register and get your API key from the [Azoya API] dashboard.

### Authentication

To authenticate your requests, you will need to use your API key. Here's how you can set it up:

```php
require 'vendor/autoload.php';

use Azoya\SDK\Api;
$apiHost = 'api_host'
$provideCode = 'your_provide_code_here';
$apiKey = 'your_api_key_here';
$apiSecret = 'your_api_secet_here';
$sdk = new Api($apiHost,$provideCode,$apiKey,$apiSecret);
```

### Making API Requests

Here's an example of how to make a simple API request using the SDK:

```php
$response = $sdk->getToken();
print_r($response);
```

## Documentation

For a comprehensive list of methods and examples, check out the [Azoya API] PHP SDK documentation:

[Your Documentation Link]

## Examples

Here are some examples of common tasks you can perform with the SDK:

### Product Create

```php
$params = [
    'name' => 'Example product Name',
    // other required fields
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

### Handling Errors

The SDK will throw exceptions for most errors. You can handle these in a try-catch block:

```php
try {
    // Make an API request that might fail
} catch (Exception $e) {
    // Handle other errors
    echo "Api Error: " . $e->getMessage();
}
```

## Contributing

We welcome contributions to the [Azoya API] PHP SDK. Please see the [CONTRIBUTING.md](CONTRIBUTING.md) file for instructions on how to get involved.

## License

The [Azoya API] PHP SDK is licensed under the [MIT License](LICENSE).

