@extends('layouts.app')

@section('title')
    Detalhes
@endsection

@section('content')
    <h1>Página de detalhes do usuário</h1>

    <h2>
        <ul>
            <li>{{$user->name}}</li>
            <li>{{$user->email}}</li>
        </ul>
        <form action="{{route('users.delete', $user->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submite">Remover</button>  
        </form>
    </h2>
@endsection