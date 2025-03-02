# Edu master

## Requirements to install the software

- [Docker](https://docs.docker.com/engine/install/)
- [Composer](https://getcomposer.org/download/)
- [PHP](https://www.php.net/downloads.php)

## Installation

You can install this as any other laravel app, but my recomended way of doing a quick install is this.

```
cd edu-master
composer install
cp .env.example .env #Edit details like sql connection to your preference
./vendor/bin/sail up -d

# Wait until the container is built and runing it might take a few minutes the first time
./vendor/bin/sail artisan key:generate
./vendor/bin/sail npm run build
./vendor/bin/sail artisan migrate --seed
```

Now you can access the aplication under http://localhost

You can see the default teacher and student on the [DBSeeder](https://github.com/DCa23/edu-master/blob/main/database/seeders/DatabaseSeeder.php)