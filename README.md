
## Install


- Install composer : sudo apt-get install composer
- Install project : composer install

## .env

- Copy .env.exemple into src file and rename it .env
- If you have database info, enter it here
    - DB_CONNECTION
    - DB_HOST
    - DB_PORT
    - DB_DATABASE
    - DB_USERNAME
    - DB_PASSWORD

## Database Migrations
 - In your database server, create a database. 
 Create your database with the same name of .env file content (DB_DATABASE)
 
 - Into src file, open a terminal and run "php artisan migrate:fresh"
 
 Now All your data tables are in your database.
