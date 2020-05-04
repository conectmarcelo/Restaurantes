<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use Illuminate\Support\Facades\Auth;


class MenuController extends Controller
{
    public function index ()
    {
        $restaurants = Auth::user()->restaurants()->select('id')->get()->toArray();
        
        $menus = Menu::whereIn('restaurant_id', $restaurants)->get();
        return view ('admin.menus.index', compact('menus'));
    }

    public function new ()
    {
        $restaurants = Auth::user()->restaurants;
        return view ('admin.menus.store', compact('restaurants'));
    }

    public function store(MenuRequest $request)
    {


        $menuData = $request->all();

        $validator = $request->validated();    

        $restaurant = Restaurant::find($menuData['restaurant_id']);
        $restaurant->menus()->create($menuData);

        flash('menue criado com sucesso')->success();
        return redirect()->route('menu.index');

        
    }

    public function edit(Menu $menu)
    {
        $restaurants = Auth::user()->restaurants;
        return view('admin.menus.edit', compact('menu', 'restaurants'));

    }

    public function update(MenuRequest $request, $menu)
    {
        $menuData = $request->all();

        $request->validated();

        $menu = Menu::find($menu);
        $menu->restaurant()->associate($menuData['restaurant_id']);
        $menu->update($menuData);


        flash('menue Atualizado com sucesso')->success();
        return redirect()->route('menu.index', ['menu =>$id']);


    }

    public function delete($menu)
    {
        

        $menu = Menu::findOrFail($menu);
        $menu->delete();


        flash('menue Excluindo com Sucesso')->success();
        return redirect()->route('menu.index');
    }    











}