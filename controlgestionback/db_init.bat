********************SERVIVIOS******************
[GET]   -       http://localhost:8000/api/tokenGenerate
[POST]  -       http://localhost:8000/api/EstratosUnidad
[POST]  -       http://localhost:8000/api/AcreditacionAll
[POST]  -       http://localhost:8000/api/cucopsAll
[POST]  -       http://localhost:8000/api/entidadesAll
[POST]  -       http://localhost:8000/api/vialidadesAll
[POST]  -       http://localhost:8000/api/municipiosAll
[POST]  -       http://localhost:8000/api/localidadesByFilter


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


#ENTRAR A BASE DE DATOS 
psql -U postgres -h 127.0.0.1 -p 15432


*************FALTANTES**************

php artisan migrate


