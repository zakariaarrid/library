<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BooksController extends Controller
{
    public function store() {

        $data = request()->validate([
            'title' => 'required',
            'author' => 'required'
        ]);

        $book = Book::create($data);

        return redirect($book->path());

    }
    public function destroy($id){

        $book = Book::first();



        $book->delete();


        return redirect('/books');
    }

    public function update(Book $book) {

        $data = request()->validate([
            'title' => 'required',
            'author' => 'required'
        ]);

        $book->update($data);
        return redirect($book->path());

    }
}
