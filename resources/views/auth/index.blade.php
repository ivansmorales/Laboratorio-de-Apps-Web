@extends('layouts.main')

@section('content')
<h1>List of users</h1>
<p>
    Signup, <a href="{{route('auth.register')}}">click here.</a>
</p>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->password }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection