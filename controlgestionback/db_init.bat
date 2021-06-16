echo 'running database initialization script'

echo 'putting laravel into maintenance mode'
php artisan down

echo ' ******** migrating all core tables and seeding all tables with initial data values ******** '
php artisan migrate:fresh --seed

echo ' ******** creating passport clients and keys ... please wait ***** '
php artisan passport:install

echo ' ******** taking laravel out of maintenance mode ******** '
php artisan up

echo ' ******** dumping any previous autoload configs *********** '
composer dumpautoload


#pasos

docker exec -ti --user root bd_control-app /bin/bash
php artisan migrate
php artisan migrate:fresh --seed
php artisan passport:install --force


#pasos para corregir limite de memoria ************************************************************************************

docker exec -ti --user root bd_control-app /bin/bash
apt-get update
apt-get install nano
apt-get install mlocate
updatedb
locate php.ini

#(buscar linea que dice limit_memory = 128M y cambiar a 512M)
nano /usr/local/etc/php/php.ini-production 
#(buscar linea que dice limit_memory = 128M y cambiar a 512M)
nano /usr/local/etc/php/php.ini-production 

echo 'memory_limit=2G' > /usr/local/etc/php/conf.d/memory-limit.ini

php artisan migrate
php artisan migrate:fresh --seed
php artisan passport:install --force