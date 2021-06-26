******************** SERVIVIOS ******************
[GET]   -       http://localhost:8000/api/tokenGenerate       ----------> utiliza parametros
[POST]  -       http://localhost:8000/api/cucopsAll
[POST]  -       http://localhost:8000/api/vialidadesAll
[POST]  -       http://localhost:8000/api/entidadesAll
[POST]  -       http://localhost:8000/api/municipiosAll
[POST]  -       http://localhost:8000/api/localidadesByFilter  ---------> utiliza parametros
[POST]  -       http://localhost:8000/api/AcreditacionAll
[POST]  -       http://localhost:8000/api/EstratosUnidad
[POST]  -       http://localhost:8000/api/TiposAsentamientos

************* CATALOGOS COMPLETOS ***********
----> catalogo estatus_acreditacion completo
----> catalogo estratos_unidad completo
----> catalogo tipo_asentamientos completo
----> catalogo cucop completo
----> catalogo de vialidades completo
----> catalogo de entidades completo
----> catalogo de municipios completo

************* ULTIMOS CAMBIOS ***********
* se agrega id en creacion de entidad
* pantalla ver entidad sin modificar
* se agrega id en creacion de municipios
* pantalla ver municipios sin modificar
* se arreglan combos y se empatan con sus relaciones en localdades

#pasos

docker exec -ti --user root bd_control-app /bin/bash

echo 'memory_limit=2G' > /usr/local/etc/php/conf.d/memory-limit.ini
php artisan migrate
php artisan migrate:fresh --seed
php artisan passport:install --force


#ENTRAR A BASE DE DATOS 
psql -U postgres -h 127.0.0.1 -p 15432


************* FALTANTES **************
