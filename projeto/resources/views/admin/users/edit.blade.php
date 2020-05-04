@extends('layouts.app')

@section('content')

<main class="container">

<h1>Editar Usuários</h1>



<form action="{{route('user.update', ['user' => $user->id])}}" method="post">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <p class="form-group">    
        <label >Nome do Usuario</label>
        <input type="text" name="name" value="{{$user->name}}" class="form-control @if($errors->has('name')) is-invalid @endif" >
        @if($errors->has('name'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('name')}}<strong>
            </span>
        @endif
    </p>

    <p class="form-group">    
        <label >Email</label>
        <input type="email" name="email" value="{{$user->email}}" class="form-control @if($errors->has('email')) is-invalid @endif">
        @if($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('email')}}<strong>
            </span>
        @endif
        
        <p class="form-group">    
        <label >Senha</label>
        <input type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif">
        @if($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('password')}}<strong>
            </span>
        @endif

        <p class="form-group">    
        <label >Confirmar Senha</label>
        <input type="password" name="password_confirmation" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif">
        @if($errors->has('password-_confirmation'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('password_confirmation')}}<strong>
            </span>
        @endif
        
    </p>
    
    

   
    
    <input type="submit" class="btn btn-primary"value="Atualizar Usuário">
    
</form> 

</main>

@endsection 
    
    