## Requirements
Make sure your server meets the following requirements.

-   Apache 2.2+ or nginx
-   MySQL Server 5.7.8+ , Mariadb 10.3.2+ or PostgreSQL
-   PHP Version 7.1.3+

## Features
It packs in lots of demanding features that allows your shop to scale in no time:

- [x] Responsive Layout
- [x] Pace Loader
- [x] Admin Authentication (With Sentinel)
- [ ] Custom Admin Dashboard (E-commerce, Google Analytics)
- [x] Automatic Validation Errors
- [x] React Component
- [x] Multiple Locale, Currencies
- [x] Image Cropper
- [x] Orders Management System
- [x] Tag Management System
- [x] Coupon Management System
- [x] Products, Related Products, Offers Management System
- [x] Customer Cart, Wishlist, Product Reviews.
- [x] Impersonate User
- [ ] Translate Message
- [ ] Custom configuration (Database download, Google Analytics)
- [x] Open Source
- [x] More to come..

## Installation

Firstly, download the Laravel installer using Composer:
``` bash  
$ composer require mckenziearts/shopper  
```
Run this command to install Shopper in your project
```php
php artisan shopper:install
```
This command will install shopper, publish vendor files, create shopper and storage symlinks if they don't exist in the public folder, run migrations and seeders classes.

Extend your user model using the `Mckenziearts\Shopper\Plugins\Users\Models\User as Authenticatable` alias:

```php
namespace App;

use Mckenziearts\Shopper\Plugins\Users\Models\User as Authenticatable;  
  
class User extends Authenticatable  
{  
  
}

```

Republish Shopper's vendor files
```php
php artisan vendor:publish --provider="Mckenziearts\Shopper\ShopperServiceProvider"
php artisan vendor:publish --all
```

During publishing of shopper vendors files, shopper will add some others package's configurations files to your config folder : `larasap.php`, `scout.php`, `currencyConverter.php`, `laravellocalization.php` and `cartalyst.sentinel.php`

If you want to create an admin user use this command:
```php
php artisan shopper:admin
```

## Usage

Run laravel server
```php
php artisan serve
```

To view Shopper's dashboard go to:
```php
http://localhost:8000/console
```

## Documentation
Official documentation is available [Here](https://docs.laravelshopper.io).
  
## Testing  
  
``` bash  
$ composer test  
```  