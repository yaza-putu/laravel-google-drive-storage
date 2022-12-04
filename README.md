# laravel-google-drive-storage
![gdrive](https://is4-ssl.mzstatic.com/image/thumb/Purple122/v4/d9/cb/a8/d9cba8b1-85a0-723a-3f03-bdc6b76476d5/logo_drive_2020q4_color-0-1x_U007emarketing-0-0-0-6-0-0-0-85-220.png/1200x630wa.png)
This package allow to store and get data from google drive like S3 AWS in laravel

## Support
- php 8.1
- now only support laravel 9

## Installation

You can install the package via composer:

```bash
composer require yaza/laravel-google-drive-storage
```

copy to .env
```env
FILESYSTEM_CLOUD=google
GOOGLE_DRIVE_CLIENT_ID=xxx.apps.googleusercontent.com
GOOGLE_DRIVE_CLIENT_SECRET=xxx
GOOGLE_DRIVE_REFRESH_TOKEN=xxx
GOOGLE_DRIVE_FOLDER=
```
example
```env
FILESYSTEM_CLOUD=google
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
refrensi code opration [sample code](https://github.com/ivanvermeyen/laravel-google-drive-demo/blob/master/routes/web.php)

<br>
or use helper from this package
<br>

- Put File

```php
use Yaza\LaravelGoogleDriveStorage\Gdrive;

Gdrive::put('location/filename.png', $request->file('file'));
// or
Gdrive::put('filename.png', public_path('path/filename.png'));
``` 

- Get File

```php 
use Yaza\LaravelGoogleDriveStorage\Gdrive;

$data = Gdrive::get('path/filename.png');

return response($data->file, 200)
    ->header('Content-Type', $data->ext);
```

- Get Large File with stream

```php
use Yaza\LaravelGoogleDriveStorage\Gdrive;

  $readStream = Gdrive::readStream('path/filename.png');

return response()->stream(function () use ($readStream) {
    fpassthru($readStream->file);
}, 200, [
    'Content-Type' => $readStream->ext,
    //'Content-disposition' => 'attachment; filename="'.$filename.'"', // force download?
]);
```

- download file
```php 
use Yaza\LaravelGoogleDriveStorage\Gdrive;

 $data = Gdrive::get('path/filename.png');
        return response($data->file, 200)
            ->header('Content-Type', $data->ext)
            ->header('Content-disposition', 'attachment; filename="'.$data->filename.'"');
```

- delete
```php 
use Yaza\LaravelGoogleDriveStorage\Gdrive;

 Gdrive::delete('path/filename.png');
```

- delete directory
```php 
use Yaza\LaravelGoogleDriveStorage\Gdrive;

  Gdrive::deleteDir('foldername');
```

- make directory
```php 
use Yaza\LaravelGoogleDriveStorage\Gdrive;

  Gdrive::makeDir('foldername');
```

- rename directory
```php 
use Yaza\LaravelGoogleDriveStorage\Gdrive;

  Gdrive::renameDir('oldfolderpath', 'newfolder');
```

- all folder & file
```php
use Yaza\LaravelGoogleDriveStorage\Gdrive;

Gdrive::all('/');
// or
Gdrive::all('foldername');
```
output
```php
Illuminate\Support\Collection {#804 ▼ // app/Http/Controllers/UploadController.php:70
  #items: array:3 [▼
    0 => League\Flysystem\DirectoryAttributes {#798 ▶}
    1 => League\Flysystem\FileAttributes {#796 ▶}
    2 => League\Flysystem\DirectoryAttributes {#783 ▶}
  ]
  #escapeWhenCastingToString: false
}
```


- all folder & file with sub folder
```php
use Yaza\LaravelGoogleDriveStorage\Gdrive;

Gdrive::all('/', true);
// or
Gdrive::all('foldername', true);
```
output
```php
Illuminate\Support\Collection {#804 ▼ // app/Http/Controllers/UploadController.php:70
  #items: array:3 [▼
    0 => League\Flysystem\DirectoryAttributes {#798 ▶}
    1 => League\Flysystem\FileAttributes {#796 ▶}
    2 => League\Flysystem\DirectoryAttributes {#783 ▶}
  ]
  #escapeWhenCastingToString: false
}
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
