# Geo PHP Developer Coding Test

This project is a simple REST API in PHP that provides endpoints for managing users and orders in a database.

## Coding Test Requirements

The project has the following requirements:

- The database should contain two tables named `users` and `orders`.
- A user should have a name.
- An order must belong to a user and should have a date and total value.
- Create an endpoint to create a user.
- Create an endpoint to create an order.
- Create an endpoint that can get a user by id.
- Create an endpoint that can update a user’s name.
- Create an endpoint that accepts a user id and returns all orders and the sum of all order total values.

## Technologies Used

The project utilizes the following technologies:

- PHP 8.1.16
- Laravel 8.83.27
- MySQL 5.7.32
- Docker

## Execution Requirements
Before getting started, you will need to have the following software installed on your machine:
- Docker
- Docker Compose

## How to build the project
To use this Docker setup for your Laravel application, follow these steps:
1. Clone this repository to your local machine: git clone https://github.com/DerickDL/Geo-PHP-Developer-Coding-Test.git.
2. Copy the .env.example to your .env file into the /src directory of this repository.
3. Run docker-compose build in the root directory to start the Docker containers.
4. Run docker-compose up -d in the root directory to start the Docker containers.
5. Get inside php container using docker-compose exec php /bin/sh
	> /var/www/html # chown -R www-data:www-data .
6. Run docker-compose run --rm composer install 
7. Run docker-compose run --rm artisan migrate
8. Visit http://localhost in your browser to view your Laravel application.

## How to access the API documentation
1. Visit http://localhost/request-docs

## How to run the tests
- docker-compose run --rm artisan test --testsuite=Unit

## Configuration
The following Docker containers are included in this setup:
- nginx: serves as the web server and handles incoming HTTP requests.
- php: runs the PHP code for your Laravel application.
- mysql: provides the database server for your application.

You can configure each of these containers by modifying the docker-compose.yml file.

## License
This project is licensed under the MIT License - see the LICENSE file for details.

## Acknowledgments
This Docker setup was inspired by laradock, a more comprehensive Docker setup for Laravel.
