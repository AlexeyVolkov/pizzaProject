## pizzaProject [[LIVE]](https://hireme.link/)

[![Build Status](https://travis-ci.org/AlexeyVolkov/pizzaProject.svg?branch=master)](https://travis-ci.org/AlexeyVolkov/pizzaProject)

Technologies:
- Laravel
- [Livewire](https://laravel-livewire.com)
- [Bootstrap](https://getbootstrap.com/)
- [Forge](https://forge.laravel.com/)
- Travis CI


### Quick setup

```bash
git clone git@github.com:AlexeyVolkov/pizzaProject.git
cd pizzaProject
```

Edit *.env*


```bash
composer install

npm install

npm audit fix

envoy run app:pull

php artisan key:generate
php artisan migrate --seed
php artisan storage:link

npm run dev
```