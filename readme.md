# Shoulderscms/Blog
Currently a very early version of a Blog module for Shoulderscms

## Getting Started
This is not production ready...so use at your own risk. This is a very early release.

* Follow the instructions on Shoulderscms/Shoulderscms first.
* Add the following to the require block in your composer.json file
```php
"shoulderscms/blog": "dev-master"
```
* Do composer update in terminal
* Add the following to your `app/app.php` under service providers:
```php
'providers' => [
    'Shoulderscms\Blog\BlogServiceProvider',
    'Fbf\LaravelCategories\LaravelCategoriesServiceProvider'
]
```
* Run package migrations by running the following in terminal:
	`php artisan migrate --package=shoulderscms/blog`