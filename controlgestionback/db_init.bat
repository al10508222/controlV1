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
[POST]  -       http://localhost:8000/api/TiposEstablecimientos
[POST]  -       http://localhost:8000/api/StatusOperaciones
[POST]  -       http://localhost:8000/api/NivelesAtencion
[POST]  -       http://localhost:8000/api/Tipologias
[POST]  -       http://localhost:8000/api/SubTipologias


************* CATALOGOS COMPLETOS ***********
----> catalogo estatus_acreditacion completo
----> catalogo estratos_unidad completo
----> catalogo tipo_asentamientos completo
----> catalogo cucop completo
----> catalogo de vialidades completo
----> catalogo de entidades completo
----> catalogo de municipios completo
----> catalogo de tipo_asentamientos completo
----> catalogo de establecimientos completo
----> catalogo de nivel_atencion completo


#pasos y entrar a docker

docker exec -ti --user root bd_control-app /bin/bash

echo 'memory_limit=2G' > /usr/local/etc/php/conf.d/memory-limit.ini
php artisan migrate
php artisan migrate:fresh --seed
php artisan passport:install --force


************* ENTRAR A BASE DE DATOS ************
psql -U postgres -h 127.0.0.1 -p 15432

\c control_db
delete from migrations where id = 154;

************* OTROS COMANDOS **************
---> pasar a docker y ejecutar:

php artisan migrate
php artisan db:seed --class=EstablecimientoTableSeeder


