@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    <div class="content">
        <div class="shop_content">
            <div class="title_content">
                <div class="link_home">
                    <a href="/" class="home"> ＜</a>
                </div>
                <div class="title">
                    <p class="shop_name">
                            {{$items -> name}}</p>
                </div>
            </div>
            <div class="shop_img">
                <img class="img" src="{{ asset('storage/'.$items -> picture)}}" alt="画像" />
            </div>
            <div class="shop_tag">
                            #{{$items -> area}} #{{$items -> genre}}
            </div>
            <div class="shop_text">
                            {{$items -> text}}
            </div>
        </div>

        @if (Auth::check())
            <div class="reserve_content">
                <p class="reserve_title">予約</p>
                <form id="reservationForm" class="reserve_form" method="post" action="{{ route('reservation.confirm') }}">
                @csrf

                <input type="hidden" name="shop_id" value="{{ $items->id }}">
                <div class="form_select_day">
                    <div class="select_day">
                        <input type="date"  name="date" value="{{$reservation['date'] ?? old('date')}}">
                        @error('date')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="select_time">
                        <input type="time" name="time" value="{{ $reservation['time'] ?? old('time') }}">
                        @error('time')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="select_number">
                        <input type="number" name="number" min="1" value="{{ $reservation['number'] ?? old('number') }}">
                        @error('number')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="button-confirm">予約内容を確認</button>
                </form>
                @if($reservation)
                <div class="reserve_confirm">
                    <div class="reserve_shop">
                        <p class="reserve_label">Shop:{{ $items->name }}</p>
                    </div>
                    <div class="reserve_date">
                        <p class="reserve_label">Date:{{ $reservation['date'] }}</p>
                    </div>
                    <div class="reserve_time">
                        <p class="reserve_label">Time:{{ $reservation['time'] }}</p>
                    </div>
                    <div class="reserve_number">
                        <p class="reserve_label">Number:{{ $reservation['number'] }}</p>
                    </div>
                    <div class="reserve-bottom">
                        <form method="post" action="{{ route('reservation.store') }}">
                        @csrf
                            <div class="button">
                            <button class="button_reserve" type="submit">予約する</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        @else
            <a href="/login" class="message-login">予約するにはログインしてください</a>
        @endif
    </div>
@endsection