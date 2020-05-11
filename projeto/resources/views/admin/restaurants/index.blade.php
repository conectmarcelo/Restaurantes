@extends('layouts.app')

@section('content')

<main class="container">
<h1>Restaurantes</h1>

<a href="{{route('restaurant.new')}}" class="float-right btn btn-success">Novo</a>




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
        @foreach($restaurants as $r)
        
        <tr>
            <td>{{$r->id}}</td>
            <td>{{$r->name}}</td>
            <td>{{$r->created_at}}</td>
            
            <td>
                <a href="{{route('restaurant.edit', ['restaurant'=> $r->id])}}" class="btn btn-primary">Editar</a>
                <a href="{{route('restaurant.remove', ['restaurant'=> $r->id])}}"class="btn btn-danger">Excluir</a>
                <a href="{{route('restaurant.photo', ['restaurant'=> $r->id])}}" class="btn btn-warning">Fotos</a>
            </td>
           
        </tr>

        @endforeach
    </tbody>
</table>

</main>
@endsection 