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
you can use storage driver function by laravel <br>
example :
```php
 Storage::disk('google')->put($filename, File::get($filepath));
```

## Limitations
Using display paths as identifiers for folders and files requires them to be unique. Unfortunately Google Drive allows users to create files and folders with same (displayed) names. In such cases when unique path cannot be determined this adapter chooses the oldest (first) instance. In case the newer duplicate is a folder and user puts a unique file or folder inside the adapter will be able to reach it properly (because full path is unique).

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
