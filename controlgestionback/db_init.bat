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

sudo docker exec -it bd_control-app /bin/bash
php artisan migrate
php artisan migrate:fresh --seed
php artisan passport:install --force

//estas ya no, ya que fueron integradas
php artisan db:seed --class=RoleHasPermissionsTableSeeder
php artisan db:seed --class=TipoVialidadSeeder
php artisan db:seed --class=EntidadesFederativasTableSeeder
php artisan db:seed --class=MunicipiosTableSeeder
php artisan db:seed --class=LocalidadesTableSeeder