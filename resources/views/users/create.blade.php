<h1>formulario de cadastro</h1>
{{-- mensagem de errro de validação --}}
@if ($errors->Any()) 
    <ul class="erros">
        @foreach ($errors->all() as $error)
            <li class="error">{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{route('users.createAction')}}" method="post">
    <!--deve-se usar o toquem crf para evitar ataques desse tipo, caso nao seja declarado vai dar o erro 419--> 
    {{-- {{csrf_token()}} --}}
    @csrf
    <input type="text" name="name" value="{{old('name')}}" placeholder="nome"><br/>
    <input type="text" name="email" value="{{old('email')}}" placeholder="email"><br/>
    <input type="password" name="password" placeholder="senha"><br/>
    <button type="submit">Enviar</button>
</form>