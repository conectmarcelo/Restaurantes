@extends('layouts.app')

@section('content')

<main class="container">

<h1>Inserção  de Cardápio</h1>



<form action="{{route('menu.store')}}" method="post">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <p class="form-group">    
        <label >Nome do Restarunte</label>
        <input type="text" name="name" value="{{old('name')}}" class="form-control @if($errors->has('name')) is-invalid @endif" autocomplete="off">
        @if($errors->has('name'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('name')}}<strong>
            </span>
        @endif
    </p>

    <p class="form-group">    
        <label >Preço</label>
        <input type="text" name="price" value="{{old('price')}}" class="form-control @if($errors->has('price')) is-invalid @endif">
        @if($errors->has('price'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('price')}}<strong>
            </span>
        @endif
     
        
    </p>

    <p class="form-group">    
        <label >Restaurante</label>

        <select name="restaurant_id" class="form-control">
            <option value="">Selecione um restaurante</option>
            @foreach($restaurants as $r)
                <option value="{{$r->id}}">{{$r->name}}</option>
            @endforeach
        </select>
        
        @if($errors->has('restaurant_id'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('restaurant_id')}}<strong>
            </span>
        @endif
     
        
    </p>

    
   
    
    <input type="submit" class="btn btn-primary"value="cadastrar">
    
</form> 

</main>

@endsection 
    
    