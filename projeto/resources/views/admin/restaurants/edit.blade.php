@extends('layouts.app')

@section('content')

<main class="container">

<h1>Editar  de Restaurante</h1>

<hr>

<form action="{{route('restaurant.update', ['restaurant' => $restaurant->id])}}" method="post">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <p class="form-group">    
        <label >Nome do Restaurante</label>
        <input type="text" name="name" value="{{$restaurant->name}}" class="form-control @if($errors->has('nome')) is-invalid @endif">
        @if($errors->has('name'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('name')}}<strong>
            </span>
        @endif

    <p class="form-group">    
        <label >Endereço</label>
        <input type="text" name="address" value="{{$restaurant->address}}" class="form-control @if($errors->has('address')) is-invalid @endif">
        @if($errors->has('address'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('address')}}<strong>
            </span>
        @endif
    </p>
    
    <p class="form-group">    
        <label >Fale sobre o Restaurante</label>
        <textarea name="description" cols="30" rows="10" class="form-control @if($errors->has('description')) is-invalid @endif">{{$restaurant->description}}</textarea>
        @if($errors->has('description'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('description')}}<strong>
            </span>
        @endif
    </p>

   
    
    <input type="submit" class="btn btn-primary"value="Atualizar">
    
    
</form>
</main>    
    
@endsection    