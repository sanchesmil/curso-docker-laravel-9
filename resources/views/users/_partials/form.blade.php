<div class="w-full bg-white shadow-md rounded px-8 py-12">
    @csrf
    <input type="text" name="name" placeholder="Nome:" value="{{$user->name ?? old('name')}}">
    <input type="email" name="email" placeholder="E-mail:" value="{{$user->email ?? old('email')}}">
    <input type="password" name="password" placeholder="Senha: ">
    <button type="submit">Enviar</button>
</div>