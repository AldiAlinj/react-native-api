# React Native CRUD API

API for React Native CRUD project.

## Installation

Use the Laravel Composer to install packages and dependencies 

```bash
composer install
copy .env-example.env
```

## Usage

Create a database in phpMyAdmin and configure it in your .env file
```
DB_DATABASE=*your_database_name_here*
FILESYSTEM_DISK=public
```

Start the server normally or use your public IPv4 adress to access it from another IP 

```
php artisan serve //Local
php artisan serve host=*Your IPV4 adress here* //Public
```




## Description 
This porject has the endpoints required by the React Native CRUD project. It includes Creating, Reading, Updating & Deleting data.
