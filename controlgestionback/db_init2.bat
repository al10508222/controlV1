echo 'running database initialization script'

echo 'putting laravel into maintenance mode'
php74 artisan down

echo ' ******** migrating all core tables and seeding all tables with initial data values ******** '
php74 artisan migrate:fresh --seed

echo ' ******** creating passport clients and keys ... please wait ***** '
php74 artisan passport:install

echo ' ******** taking laravel out of maintenance mode ******** '
php74 artisan up

