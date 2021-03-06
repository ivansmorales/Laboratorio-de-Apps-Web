@extends('layouts.main')

@section('content')
<h1>List of users</h1>
<p>
    Signup, <a href="{{route('auth.register')}}">click here.</a>
</p>
<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>View profile</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td><a href="{{route('users.edit', $item->id ) }}"> View</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection