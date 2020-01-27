# Innoscripta Pizza API

<a href="https://travis-ci.org/zorca/innoscripta-pizza-api"><img src="https://travis-ci.org/zorca/innoscripta-pizza-api.svg" alt="Build Status"></a>

## Project Installation

### Server Requirements
If you are not using Homestead, Laravel virtual machine,
you will need to make sure your server meets the following requirements:
- PHP >= 7.2.0
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

### Install

Clone this repository and install Composer dependencies:
``composer install``

Then copy content of .env.example to .env file And fill in database access parameters, such as:

    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=

Generate app key:

``php artisan key:generate``

and prepare database with demo data:

``php artisan migrate``

``php artisan db:seed``

Then start a development server at http://localhost:8000:

``php artisan serve``
