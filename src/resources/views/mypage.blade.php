@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')
    <div class="content-mypage">
        <div class="reserve-content">
            <div class="title">予約状況</div>
        @forelse ($userReservations as $reservation)
            <div class="reserved">
                <div class="reserved-header">
                    <div class="reserved-title">
                        <img src="{{asset('picture/clock.png')}}" class=img-clock alt="">
                        <div class="reserved-title-text">予約１</div>
                    </div>
                    <div class="button-cancel">
                        <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="cancel" type="submit" >
                            ×
                        </button>
                        </form>
                    </div>
                </div>
                <div class="reserved-detail">
                    <div class="label-wrap">
                        <p class="reserve_label">Shop</p>
                        <p class="reserve_label">Date</p>
                        <p class="reserve_label">Time</p>
                        <p class="reserve_label">Number</p>
                    </div>
                    <div class="detail-wrap">
                        <p class="reserve_detail">{{ $reservation->shop->name }}</p>
                        <p class="reserve_detail">{{ $reservation->date }}</p>
                        <p class="reserve_detail">{{ $reservation->time }}</p>
                        <p class="reserve_detail">{{ $reservation->number }}</p>
                    </div>
                </div>
            </div>
        @empty
        <p>予約はありません。</p>
        @endforelse
        </div>
        <div class="favorite-content">
            <div class="user">{{ Auth::user()->name }}さん</div>
            <div class="favorite-text">お気に入り店舗</div>
            <div class="favorite-list">
                @forelse ($favorites as $item)
                <div class="card">
                    <div class="card_img">
                        <img src="{{ asset('storage/'.$item -> picture)}}" alt="画像" />
                    </div>
                    <div class="card_content">
                            <h3 class="shop_name">
                                {{$item -> name}}
                            </h3>
                            <p class="shop_tag">
                                #{{$item -> area}} #{{$item -> genre}}
                            </p>
                        <div class="card_bottom">
                            <a class="button_detail" href="{{ route('detail', ['id' => $item->id]) }}">
                                詳しく見る
                            </a>
                            <div class="favorite">
                                @if (Auth::check())
                                    @if (Auth::user()->favorites->contains($item))
                                        <form action="{{ route('favorites.remove', $item->id) }}" method="POST" class="form-favorite">
                                            @csrf
                                            <button type="submit" class="button_on">
                                                <img class="img-favorite" src="{{asset('picture/favorite-on.png')}}" alt="favorite-remove"></button>
                                        </form>
                                    @else
                                        <form action="{{ route('favorites.add', $item->id) }}" method="POST" class="form-favorite">
                                            @csrf
                                            <button type="submit"class="button_off">
                                                <img class="img-favorite" src="{{asset('picture/favorite-off.png')}}" alt="favorite-add"></button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            <p>お気に入りの店舗はありません。</p>
            @endforelse
            </div>
        </div>
    </div>
@endsection