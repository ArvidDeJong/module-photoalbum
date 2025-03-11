# Module Photoalbum

A Laravel package for managing photo albums in the Manta CMS.

## Features

- Livewire components for managing photo albums
  - List view
  - Create form
  - Update form
  - Detail view
  - Photo upload functionality
- Fully integrated with Manta CMS
- Built with Livewire and Flux components
- Configurable through module settings

## Requirements

- PHP ^8.3
- Laravel ^11.0
- Livewire ^3.0
- Livewire Flux ^2.0
- Darvis Manta ^1.0

## Installation

You can install the package via composer:

```bash
composer require darvis/module-photoalbum
```

The package will automatically register its service provider.

### Publishing Assets

You can publish the config file, views, and migrations:

```bash
# Publish everything
php artisan vendor:publish --provider="Darvis\ModulePhotoalbum\PhotoalbumServiceProvider"

# Or publish individual components
php artisan vendor:publish --provider="Darvis\ModulePhotoalbum\PhotoalbumServiceProvider" --tag="module-photoalbum-config"
php artisan vendor:publish --provider="Darvis\ModulePhotoalbum\PhotoalbumServiceProvider" --tag="module-photoalbum-views"
php artisan vendor:publish --provider="Darvis\ModulePhotoalbum\PhotoalbumServiceProvider" --tag="module-photoalbum-migrations"
```

After publishing the migrations, run them:

```bash
php artisan migrate
```

## Usage

The package provides several Livewire components that you can use in your views:

```php
// List all photo albums
<livewire:photoalbum-list />

// Create a new photo album
<livewire:photoalbum-create />

// View a specific photo album
<livewire:photoalbum-read :photoalbum="$photoalbum" />

// Edit a photo album
<livewire:photoalbum-update :photoalbum="$photoalbum" />

// Upload photos to an album
<livewire:photoalbum-upload :photoalbum="$photoalbum" />
```

## Configuration

After publishing the configuration file, you can find it at `config/module_Photoalbum.php`. Here you can customize various aspects of the module.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.