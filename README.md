# Livewire Interactions

[![Latest Stable Version](http://poser.pugx.org/tonystore/livewire-interactions/v)](https://packagist.org/packages/tonystore/livewire-interactions)  [![Total Downloads](http://poser.pugx.org/tonystore/livewire-interactions/downloads)](https://packagist.org/packages/tonystore/livewire-interactions)  [![License](http://poser.pugx.org/tonystore/livewire-interactions/license)](https://packagist.org/packages/tonystore/livewire-interactions)  [![PHP Version Require](http://poser.pugx.org/tonystore/livewire-interactions/require/php)](https://packagist.org/packages/tonystore/livewire-permission)

Package to generate interactions in a Laravel application with Livewire.
## REQUIREMENTS
-   [PHP >= 7.4](http://php.net)
-   [Laravel 7 | 8 | 9](https://laravel.com)
-   [Livewire](https://laravel-livewire.com)
-   [Laravel Follow](https://github.com/overtrue/laravel-follow)
-   [Bootstrap 4.5 | 4.6 | 5](https://getbootstrap.com) or [Tailwind](https://tailwindcss.com) 

## INSTALLATION VIA COMPOSER

### Step 1: Composer

Run this command line in console.
``` bash
composer require tonystore/livewire-interactions
```
### Step 2: Publish Assets
#### Publish Config File
``` bash
php artisan vendor:publish --provider="Tonystore\LivewireInteraction\LivewireInteractionProvider" --tag=config-interaction
``` 
#### Publish Lang
Publish the translations in case you wish to modify any of them.
``` bash
php artisan vendor:publish --provider="Tonystore\LivewireInteraction\LivewireInteractionProvider" --tag=langs-interaction
``` 
## Usage
By default, Bootstrap is the default theme to use for the follow component.But you can switch to Tailwind.

```php
<?php
return [
	/*
	 * Supported Theme: 'bootstrap', 'tailwind'.
	 */
	'theme'  =>  'bootstrap',
];
```
You can customize the default styles applied to the follow component by following the instructions below.

```php
<?php
return [
    'bootstrap' => [ // Bootstrap styles
        'btn' => [
            'follow_class' => 'btn btn-info btn-sm',
            'unfollow_class' => 'btn btn-danger btn-sm'
            ],
        'icon' => [
            'follow_icon' => 'fas fa-user-plus',
            'unfollow_icon' => 'fas fa-user-xmark'
            ]
        ],
    ];
```
To use the follow and unfollow component, you can add it anywhere in your code as follows:

```html
 <body> 

    //INSERT COMPONENT
    <livewire:follow :user="$user" />

    //OR BLADE DIRECTIVE
    @livewire('follow', ['user' => $jugador])
  
    //The user parameter is mandatory.
 </body>
```

You can also customize the styles to be used directly in a component, passing as parameters the new settings to be used.

```html
<div>
     <livewire:follow 
     :user="$user"                          //User to follow
     :follow_class="btn btn-block btn-lg"   //Classes for follow button.
     :unfollow_class="btn btn-block btn-lg" //Classes for unfollowing button
     :follow_icon="btn btn-block btn-lg"    //Classes for icon to follow.
     :unfollow_icon="btn btn-block btn-lg"  //Classes to icon unfollowing
     :only_icon="btn btn-block btn-lg"      //Show only the icon, without a description
     />
</div>
```

