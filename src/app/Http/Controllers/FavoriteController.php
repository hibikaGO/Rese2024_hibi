<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function addToFavorites($shopId)
{
    $user = Auth::user();
    $shop = Shop::findOrFail($shopId);

    $user->favorites()->attach($shop);

    return redirect()->back()->with('message', 'Added to favorites');
}

public function removeFromFavorites($shopId)
{
    $user = Auth::user();
    $shop = Shop::findOrFail($shopId);

    $user->favorites()->detach($shop);

    return redirect()->back()->with('message', 'Removed from favorites');
}

}
