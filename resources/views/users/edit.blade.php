<h1>formulario de edição do usuario{{$user->name}}</h1>
{{-- mensagem de errro de validação --}}
@if ($errors->Any()) 
    <ul class="erros">
        @foreach ($errors->all() as $error)
            <li class="error">{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="{{route('users.update',$user->id)}}" method="post"><!--ao usar o verbo put na rota, usa-se o verbo post aqui no form, pois o put teoricamente nao exite(trabalha por tras so bastidores), deve-se passa na rota o id. porem poderia usar o post-->
    <!--deve-se usar o toquem crf para evitar ataques desse tipo, caso nao seja declarado vai dar o erro 419--> 
    {{-- {{csrf_token()}} --}}
    @method('PUT')<!--essa directiva é usada por causa do verdo put declarado na rota-->
    @csrf
    <input type="text" name="name"  value="{{$user->name}}" ><br/>
    <input type="text" name="email" value="{{$user->email}}" ><br/>
    <input type="password" name="password" placeholder="senha"><br/>
    <button type="submit">salvar</button>
</form>