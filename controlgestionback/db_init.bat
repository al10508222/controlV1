********************SERVIVIOS******************
[GET]   -       http://localhost:8000/api/tokenGenerate
[POST]  -       http://localhost:8000/api/cucopsAll
[POST]  -       http://localhost:8000/api/vialidadesAll
[POST]  -       http://localhost:8000/api/entidadesAll
[POST]  -       http://localhost:8000/api/municipiosAll
[POST]  -       http://localhost:8000/api/localidadesByFilter
[POST]  -       http://localhost:8000/api/AcreditacionAll
[POST]  -       http://localhost:8000/api/EstratosUnidad
[POST]  -       http://localhost:8000/api/TiposAsentamientos

*************ULTIMOS CAMBIOS***********
* se agrega id en creacion de cucop
* pantalla ver cucop sin modificar -------> catalogo cucop completo
* se agrega id en creacion de vialidad
* pantalla ver vialidad sin modificar ---------> catalogo de vialidades completo


#pasos

docker exec -ti --user root bd_control-app /bin/bash

php artisan migrate
php artisan migrate:fresh --seed
php artisan passport:install --force


#pasos para corregir limite de memoria ************************************************************************************
docker exec -ti --user root bd_control-app /bin/bash
echo 'memory_limit=2G' > /usr/local/etc/php/conf.d/memory-limit.ini

#ENTRAR A BASE DE DATOS 
psql -U postgres -h 127.0.0.1 -p 15432


*************FALTANTES**************
