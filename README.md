# Symfony Prueba Técnica - Javier Atiencia

## Requisitos previos
- Docker y Docker Compose instalados
- Composer instalado

## Pasos para poner en marcha la aplicación

### 1. Clonar el repositorio

```bash
git clone https://github.com/vastian1501/symfony-prueba.git
cd symfony-prueba
```

### 2. Levantar los contenedores Docker

Inicia MYSQL incluyendo phpMyAdmin:

```bash
docker compose -f compose.phpmyadmin.yaml up -d
```

### 3. Instalar dependencias

Instalar dependencias de PHP:

```bash
composer install
```

Instalar dependencias de JavaScript:

```bash
php bin/console importmap:install
```

### 4. Ejecutar las migraciones

```bash
php bin/console doctrine:migrations:migrate
```

### 5. Cargar datos de prueba

Para crear el usuario de prueba:

```bash
php bin/console doctrine:fixtures:load
```

### 6. Cargar datos desde JSON

Para importar los datos desde el archivo JSON:

```bash
php bin/console app:import-products
```

### 7. Poner en marcha la aplicación

Con Symfony CLI:

```bash
symfony server:start
```

O con el servidor PHP integrado:

```bash
php -S localhost:8000 -t public
```

### 8. Acceder a la aplicación

- **phpMyAdmin**: http://localhost:8080
- **Aplicación**: http://localhost:8000
- **Usuario**: test@test.com
- **Contraseña**: password

## Comandos útiles

### Detener los contenedores

```bash
docker compose down
```

### Ver logs

```bash
docker compose logs -f
```

### Ver las rutas en Symfony

```bash
php bin/console debug:router
```

## Futuros cambios
- Añadir un sistema de filtros por marca y rango de precios
- Implementar un buscador de productos
- Añadir la posibilidad de crear más productos desde la interfaz, ya que los datos provienen de la base de datos