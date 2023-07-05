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
## JSON example:
```   
        {
            "title": "Steve Jobs by Waater Isaacson: The Exclusive Biography",
            "description": "Walter Isaacson tells the story of the rollercoaster life and searingly intense personality of creative entrepreneur whose passion for perfection and ferocious drive revolutionized six industries: personal computers, animated movies,music, phones, tablet computing, and digital publishing.",
            "author": "Walter Isaacson",
            "price": 9
        }
```   
### UPDATE a book
`PUT /books/{id}`
## JSON example:
```     
        {
            "title": "The Little Prince",
            "author": "Antoine de Saint-Exupéry",
            "description": "The story follows a young prince who visits various planets, including Earth, and addresses themes of loneliness, friendship, love, and loss.",
            "price": 8
       }
 ```
### DELETE a book
`DELETE /books/{id}`

## This API was made using PHP and Laravel
PHP 7.4.26
Laravel Framework 8.83.27

Process of getting the API up and running:
Make a file called `.env`. copy over the env.example in there, and add in your database values.
1. Install composer using the following command:
`composer install`.
2. Then update the compsoser from your composer.json file by running the command:
`Composer update composer dump-autoload`
3. To get the migrations run the command:
`php artisan migrate `
4. Now finally run the command:
`php artisan serve`