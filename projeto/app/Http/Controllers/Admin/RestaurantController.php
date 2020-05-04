<?php

namespace App\Http\Controllers\Admin;

use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RestaurantRequest;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index ()
    {
        //Buscar restaurantes do usuario
        // deste jeito $restaurants = Restaurant::Where('owner_id', Auth::user()->id)->get();
        //ou
        $restaurants = Auth::user()->restaurants;
        return view ('admin.restaurants.index', compact('restaurants'));
    }

    public function new ()
    {
        return view ('admin.restaurants.store');
    }

    public function store(RestaurantRequest $request)
    {
        $restaurantData = $request->all();
        
        $validator = $request->validated();    

        $user = Auth::user();
        $user->restaurants()->create($restaurantData);
       
        flash('restaurante criado com sucesso')->success();
        return redirect()->route('restaurant.index');

        
    }

    public function edit(Restaurant $restaurant)
    {

        return view('admin.restaurants.edit', compact('restaurant'));

    }

    public function update(RestaurantRequest $request, $restaurant)
    {
        $restaurantData = $request->all();

        $request->validated();

        $restaurant = Restaurant::findOrFail($restaurant);
        $restaurant->update($restaurantData);


        flash('Restaurante Atualizado com sucesso')->success();
        return redirect()->route('restaurant.index', ['restaurant =>$id']);


    }

    public function delete($restaurant)
    {
        

        $restaurant = Restaurant::findOrFail($restaurant);
        $restaurant->delete();


        flash('Restaurante Excluindo com Sucesso')->success();
        return redirect()->route('restaurant.index');
    }    











}