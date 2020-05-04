@extends('layouts.app')

@section('content')

<main class="container">
<h1>Usuarios</h1>

<a href="{{route('user.new')}}" class="float-right btn btn-success">Novo</a>




<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Criado Em</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $u)
        
        <tr>
            <td>{{$u->id}}</td>
            <td>{{$u->name}}</td>
            <td>{{$u->created_at}}</td>
            
            <td>
                <a href="{{route('user.edit', ['user'=> $u->id])}}" class="btn btn-primary">Editar</a>
                <a href="{{route('user.remove', ['user'=> $u->id])}}"class="btn btn-danger">Excluir</a>

            </td>
           
        </tr>

        @endforeach
    </tbody>
</table>

</main>
@endsection 