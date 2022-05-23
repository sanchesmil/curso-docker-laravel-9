@extends('layouts.app')

@section('title')
    Detalhes
@endsection

@section('content')
    <h1 class="text-2xl font-semibold leading-tigh py-2">Página de detalhes do usuário</h1>

    <h2>
        <ul>
            <li>{{$user->name}}</li>
            <li>{{$user->email}}</li>
        </ul>
        <form action="{{route('users.delete', $user->id)}}" method="post" class="py-12">
            @csrf
            @method('delete')
            <button type="submit" class="rounded-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4" >Remover</button>  
        </form>
    </h2>
@endsection