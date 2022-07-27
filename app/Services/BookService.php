<?php

namespace App\Services;

use App\Repositories\BookRepository;

class BookService
{
    protected $bookRepository;

    public function __construct(BookRepository $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    public function index()
    {
        return $this->bookRepository->getAllBook();
    }

    public function show($id)
    {
        return $this->bookRepository->find($id);
    }

    public function store(array $data)
    {
        unset($data['store_id']);
        return $this->bookRepository->create($data);
    }

    public function update(array $data,$id)
    {
        $result = $this->bookRepository->update([
            'book_name' => $data['book_name'],
            'price' => $data['price'],
            'author_id' => $data['author_id'],
            'category_id' => $data['category_id'],
            'description' => $data['description']
        ],$id);
        return $result;
    }

    public function delete($id)
    {
        return $this->bookRepository->delete($id);
    }
}
