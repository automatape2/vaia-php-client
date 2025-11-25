<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | Your VAIA API key used for authenticating requests to the VAIA service.
    | You can obtain your API key from the VAIA dashboard.
    |
    */

    'api_key' => env('VAIA_API_KEY'),

    /*
    |--------------------------------------------------------------------------
    | API Base URL
    |--------------------------------------------------------------------------
    |
    | The base URL for the VAIA API. This defaults to the production endpoint
    | but can be overridden for testing or development environments.
    |
    */

    'base_url' => env('VAIA_BASE_URL', 'https://api.vaia.com'),

    /*
    |--------------------------------------------------------------------------
    | Request Timeout
    |--------------------------------------------------------------------------
    |
    | The maximum number of seconds to wait for a response from the VAIA API.
    | Increase this value if you experience timeout issues with longer requests.
    |
    */

    'timeout' => env('VAIA_TIMEOUT', 30),

    /*
    |--------------------------------------------------------------------------
    | Connection Timeout
    |--------------------------------------------------------------------------
    |
    | The maximum number of seconds to wait while trying to connect to the
    | VAIA API server. This is separate from the request timeout above.
    |
    */

    'connect_timeout' => env('VAIA_CONNECT_TIMEOUT', 10),

    /*
    |--------------------------------------------------------------------------
    | Retry Configuration
    |--------------------------------------------------------------------------
    |
    | Configure automatic retry behavior for failed requests. The client will
    | retry requests that fail due to network issues or server errors.
    |
    */

    'retry' => [
        // Number of times to retry a failed request
        'times' => env('VAIA_RETRY_TIMES', 3),

        // Milliseconds to wait between retries (supports exponential backoff)
        'sleep' => env('VAIA_RETRY_SLEEP', 100),
    ],

    /*
    |--------------------------------------------------------------------------
    | Logging
    |--------------------------------------------------------------------------
    |
    | Enable or disable request/response logging for debugging purposes.
    | When enabled, logs will be written to the configured log channel.
    |
    */

    'logging' => [
        // Enable or disable logging
        'enabled' => env('VAIA_LOGGING_ENABLED', false),

        // The log channel to use (null uses the default channel)
        'channel' => env('VAIA_LOG_CHANNEL'),
    ],

    /*
    |--------------------------------------------------------------------------
    | HTTP Client Options
    |--------------------------------------------------------------------------
    |
    | Additional options to pass to the underlying HTTP client. These options
    | will be merged with the default options used by the VAIA client.
    |
    */

    'http_options' => [
        // Verify SSL certificates (disable only for development)
        'verify' => env('VAIA_VERIFY_SSL', true),
    ],

];
