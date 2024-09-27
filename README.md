# Compare Operation for Backpack for Laravel

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-packagist]

This package adds a Compare Operation for projects using the [Backpack for Laravel](https://backpackforlaravel.com/) administration panel.

## Screenshot

![Screen Recording 2024-09-27 at 18 17 19](https://github.com/user-attachments/assets/316e2ae0-fdaa-4a6a-a8d0-b9aa5e4be17b)


## Installation

Via Composer

``` bash
composer require maurohmartinez/compare-operation-backpack-laravel
```

## Usage

To use the Operation this package provides, inside your custom CrudController add the trait:

```php
use \MHMartinez\CompareOperation\CompareOperation;
```

And then customize the columns to show just like you wouyld do with the Show Operation:

```php
protected function setupCompareOperation(): void
    {
        $this->crud->column('id');
        $this->crud->column('name');
        $this->crud->column('email');
        // etc...
    }
```

## Change log

Changes are documented here on Github. Please see the [Releases tab](https://github.com/maurohmartinez/backpack-compare-operation/releases).

## Testing

``` bash
composer test
```

## Contributing

Contributions are welcome and will be fully credited:
- code contributions are accepted via Pull Requests to [this Github repo](https://github.com/maurohmartinez/backpack-compare-operation);
- documentation contributions are accepted via Pull Requests to [this Github repo](https://github.com/maurohmartinez/backpack-compare-operation);
- other contributions are most likely welcome in the way you see fit;

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits
- [Mauro Martinez](https://inspiredpulse.com/) Developer
- [Cristian Tabacitu](https://tabacitu.ro/) For creating [Backpack for Laravel](https://backpackforlaravel.com/)!

## License

This project is free for use, so you can install it on top of any Backpack & Laravel project.

However, please note that you do need Backpack installed, so you need to also abide by its [YUMMY License](https://github.com/Laravel-Backpack/CRUD/blob/master/LICENSE.md). That means in production you'll need a Backpack license code. You can get a free one for non-commercial use (or a paid one for commercial use) on [backpackforlaravel.com](https://backpackforlaravel.com).


[ico-version]: https://img.shields.io/packagist/v/maurohmartinez/compare-operation-backpack-laravel.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/maurohmartinez/compare-operation-backpack-laravel.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/maurohmartinez/compare-operation-backpack-laravel

