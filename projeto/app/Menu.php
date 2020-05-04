<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // O larvel sempre tenta achar o nome da tabela no plural, para corrigir isto persistir
    //protected $table = 'menu';
    // neste ao inves forcar vou corrigir o nome da tabela no banco php artisan make:migration alte_table_menu
    // depois corrigir dentro da migration criada
    protected $fillable=[

        'name', 'price'

    ];

    public function restaurant(){

        return $this->belongsTo(Restaurant::class);
    }
}
