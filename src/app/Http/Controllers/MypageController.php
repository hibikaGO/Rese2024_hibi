<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;

class MypageController extends Controller
{
    public function index(){
        $user = Auth::user();
        $favorites = $user->favorites;
        $userReservations = Reservation::where('user_id', auth()->id())->get();

        return view('mypage',['favorites' => $favorites,'userReservations' => $userReservations]);
    }
}