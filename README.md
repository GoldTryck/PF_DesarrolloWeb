<h1 align="middle">IMPORTANTE</h1>

----

<p>En la ultima actualización se realizaron cambios en las migraciones y se agregarón seeders para las tablas: Categories, Roles y Users. Para trabajar con los cambios de la ultima versión reestablecer las migraciones y correr los seeders:</p>

PHP:
~~~
php artisan migrate:reset
php artisan migrate
php artisan db:seed
~~~

Docker Laravel Sail:
~~~
./vendor/bin/sail artisan migrate:reset
./vendor/bin/sail artisan migrate
./vendor/bin/sail artisan db:seed
~~~

Generar alias para Sail:
~~~
alias sail="bash ./vendor/bin/sail"
~~~

---
<p align="right">Actualizado el: 9.11.2023 

---