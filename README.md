# Portfolio Module

 
## Installation

```php
composer require johnnymcweed/luya-module-event:dev-master 
```
```php
return [
    'modules' => [
        // ...
        'portfolio' => 'vave\portfolio\frontend\Module',
        'portfolioadmin' => 'vave\portfolio\admin\Module',
        // ...
    ],
];
```

### Initialization 


After successfully installation and configuration run the migrate, import and setup command to initialize the module in your project.

1.) Migrate your database.

```sh
./vendor/bin/luya migrate

```

2.) Import the module and migrations into your LUYA project.

```sh
./vendor/bin/luya import
```
