# Books API

This RESTful book API allows users to perform CRUD (Create, Read, Update, Delete) operations on books. The API follows RESTful principles and uses the HTTP methods (GET, POST, PUT, DELETE) for each operation. 

## Getting books
Returns a JSON string of books (option for all books, and a single book by using the id). No authentication required.  
### GET all books   
`GET /books`  
### GET a book
`GET /books/{id}`
### POST a book
`POST /add-book`
### POST a book
`POST /add-book`
### UPDATE a book
`PUT /books/{id}`
### DELETE a book
`DELETE /books/{id}`

## This API was made using PHP and Laravel
PHP 7.4.26
Laravel Framework 8.83.27

Process of getting the API up and running:
Make a file called `.env`. copy over the env.example in there, and add in your database values.
Install composer using the following command:
`composer install`.
Then update the compsoser from your composer.json file by running the command:
`Composer update composer dump-autoload`
Now finally run the command:
`php artisan serve`