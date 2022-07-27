<?php

namespace App\Repositories;

use App\Models\Book;

class BookRepository extends BaseRepository
{
    protected $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Book::class;
    }

    public function getAllBook()
    {
        $result = Book::all();
        return $result;
    }
}
