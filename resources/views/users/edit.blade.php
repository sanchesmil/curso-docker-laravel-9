@extends('layouts.app')

@section('title')
    Editar usuário
@endsection

@section('content')
    <h1 class="text-2xl font-semibold leading-tigh py-2">
        Editar o usuário {{$user->name}}
    </h1>

    <!-- Trata os erros -->
    @include('includes.validations-form')

    <form action="{{ route('users.update', $user->id) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @include('users._partials.form')
    </form>
@endsection