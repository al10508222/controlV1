# MongoDB

Para poder generar/ver los movimientos generados, necesitamos iniciar una instancia de MongoDB en Docker.
Se generará una carpeta en la raíz del proyecto llamada `.docker` que contendrá los archivos del contenedor, se encuentra dentro del `.gitignore`.
EVITAR agregarla a git.

Puede ser requerido ejecutarse como administrador.

```bash
docker-compose up mongodb
```
