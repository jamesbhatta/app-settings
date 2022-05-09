# APP  SETTINGS (Laravel)
Store application settings in database on the fly.

> With the help of this package you can persist the settings to database and cache it for performance gain with zero queries.

  

## Installation

 1. You can install the package via composer:

	```bash
	composer require jamesbhatta/app-settings
	```
	

 2. Optional: The service provider will automatically get registered. Or you may manually add the service provider in your `config/app.php` file:
	```
	'providers' => [ 
		 // ...
		 JamesBhatta\AppSettings\AppSettingServiceProvider::class,
	],
	"aliases" => [
		// ...
		'AppSetting' => JamesBhatta\AppSettings\Facades\AppSetting::class
	]
	```
	

 3. To create the `jb_app_settings` table, you must publish the migration and run it with:
	 ```bash
	 php artisan vendor:publish --provider="JamesBhatta\AppSettings\AppSettingServiceProvider" --tag="migrations"
	 
	 php artisan migrate
	
	 ```


## Using It
```php
// save new setting
appSettings()->set('key', 'value');

// get setting
appSettings()->get('key');

// get all settings
appSettings()->allSettings();

// get fresh settings directly from database
appSettings()->allSettings($fresh = true);

// save multiple values at once
appSettings()->set([
	'key_one' => 'value_one',
	'key_two' => 'value_two',
	'key_three' => 'value_three'
]);

// check if setting exists
appSettings()->has('key'); // returns true/false

// remove a setting
appsettings()->remove('key');  // returns true on success

// get setting or default value if not exist
appSettings()->get('key', 'default value');

// ofcourse you can use facade
use JamesBhatta\AppSettings\Facades\AppSetting;
AppSettings::set('key', 'value');

```

## Testing
```bash
$ composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information about what has changed recently.

## Security

If you discover any security related issues, please email [jmsbhatta@gmail.com](mailto:jmsbhatta@gmail.com) instead of using the issue tracker.

## Credits

- [James Bhatta](https://github.com/jamesbhatta)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
