# Project Name

## How to run the project

Clone the project
```sh
git clone git@github.com:paulokalleby/laravel-api-start.git
```
```sh
cd laravel-api-start/
```


Create the .env file
```sh
cp .env.example .env
```


Update these environment variables in the .env file
```dosini
APP_NAME="Project Name"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=database
DB_USERNAME=user
DB_PASSWORD=password

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379

```
Upload project containers
```sh
docker-compose up -d
```

Access the container
```sh
docker-compose exec app bash
```

Install project dependencies
```sh
composer install
```

Generate the Laravel project key
```sh
php artisan key:generate
```

Access the project
[http://localhost:8000](http://localhost:8000)
