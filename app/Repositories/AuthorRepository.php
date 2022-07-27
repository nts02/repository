<?php

namespace App\Repositories;

use App\Models\Author;

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
        $result = Author::orderBy('author_name')->get();
        return $result;
    }

    public function addAuthor()
    {

    }
}
