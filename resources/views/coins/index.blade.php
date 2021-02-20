@extends('layouts.main')

@section('content')
<h1>List of coins</h1>
<p>
    Create a coin, <a href="{{route('coins.create')}}">click here.</a>
</p>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Short name</th>
            <th>Name</th>
            <th>Update</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($coins as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->short_name }}</td>
                <td>{{ $item->name }}</td>
                <td><a href="{{route('coins.edit', $item->id ) }}"> Edit</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection