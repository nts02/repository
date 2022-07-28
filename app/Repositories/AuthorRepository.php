<?php

namespace App\Repositories;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorRepository extends BaseRepository
{
    protected $author;

    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Author::class;
    }

    public function getAllAuthor()
    {
        $result = Author::paginate(8);
        return $result;
    }

    public function searchAuthor($text)
    {
        $result = Author::where('author_name','LIKE','%'.$text.'%')->paginate(8);
        return $result;
    }
}
