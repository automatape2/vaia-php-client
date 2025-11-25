# VAIA PHP Client

A PHP client library for interacting with the VAIA API. This package provides a simple and elegant way to integrate VAIA services into your PHP applications, with first-class support for Laravel.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/automatape2/vaia-php-client.svg?style=flat-square)](https://packagist.org/packages/automatape2/vaia-php-client)
[![Total Downloads](https://img.shields.io/packagist/dt/automatape2/vaia-php-client.svg?style=flat-square)](https://packagist.org/packages/automatape2/vaia-php-client)
[![License](https://img.shields.io/packagist/l/automatape2/vaia-php-client.svg?style=flat-square)](https://packagist.org/packages/automatape2/vaia-php-client)

## Table of Contents

- [System Requirements](#system-requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Basic Usage](#basic-usage)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)

## System Requirements

- PHP 8.1 or higher
- Composer 2.0 or higher
- Laravel 10.x or 11.x (optional, for Laravel integration)
- ext-json PHP extension
- ext-curl PHP extension (recommended)

## Installation

You can install the package via Composer:

```bash
composer require automatape2/vaia-php-client
```

### Laravel Installation

If you are using Laravel, the package will automatically register itself using Laravel's package auto-discovery feature.

To publish the configuration file, run:

```bash
php artisan vendor:publish --provider="Automatape2\VaiaPhpClient\VaiaServiceProvider" --tag="config"
```

This will create a `config/vaia.php` configuration file in your application.

## Configuration

### Environment Variables

Add the following environment variables to your `.env` file:

```env
VAIA_API_KEY=your-api-key-here
VAIA_API_URL=https://api.vaia.com
VAIA_TIMEOUT=30
```

### Configuration File (Laravel)

After publishing the configuration file, you can customize the settings in `config/vaia.php`:

```php
<?php

return [
    /*
    |--------------------------------------------------------------------------
    | VAIA API Key
    |--------------------------------------------------------------------------
    |
    | Your VAIA API key for authentication.
    |
    */
    'api_key' => env('VAIA_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | VAIA API URL
    |--------------------------------------------------------------------------
    |
    | The base URL for the VAIA API.
    |
    */
    'api_url' => env('VAIA_API_URL', 'https://api.vaia.com'),

    /*
    |--------------------------------------------------------------------------
    | Request Timeout
    |--------------------------------------------------------------------------
    |
    | The timeout in seconds for API requests.
    |
    */
    'timeout' => env('VAIA_TIMEOUT', 30),
];
```

### Standalone PHP Configuration

For standalone PHP applications (without Laravel), you can configure the client directly:

```php
<?php

use Automatape2\VaiaPhpClient\VaiaClient;

$client = new VaiaClient([
    'api_key' => 'your-api-key-here',
    'api_url' => 'https://api.vaia.com',
    'timeout' => 30,
]);
```

## Basic Usage

### Using the Facade (Laravel)

```php
<?php

use Automatape2\VaiaPhpClient\Facades\Vaia;

// Make a simple API request
$response = Vaia::get('/endpoint');

// Make a POST request with data
$response = Vaia::post('/endpoint', [
    'key' => 'value',
]);
```

### Using Dependency Injection (Laravel)

```php
<?php

namespace App\Http\Controllers;

use Automatape2\VaiaPhpClient\VaiaClient;

class ExampleController extends Controller
{
    public function __construct(
        private VaiaClient $vaiaClient
    ) {}

    public function index()
    {
        $response = $this->vaiaClient->get('/endpoint');
        
        return response()->json($response);
    }
}
```

### Standalone PHP Usage

```php
<?php

require_once 'vendor/autoload.php';

use Automatape2\VaiaPhpClient\VaiaClient;

// Initialize the client
$client = new VaiaClient([
    'api_key' => 'your-api-key-here',
]);

// Make a GET request
$response = $client->get('/endpoint');

// Make a POST request
$response = $client->post('/endpoint', [
    'key' => 'value',
]);

// Make a PUT request
$response = $client->put('/endpoint/1', [
    'key' => 'updated-value',
]);

// Make a DELETE request
$response = $client->delete('/endpoint/1');
```

### Error Handling

```php
<?php

use Automatape2\VaiaPhpClient\VaiaClient;
use Automatape2\VaiaPhpClient\Exceptions\VaiaException;
use Automatape2\VaiaPhpClient\Exceptions\AuthenticationException;
use Automatape2\VaiaPhpClient\Exceptions\RateLimitException;

$client = new VaiaClient([
    'api_key' => 'your-api-key-here',
]);

try {
    $response = $client->get('/endpoint');
} catch (AuthenticationException $e) {
    // Handle authentication errors
    echo "Authentication failed: " . $e->getMessage();
} catch (RateLimitException $e) {
    // Handle rate limiting
    echo "Rate limit exceeded. Retry after: " . $e->getRetryAfter() . " seconds";
} catch (VaiaException $e) {
    // Handle general API errors
    echo "API error: " . $e->getMessage();
}
```

## Testing

Run the test suite with:

```bash
composer test
```

For test coverage:

```bash
composer test-coverage
```

## Contributing

Please see [CONTRIBUTING.md](CONTRIBUTING.md) for details on how to contribute to this project.

## Security

If you discover any security-related issues, please use the [GitHub Security Advisories](https://github.com/automatape2/vaia-php-client/security/advisories) feature to report them privately instead of using the public issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.