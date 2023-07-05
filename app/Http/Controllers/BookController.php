<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\QueryException;
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
        try {
            Book::create($request->only([
                'title', 'description', 'author', 'price',
            ]));
        } catch(QueryException $e) {
            return response()->json('Unable to store book in database, please try again later', 500);
        } catch(\Exception $e) {
            return response()->json($e->getMessage(), 500);
        }

        $value = 'The book has now been added';
        return response()->json([$value],  Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function showAll(Book $book)
    {
        return Book::all();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $book = Book::find($id);

        if ($book === null) {
            return response(
            "Couldn't find the book with the id: " . $id,
            Response::HTTP_NOT_FOUND
            );
        }

        if ($book->find($id) === false) {
            return response(
                "Couldn't find the book with the id: " . $id,
                Response::HTTP_BAD_REQUEST
            );
        }

        return response($book, Response::HTTP_OK);
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
                    "Couldn't update the book with id: " . $request->id,
                    Response::HTTP_BAD_REQUEST
                );
            }

            return response($book, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $book = Book::find($request->id);

        if ($book === null) {
            return response(
            "Couldn't find the book with the id: " . $request->id,
            Response::HTTP_NOT_FOUND
            );
        }

        if ($book->delete() === false) {
            return response(
                "Couldn't delete the book with the id: " . $request->id,
                Response::HTTP_BAD_REQUEST
            );
        }

        return response(["id" => $request->id, "deleted" => true], Response::HTTP_OK);
    }
}
