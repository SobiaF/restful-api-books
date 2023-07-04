<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Book::create($request->only([
            'title', 'description', 'author', 'price',
        ]));

        $value = 'request has succeeded';
        return response()->json([$value], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return Book::all();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $book = Book::findOrFail($request->id);

        if (($book->updateOrFail($request->only([
                'title', 'description', 'author', 'price',
            ]))) === false) {
                return response(
                    "Couldn't update the book with id" . $request->id,
                    Response::HTTP_BAD_REQUEST
                );
            }

            return response($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
