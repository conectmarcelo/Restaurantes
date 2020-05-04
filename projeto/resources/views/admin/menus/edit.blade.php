@extends('layouts.app')

@section('content')

<main class="container">

<h1>Edição de Cardápio</h1>

<hr>

<form action="{{route('menu.update', ['menu' => $menu->id])}}" method="post">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <p class="form-group">    
        <label >Nome do menue</label>
        <input type="text" name="name" value="{{$menu->name}}" class="form-control @if($errors->has('nome')) is-invalid @endif">
        @if($errors->has('name'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('name')}}<strong>
            </span>
        @endif

    <p class="form-group">    
        <label >Preço</label>
        <input type="text" name="price" value="{{$menu->price}}" class="form-control @if($errors->has('price')) is-invalid @endif">
        @if($errors->has('price'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('price')}}<strong>
            </span>
        @endif
    </p>
    
    <p class="form-group">    
        <label >Restaurante</label>

        <select name="restaurant_id" class="form-control">
            
            @foreach($restaurants as $r)
                <option value="{{$r->id}}"
                    @if ($menu->restaurant_id == $r->id) 
                        selected
                    @endif
                >{{$r->name}} </option>
            @endforeach
        
        </select>
        
        @if($errors->has('restaurant_id'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('restaurant_id')}}<strong>
            </span>
        @endif
     
        
    </p>

   
    
    <input type="submit" class="btn btn-primary"value="Atualizar">
    
    
</form>
</main>    
    
@endsection    