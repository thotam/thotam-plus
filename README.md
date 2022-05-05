# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/thotam/thotam-plus.svg?style=flat-square)](https://packagist.org/packages/thotam/thotam-plus)
[![Build Status](https://img.shields.io/travis/thotam/thotam-plus/master.svg?style=flat-square)](https://travis-ci.org/thotam/thotam-plus)
[![Quality Score](https://img.shields.io/scrutinizer/g/thotam/thotam-plus.svg?style=flat-square)](https://scrutinizer-ci.com/g/thotam/thotam-plus)
[![Total Downloads](https://img.shields.io/packagist/dt/thotam/thotam-plus.svg?style=flat-square)](https://packagist.org/packages/thotam/thotam-plus)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require thotam/thotam-plus
```

## Usage

```php
Add "Thotam\ThotamPlus\Traits\ThoTamPlusTrait" to Models you want to use
```

```php
For ChiNhanh add:
$table->bigInteger('chinhanh_id')->unsigned()->nullable()->default(null);
$table->foreign('chinhanh_id')->references('id')->on('chinhanhs')->onDelete('SET NULL')->onUpdate('cascade');
to table
```

```php
For KenhKinhDoanh add:
$table->bigInteger('kenh_kinh_doanh_id')->unsigned()->nullable()->default(null);
$table->foreign('kenh_kinh_doanh_id')->references('id')->on('kenh_kinh_doanhs')->onDelete('SET NULL')->onUpdate('cascade');
to table
```

```php
For NhomSanPham add:
$table->bigInteger('nhom_san_pham_id')->unsigned()->nullable()->default(null);
$table->foreign('nhom_san_pham_id')->references('id')->on('nhom_san_phams')->onDelete('SET NULL')->onUpdate('cascade');
to table
```

```php
Add "Thotam\ThotamPlus\Traits\TinhHuyenXaTrait" to Models you want to TinhHuyenXa
```

```php
For Tinh add:
$table->bigInteger('tinh_id')->unsigned()->nullable()->default(null);
$table->foreign('tinh_id')->references('id')->on('list_tinhs')->onDelete('SET NULL')->onUpdate('cascade');
to table
```

```php
For Huyen add:
$table->bigInteger('huyen_id')->unsigned()->nullable()->default(null);
$table->foreign('huyen_id')->references('id')->on('list_huyens')->onDelete('SET NULL')->onUpdate('cascade');
to table
```

```php
For Xa add:
$table->bigInteger('xa_id')->unsigned()->nullable()->default(null);
$table->foreign('xa_id')->references('id')->on('list_xas')->onDelete('SET NULL')->onUpdate('cascade');
to table
```

```php
Add "Thotam\ThotamPlus\Traits\ChiNhanhTrait" to "Thotam\ThotamHr\Models\HR" Model
```

#### Next, you must migrate your database:

```php
php artisan migrate
```

#### Next, you should run seed:

```php
php artisan db:seed
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email thanhtamtqno1@gmail.com instead of using the issue tracker.

## Credits

-   [thotam](https://github.com/thotam)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
