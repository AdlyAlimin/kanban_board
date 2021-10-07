After clone please run this command

``` bash
composer install

cp .env.example .env

php artisan key:generate

php artisan migrate --seed

npm install

npm run dev
```

Thank you.

Reference :

https://mmccaff.github.io/2018/11/03/laravel-permissions-in-vue-components/
https://dev.to/messerli90/build-your-own-kanban-board-with-laravel-vuejs-2i5l
https://spatie.be/docs/laravel-permission/v5/basic-usage/blade-directives
https://github.com/izniburak/laravel-auto-routes