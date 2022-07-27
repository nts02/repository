<?php

namespace App\Repositories;

use App\Models\Book;
use Illuminate\Support\Facades\DB;

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

    public function getStoreArrayById($id)
    {
        $store_array = DB::table('book_store')->select('store_id')->where('book_id',$id)->get();
        return $store_array;
    }

    public function getLatestBook()
    {
        return Book::latest()->first();
    }
}
