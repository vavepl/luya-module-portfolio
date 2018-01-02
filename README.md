# Portfolio Module

A very easy to use Portfolio Module to show latest work or a collection of data.
 
## Installation

Add the Package to your composer file:

```
composer require vavepl/luya-module-portfolio
```

Add the portfolio module to the modules section your config:

```php
return [
    'modules' => [
        // ...
        'portfolio' => [
            'class' => 'vavepl\portfolio\frontend\Module',
            'useAppViewPath' => false, // When disabled the predefined views are used, otherwise you have to create your own views.
        ],
        'portfolioadmin' => 'vavepl\portfolio\admin\Module',
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

Portfolio Groups
![Portfolio Groups](http://luya.vave.pl/images/1.png "Portfolio Groups")

Portfolio Items
![Portfolio Items](http://luya.vave.pl/images/2.png "Portfolio Items")

Portfolio Block
![Portfolio Block](http://luya.vave.pl/images/3.png "Portfolio Block")

Portfolio View
![Portfolio View](http://luya.vave.pl/images/4.png "Portfolio View")

Portfolio View on click
![Portfolio View on click](http://luya.vave.pl/images/5.png "Portfolio View on click")
