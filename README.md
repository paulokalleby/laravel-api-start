# Laravel API Start

## How to run the project

Clone the project
```sh
git clone git@github.com:paulokalleby/laravel-api-start.git
```
```sh
cd laravel-api-start
```

Upload project containers

```sh
./vendor/bin/sail up -d
```

Install project dependencies
```sh
./vendor/bin/sail composer i
```

Generate the Laravel project key
```sh
./vendor/bin/sail artisan key:generate
```

Run migration and popular user table with seeder
```sh
./vendor/bin/sail artisan migrate --seed
```

Generate documentation with swagger

```sh
./vendor/bin/sail l5-swagger:generate
```

Access project documentation
[http://localhost](http://localhost)
