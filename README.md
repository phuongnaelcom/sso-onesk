# Onesk

[![GitHub Workflow Status](https://github.com/phuongna/onesk/workflows/Run%20tests/badge.svg)](https://github.com/phuongna/onesk/actions)
[![styleci](https://styleci.io/repos/CHANGEME/shield)](https://styleci.io/repos/CHANGEME)

[![Packagist](https://img.shields.io/packagist/v/phuongna/onesk.svg)](https://packagist.org/packages/phuongna/onesk)
[![Packagist](https://poser.pugx.org/phuongna/onesk/d/total.svg)](https://packagist.org/packages/phuongna/onesk)
[![Packagist](https://img.shields.io/packagist/l/phuongna/onesk.svg)](https://packagist.org/packages/phuongna/onesk)

Package description: CHANGE ME

## Installation

Install via composer
```bash
composer require phuongna/onesk
```

### Publish package assets

```bash
php artisan vendor:publish --provider="phuongna\onesk\ServiceProvider"
```

## Usage

CHANGE ME

## Security

If you discover any security related issues, please email
instead of using the issue tracker.

## Credits

- [](https://github.com/phuongna/onesk)
- [All contributors](https://github.com/phuongna/onesk/graphs/contributors)

This package is bootstrapped with the help of
[melihovv/laravel-package-generator](https://github.com/melihovv/laravel-package-generator).
- install
- php artisan vendor:publish
- 'guards' => [
  'admin' => [
  'driver' => 'sso-jwt',
  'provider' => 'users',
  ],
  'customer' => [
  'driver' => 'sso-jwt',
  'provider' => 'customers',
  ],
  ],

- 'providers' => [
'users' => [
'driver' => 'sso',
'model' => \App\Models\User::class,
],
'customers' => [
'driver' => 'sso',
'model' => \App\Models\Customer::class
],
],
