# Meal Orders API

This is a project that provides API services to an SPA application related.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development purposes.

### Installing

After cloning the project, install the dependencies

```
composer install
```

### Setting up

Generate a key for the application

```
php artisan key:generate
```

- Note: You need to copy ``.env.example`` content in a ``.env`` file

Create the symbolic link for storage

```
php artisan storage:link
```

Create a database named ``meal_orders``. Then run migrations and seed tables

```
php artisan migrate --seed
```

## Testing

Create a ``database.sqlite`` file in the database directory. Then run the tests:

```
php artisan test
```

### Demo in Postman

Check the API in:

[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/7130305-d41d9504-3db0-4827-8be9-d18c464ee004?action=collection%2Ffork&collection-url=entityId%3D7130305-d41d9504-3db0-4827-8be9-d18c464ee004%26entityType%3Dcollection%26workspaceId%3D3b94fc5c-b49c-404c-8a7f-ee52ec1e9c2a#?env%5BMeal%20Orders%20API%5D=W3sia2V5IjoiaG9zdCIsInZhbHVlIjoiaHR0cDovL21lYWwtb3JkZXJzLWFwaS50ZXN0IiwiZW5hYmxlZCI6dHJ1ZX1d)
