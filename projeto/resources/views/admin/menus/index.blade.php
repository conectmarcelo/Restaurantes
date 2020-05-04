@extends('layouts.app')

@section('content')

<main class="container">
<h1>Cardápios</h1>

<a href="{{route('menu.new')}}" class="float-right btn btn-success">Novo</a>




<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Restaurante</th>
            <th>Criado Em</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($menus as $m)
        
        <tr>
            <td>{{$m->id}}</td>
            <td>{{$m->name}}</td>
            <td>
                <a href="{{route('restaurant.edit', ['restaurant'=> $m->restaurant->id])}}">
                    {{$m->restaurant->name}}
                </a>
            </td>
            <td>{{$m->created_at}}</td>
            
            <td>
                <a href="{{route('menu.edit', ['menu'=> $m->id])}}" class="btn btn-primary">Editar</a>
                <a href="{{route('menu.remove', ['menu'=> $m->id])}}"class="btn btn-danger">Excluir</a>

            </td>
           
        </tr>

        @endforeach
    </tbody>
</table>

</main>
@endsection 