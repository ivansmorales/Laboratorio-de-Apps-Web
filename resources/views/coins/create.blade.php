<h1>Coins creator!</h1>
<form action="{{ route('coins.store') }}" method="POST">
    @csrf
    Nombre corto:<input type="text" name="short_name"> <br>
    Nombre largo:<input type="text" name="name"> <br>
    <button type="submit">Create coin!</button>
</form>