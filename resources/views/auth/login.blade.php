@extends('layouts.main')

@section('content')
<h1>Sign in </h1>

{{-- Validator section --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('auth.do-login') }}" method="POST">
    @csrf
    <table>
        <tbody>
            <tr>
                <th>Email</th>
                <th>
                    <input type="text" name="email" id="">
                </th>
            </tr>
            <tr>
                <th>Password</th>
                <th>
                    <input type="password" name="password" id="">
                </th>
            </tr>
        </tbody>
    </table>
    <br>
    <button type="submit">Login</button>
</form>

@endsection