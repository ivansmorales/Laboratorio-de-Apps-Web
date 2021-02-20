@extends('layouts.main')

@section('content')
<h1>Coins update</h1>
<p>{{ $coin->id }}</p>
<form action="{{ route('coins.update', $coin->id) }}" method="POST">
    @csrf
    @method('PUT')
    Nombre corto:<input type="text" name="short_name" value={{$coin->short_name}}> <br>
    Nombre largo:<input type="text" name="name" value={{$coin->name}}> <br>
    <button type="submit">Update coin!</button>
</form>

<form action="{{ route('coins.destroy', $coin->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Remove coin!</button>
</form>

@endsection