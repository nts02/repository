@extends('layout')

@section('title')
    List Author
@endsection

@section('content')
    <div class="container mt-2 border border-dark" style="padding: 5px">
        <table class="table border" id="myTable">
            <a href="{{ route('authors.create') }}">
                <input type="button" class="btn btn-primary" value="Add Author"
                       style="margin-bottom: 15px;margin-top: 10px">
            </a>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Author Name</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @php
                $cnt = 1;
            @endphp
            @foreach($list_author as $item)
                <tr>
                    <th scope="row">{{$cnt++}}</th>
                    <td>{{ $item->author_name }}</td>
                    <td>
                        <form action="{{ route('authors.edit',$item->id) }}" method="get" >
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </form>

                        <form action="{{ route('authors.destroy',$item->id) }}" method="post" onclick="myFunction()">
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
            if (!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }
    </script>
@endsection
