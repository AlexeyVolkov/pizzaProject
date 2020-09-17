## pizzaProject

Technologies:
- Laravel
- [Livewire](https://laravel-livewire.com)
- [Bootstrap](https://getbootstrap.com/)
- SQLite


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
php artisan migrate
php artisan storage:link

npm run dev
```

### Website workflow

1. Add Pizzas
1. Click the basket icon
1. Click Proceed to payment
1. Fill in the form
1. Click Finish checkout