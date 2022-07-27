@extends('layout')

@section('title')
    List Book
@endsection

@section('content')
    <div class="container mt-2 border border-dark" style="padding: 5px" >
        <table class="table border" id="myTable">
            <a href="{{ route('books.create') }}">
                <input type="button" class ="btn btn-primary" value="Add Book" style="margin-bottom: 15px;margin-top: 10px">
            </a>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Book Name</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @php
                $cnt = 1;
            @endphp
            @foreach($books as $book)
                <tr>
                    <th scope="row">{{$cnt++}}</th>
                    <td>{{$book->book_name}}</td>
                    <td>{{$book->author->author_name ?? ''}}</td>
                    <td>{{$book->category->category_name ?? ''}}</td>
                    <td>{{$book->price}}</td>
                    <td>
                        <form action="{{ route('books.show',$book->id) }}" method="post">
                            @method('get')
                            <button type="submit" class="btn btn-info">View</button>
                        </form>
                        <form action="{{route('books.edit', $book->id)}}" method="post" >
                            @method('get')
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </form>
                        <form action="{{route('books.destroy', $book->id)}}" method="post" onclick="return myFunction();">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function myFunction() {
            if(!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }
    </script>

@endsection
