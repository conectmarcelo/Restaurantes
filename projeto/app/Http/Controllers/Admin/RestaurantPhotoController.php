<?php

namespace App\Http\Controllers\Admin;

use App\RestaurantPhoto;
use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin;




class RestaurantPhotoController extends Controller
{
    public function index($restaurant)
    {

        $restaurant_id = $restaurant;
        return view('admin.restaurants.photos.index', compact('restaurant_id'));
    }   


    public function save(Request $request, $restaurant)
    {

        foreach($request->file('photos') as $photo)
        {
            //print $photo->getClientOriginalName().'<br>';
        
            $newName = sha1($photo->getClientOriginalName()) . uniqid() . '.' . $photo->getClientOriginalExtension();
            
            $photo->move(public_path('images'), $newName);
            
            

            $restaurant = Restaurant::find($restaurant);
            $restaurant->photos()->create([
                'photo' => $newName
            ]);

            


        }

    }   


}
