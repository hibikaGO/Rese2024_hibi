<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\User;
use App\Models\Reservation;

class ShopController extends Controller
{
    public function index(){

        $items = Shop::all();
        $areas= Shop::distinct()->pluck('area');
        $genres=Shop::distinct()->pluck('genre');
        return view('shops', compact('items','areas', 'genres'));
    }

    public function search(Request $request){

        $areas= Shop::distinct()->pluck('area');
        $genres=Shop::distinct()->pluck('genre');

        $area = $request->input('area');
        $genre = $request->input('genre');
        $name = $request->input('name');

        $query = Shop::query();

        if ($area) {
            $query->where('area', $area);
        }

        if ($genre) {
            $query->where('genre', $genre);
        }

        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        $items = $query->get();
        return view('shops', compact('items','areas', 'genres'));
    }


    public function detail($id){
    $items = Shop::findOrFail($id);
    $reservation = session('reservation', []);

    return view('detail', compact('items', 'reservation'));
    }

    public function done(){
        return view('done');
    }
    public function thanks(){
        return view('auth.thanks');
    }
}
