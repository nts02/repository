@extends('layout')
@section('title')
    List Store
@endsection
@section('content')

    <div class="container mt-2 border border-dark" style="padding: 5px" >
        <table class="table border" id="myTable">
            <a href="{{ route('stores.create') }}">
                <input type="button" class ="btn btn-primary" value="Add Store" style="margin-bottom: 15px;margin-top: 10px">
            </a>
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @php
                $cnt = 1;
            @endphp
            @foreach($stores as $store)
                <tr>
                    <th scope="row">{{$cnt++}}</th>
                    <td>{{ $store->store_name }}</td>
                    <td>{{ $store->address }}</td>
                    <td>
                        <form action="{{ route('stores.show',$store->id) }}" method="post" >
                            @method('get')
                            <button type="submit" class="btn btn-info">View</button>
                        </form>
                        <form action="{{ route('stores.edit',$store->id) }}" method="post" >
                            @method('get')
                            <button type="submit" class="btn btn-warning">Edit</button>
                        </form>
                        <form action="{{ route('stores.destroy',$store->id) }}"
                              method="post" onclick="myFunction()">
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

