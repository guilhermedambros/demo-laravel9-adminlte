## Resumo

Projeto Laravel 8, integrado com AdminLTE e Bootstrap.

## Links

Links utilizados para implementações/integrações

- [Audits](http://www.laravel-auditing.com/).
- [RecaptchaV3](https://github.com/josiasmontag/laravel-recaptchav3).
- [Roles & Permissions](https://www.itsolutionstuff.com/post/laravel-8-user-roles-and-permissions-tutorialexample.html).
- [Laravel Docs](https://laravel.com/docs/8.x/).



## Instalação
Clone o projeto. Substitua o conteúdo de env.example em .env e configure os parametros de BANCO, EMAIL e RECAPTCHAV3. Execute os comandos abaixo:

ˋˋˋ
php artisan key:generate
ˋˋˋ

ˋˋˋ
composer install
ˋˋˋ

ˋˋˋ
npm install
ˋˋˋ

ˋˋˋ
npm run dev
ˋˋˋ

ˋˋˋ
php artisan migrate
ˋˋˋ

ˋˋˋ
php artisan db:seed --class=PermissionTableSeeder
ˋˋˋ

ˋˋˋ
php artisan db:seed --class=CreateAdminUserSeeder
ˋˋˋ

ˋˋˋ
php artisan serve
ˋˋˋ

Acesse [localhost:8000](http://localhost:8000).

Entre com usuário *root@root.com* e senha *123123*.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
