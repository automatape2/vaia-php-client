# Contributing to VAIA PHP Client

Thank you for considering contributing to the VAIA PHP Client! This document provides guidelines and information about contributing to this project.

## Table of Contents

- [Code of Conduct](#code-of-conduct)
- [Getting Started](#getting-started)
- [Development Setup](#development-setup)
- [Pull Request Process](#pull-request-process)
- [Coding Standards](#coding-standards)
- [Testing](#testing)
- [Documentation](#documentation)
- [Reporting Bugs](#reporting-bugs)
- [Suggesting Features](#suggesting-features)

## Code of Conduct

This project and everyone participating in it is governed by our commitment to providing a welcoming and inclusive environment. Please be respectful and constructive in all interactions.

## Getting Started

1. Fork the repository on GitHub
2. Clone your fork locally
3. Set up the development environment
4. Create a new branch for your contribution
5. Make your changes
6. Submit a pull request

## Development Setup

### Prerequisites

- PHP 8.1 or higher
- Composer 2.0 or higher
- Git

### Installation

1. Clone your fork of the repository:

```bash
git clone https://github.com/your-username/vaia-php-client.git
cd vaia-php-client
```

2. Install dependencies:

```bash
composer install
```

3. Copy the environment file (if applicable):

```bash
cp .env.example .env
```

4. Verify your setup by running the tests:

```bash
composer test
```

## Pull Request Process

1. **Create a Branch**: Create a new branch from `main` for your feature or bug fix:

```bash
git checkout -b feature/your-feature-name
# or
git checkout -b fix/your-bug-fix
```

2. **Make Changes**: Implement your changes following our coding standards.

3. **Write Tests**: Add or update tests to cover your changes.

4. **Run Tests**: Ensure all tests pass:

```bash
composer test
```

5. **Code Style**: Ensure your code follows our coding standards:

```bash
composer lint
# or to automatically fix issues
composer lint-fix
```

6. **Commit Changes**: Write clear and descriptive commit messages:

```bash
git commit -m "Add: Brief description of what was added"
# or
git commit -m "Fix: Brief description of what was fixed"
```

7. **Push Changes**: Push your branch to your fork:

```bash
git push origin feature/your-feature-name
```

8. **Open Pull Request**: Open a pull request against the `main` branch of the original repository.

### Pull Request Guidelines

- Provide a clear title and description of your changes
- Reference any related issues using GitHub's issue linking (e.g., "Fixes #123")
- Include screenshots or examples if applicable
- Ensure all CI checks pass
- Be responsive to feedback and requested changes

## Coding Standards

This project follows the [PSR-12](https://www.php-fig.org/psr/psr-12/) coding standard and the [PSR-4](https://www.php-fig.org/psr/psr-4/) autoloading standard.

### Key Points

- Use 4 spaces for indentation (no tabs)
- Use `declare(strict_types=1);` at the top of all PHP files
- Use type declarations for parameters, return types, and properties
- Follow PSR-12 naming conventions:
  - Classes: `PascalCase`
  - Methods and functions: `camelCase`
  - Constants: `UPPER_SNAKE_CASE`
  - Variables: `camelCase`

### Example

```php
<?php

declare(strict_types=1);

namespace Automatape2\VaiaPhpClient;

class ExampleClass
{
    private const DEFAULT_VALUE = 'default';

    private string $property;

    public function __construct(string $property = self::DEFAULT_VALUE)
    {
        $this->property = $property;
    }

    public function getProperty(): string
    {
        return $this->property;
    }

    public function setProperty(string $property): void
    {
        $this->property = $property;
    }
}
```

## Testing

We use [PHPUnit](https://phpunit.de/) for testing. All new features and bug fixes should include appropriate tests.

### Running Tests

```bash
# Run all tests
composer test

# Run tests with coverage report
composer test-coverage

# Run a specific test file
./vendor/bin/phpunit tests/Unit/ExampleTest.php

# Run a specific test method
./vendor/bin/phpunit --filter testMethodName
```

### Test Structure

- Place unit tests in `tests/Unit/`
- Place feature/integration tests in `tests/Feature/`
- Name test files with the `Test` suffix (e.g., `ExampleTest.php`)
- Name test methods starting with `test_` or using the `@test` annotation

### Example Test

```php
<?php

declare(strict_types=1);

namespace Automatape2\VaiaPhpClient\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Automatape2\VaiaPhpClient\VaiaClient;

class VaiaClientTest extends TestCase
{
    public function test_it_can_be_instantiated(): void
    {
        $client = new VaiaClient([
            'api_key' => 'test-key',
        ]);

        $this->assertInstanceOf(VaiaClient::class, $client);
    }
}
```

## Documentation

- Update the README.md if your changes affect the public API
- Add PHPDoc comments to all public methods and classes
- Include usage examples for new features

### PHPDoc Example

```php
/**
 * Makes a GET request to the specified endpoint.
 *
 * @param string $endpoint The API endpoint to call
 * @param array<string, mixed> $params Optional query parameters
 * @return array<string, mixed> The API response
 *
 * @throws \Automatape2\VaiaPhpClient\Exceptions\VaiaException
 */
public function get(string $endpoint, array $params = []): array
{
    // Implementation
}
```

## Reporting Bugs

When reporting bugs, please include:

1. **Description**: A clear description of the bug
2. **Steps to Reproduce**: Step-by-step instructions to reproduce the issue
3. **Expected Behavior**: What you expected to happen
4. **Actual Behavior**: What actually happened
5. **Environment**: PHP version, package version, operating system
6. **Code Sample**: A minimal code sample that demonstrates the issue (if applicable)
7. **Error Messages**: Any error messages or stack traces

### Bug Report Template

```markdown
## Description
A clear description of the bug.

## Steps to Reproduce
1. Step one
2. Step two
3. Step three

## Expected Behavior
What you expected to happen.

## Actual Behavior
What actually happened.

## Environment
- PHP Version: 8.1
- Package Version: 1.0.0
- Operating System: Ubuntu 22.04

## Code Sample
```php
// Minimal code to reproduce
```

## Error Messages
```
Error message or stack trace
```
```

## Suggesting Features

We welcome feature suggestions! When suggesting a feature:

1. **Check Existing Issues**: Search existing issues to avoid duplicates
2. **Clear Description**: Provide a clear description of the feature
3. **Use Case**: Explain the use case and why this feature would be valuable
4. **Examples**: Include examples of how the feature would be used

### Feature Request Template

```markdown
## Feature Description
A clear description of the feature you'd like to see.

## Use Case
Explain why this feature would be useful.

## Proposed Solution
If you have ideas on how to implement this, describe them here.

## Examples
```php
// Example of how the feature would be used
```

## Additional Context
Any other context or screenshots about the feature request.
```

## Questions?

If you have questions about contributing, feel free to open an issue or reach out to the maintainers.

Thank you for contributing to VAIA PHP Client! 🎉
