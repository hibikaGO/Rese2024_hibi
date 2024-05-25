<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //use HasFactory;
    protected $guarded = array('id');
    public static $rules = array(
        'id' => 'required',
        'name' => 'required',
        'text' => 'required',
        'picture' => 'required',
        'area' => 'required',
        'genre' => 'required',
        'created_at' => 'required',
        'updated_at' => 'required',
    );
    
    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites', 'shop_id', 'user_id');
    }
}
