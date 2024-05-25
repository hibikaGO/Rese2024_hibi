<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Shop;
use App\Http\Requests\StoreReservationRequest;
use Illuminate\Support\Facades\Auth;


class ReserveController extends Controller
{
    public function confirmReservation(StoreReservationRequest $request)
    {
        $validated = $request->validated();
        $request->session()->put('reservation', $validated);

        return redirect()->route('detail', ['id' => $validated['shop_id']]);
    }

    public function storeReservation(Request $request)
    {
        $validated = $request->session()->get('reservation');
        $validated['user_id'] = Auth::id();
        Reservation::create($validated);

        $request->session()->forget('reservation');

        return redirect()->route('detail', ['id' => $validated['shop_id']])->with('success', '予約が完了しました。');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();
        return back()->with('success', '予約が削除されました');
    }

}
