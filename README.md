# StudySmarter for Laravel

A Laravel PHP client package for connecting your Laravel application to Vaia (formerly StudySmarter) accounts.

## Description

StudySmarter for Laravel provides a seamless bridge between your Laravel application and Vaia accounts. This package enables you to integrate Vaia's powerful learning platform features directly into your Laravel applications, allowing users to access their study materials, track learning progress, and synchronize data between platforms.

## Features

- **User Authentication** - Secure authentication with Vaia accounts using API keys
- **Study Materials Access** - Fetch and manage study materials, flashcards, and learning content
- **Progress Tracking** - Monitor and retrieve user learning progress and statistics
- **Data Synchronization** - Sync study data between your Laravel application and Vaia
- **Configurable Retry Logic** - Built-in retry mechanism for handling network issues
- **Comprehensive Logging** - Optional request/response logging for debugging
- **SSL Verification** - Secure communication with configurable SSL settings

## Requirements

- PHP 8.1 or higher
- Laravel 10.0 or higher (supports Laravel 11.0)

## Installation

Install the package via Composer:

```bash
composer require automatape2/vaia-php-client
```

The package will automatically register its service provider through Laravel's package discovery.

### Publishing Configuration

Optionally, you can publish the configuration file:

```bash
php artisan vendor:publish --provider="Automatape2\VaiaPhpClient\VaiaPhpClientServiceProvider"
```

## Configuration

After installation, configure your Vaia API connection by adding the following environment variables to your `.env` file:

```env
# Required
VAIA_API_KEY=your-api-key-here

# Optional - API Settings
VAIA_BASE_URL=https://api.vaia.com
VAIA_TIMEOUT=30
VAIA_CONNECT_TIMEOUT=10

# Optional - Retry Configuration
VAIA_RETRY_TIMES=3
VAIA_RETRY_SLEEP=100

# Optional - Logging
VAIA_LOGGING_ENABLED=false
VAIA_LOG_CHANNEL=

# Optional - SSL Configuration
VAIA_VERIFY_SSL=true
```

### Configuration Options

| Option | Description | Default |
|--------|-------------|---------|
| `VAIA_API_KEY` | Your Vaia API key (required) | `null` |
| `VAIA_BASE_URL` | Base URL for the Vaia API | `https://api.vaia.com` |
| `VAIA_TIMEOUT` | Request timeout in seconds | `30` |
| `VAIA_CONNECT_TIMEOUT` | Connection timeout in seconds | `10` |
| `VAIA_RETRY_TIMES` | Number of retry attempts | `3` |
| `VAIA_RETRY_SLEEP` | Milliseconds between retries | `100` |
| `VAIA_LOGGING_ENABLED` | Enable request/response logging | `false` |
| `VAIA_LOG_CHANNEL` | Log channel to use | `null` (uses Laravel default) |
| `VAIA_VERIFY_SSL` | Verify SSL certificates | `true` |

## Usage Examples

> **Note**: The following examples demonstrate common usage patterns. Refer to the API documentation for the complete list of available methods.

### Basic Authentication

```php
use Automatape2\VaiaPhpClient\Facades\Vaia;

// Authenticate and verify connection
$authenticated = Vaia::authenticate();

if ($authenticated) {
    // Connection successful
}
```

### Retrieving Study Content

```php
use Automatape2\VaiaPhpClient\Facades\Vaia;

// Get all study sets for the authenticated user
$studySets = Vaia::getStudySets();

// Get a specific study set by ID
$studySet = Vaia::getStudySet($studySetId);

// Get flashcards from a study set
$flashcards = Vaia::getFlashcards($studySetId);
```

### Managing Account Data

```php
use Automatape2\VaiaPhpClient\Facades\Vaia;

// Get user profile information
$profile = Vaia::getUserProfile();

// Get learning progress statistics
$progress = Vaia::getProgress();

// Sync local data with Vaia
$syncResult = Vaia::sync($localData);
```

### Using Dependency Injection

```php
use Automatape2\VaiaPhpClient\VaiaClient;

class StudyController extends Controller
{
    public function __construct(
        protected VaiaClient $vaia
    ) {}

    public function index()
    {
        $studySets = $this->vaia->getStudySets();
        
        return view('study.index', compact('studySets'));
    }
}
```

## Contributing

Contributions are welcome! Please follow these guidelines:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Make your changes
4. Run the tests (`composer test`)
5. Run the code formatter (`composer format`)
6. Commit your changes (`git commit -m 'Add amazing feature'`)
7. Push to the branch (`git push origin feature/amazing-feature`)
8. Open a Pull Request

### Development Setup

```bash
# Clone the repository
git clone https://github.com/automatape2/vaia-php-client.git

# Install dependencies
composer install

# Run tests
composer test

# Format code
composer format
```

## License

This package is open-sourced software licensed under the [MIT license](LICENSE).

## Contact/Support

- **Issues**: Report bugs or request features via [GitHub Issues](https://github.com/automatape2/vaia-php-client/issues)
- **Discussions**: For questions and discussions, use [GitHub Discussions](https://github.com/automatape2/vaia-php-client/discussions)
- **Email**: Contact the maintainer at automatape2@users.noreply.github.com

---

Made with ❤️ for the Laravel community