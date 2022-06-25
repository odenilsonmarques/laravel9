<h1>Lista de usuarios</h1>

<ul>
    @foreach($users as $user)
       <li> {{$user->name}} - {{$user->email}} - <a href="{{route('users.show', $user->id)}}">Detalhes</a> - <a href="{{route('users.edit', $user->id)}}">Editar</a> - <a href="{{route('delete.destroy', $user->id)}}">Excluir</a></li>
    @endforeach
</ul>