# laravel-google-drive-storage

This package allow to store and get data from google drive like S3 AWS in laravel

## Installation

You can install the package via composer:

```bash
composer require yaza/laravel-google-drive-storage
```

copy to .env
```env
GOOGLE_DRIVE_CLIENT_ID=xxx.apps.googleusercontent.com
GOOGLE_DRIVE_CLIENT_SECRET=xxx
GOOGLE_DRIVE_REFRESH_TOKEN=xxx
GOOGLE_DRIVE_FOLDER=
```
example
```env
GOOGLE_DRIVE_CLIENT_ID=xxx.apps.googleusercontent.com
GOOGLE_DRIVE_CLIENT_SECRET=xxx
GOOGLE_DRIVE_REFRESH_TOKEN=xxx
GOOGLE_DRIVE_FOLDER=backups
```

## Setup Google Keys
   - [Getting your Client ID and Secret](https://github.com/ivanvermeyen/laravel-google-drive-demo/blob/master/README/1-getting-your-dlient-id-and-secret.md)
   - [Getting your Refresh Token](https://github.com/ivanvermeyen/laravel-google-drive-demo/blob/master/README/2-getting-your-refresh-token.md)
## Usage

```php
 Storage::disk('google')
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [yaza](https://github.com/yaza-putu)
- [All Contributors](../../contributors)

Thanks to [Masbug](https://github.com/masbug/flysystem-google-drive-ext)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
