<h1>BEM - VINDO</h1>

<ul>
    <li> {{$user->name}} - {{$user->email}} - {{$user->created_at}}</li>
</ul>

<a href="{{route('users.create')}}">novo usuario</a>