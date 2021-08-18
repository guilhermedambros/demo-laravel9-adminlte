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



`composer install`

`npm install`

`php artisan key:generate`

`npm run dev`

`php artisan migrate`

`php artisan db:seed --class=PermissionTableSeeder`

`php artisan db:seed --class=CreateAdminUserSeeder`

`php artisan serve`

Acesse [localhost:8000](http://localhost:8000).

Entre com usuário *root@root.com* e senha *123123*.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
