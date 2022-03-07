# Password Generator

<a href="https://packagist.org/packages/davidvandertuijn/password"><img src="https://poser.pugx.org/davidvandertuijn/password/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/davidvandertuijn/password"><img src="https://poser.pugx.org/davidvandertuijn/password/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/davidvandertuijn/password"><img src="https://poser.pugx.org/davidvandertuijn/password/license.svg" alt="License"></a>

## Install

```
composer require davidvandertuijn/password
```

## Usage

```php
use Davidvandertuijn\Password;
```

**Basic**

```php
Password::generate();
```

**Advanced**

```php
Password::generate(
    8, // Password length.
    true, // Include lowercase characters.
    true, // Include uppercase characters.
    true, // Include numbers.
    true, // Include symbols.
    true, // Exclude similar characters.
    true // Exclude ambiguous characters.
);
```
