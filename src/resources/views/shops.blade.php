@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/shops.css') }}">
@endsection

@section('header')
    <div class="search-wrap">
        <form action="/search" method="post">
        @csrf
        <div class="search">
            <div class="search_area">
                <select class="select_area" name="area">
                    <option value="" selected disabled>All area</option>
                            @foreach($areas as $area)
                            <option value="{{ $area }}">{{ $area }}
                            </option>
                            @endforeach
                </select>
            </div>
            <div class="search_genre">
                <select class="select_genre" name="genre">
                    <option value="" selected disabled>All genre</option>
                            @foreach($genres as $genre)
                            <option value="{{ $genre }}">{{ $genre }}
                            </option>
                            @endforeach
                </select>
            </div>
            <div class="search_form">
                <button class="button__search" type="submit">
                    <div class="my-parts"><span></span></div>
                </button>
                <div class="search_text">
                    <input type="text" name="name" placeholder="Search...">
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection

@section('content')
    <div class="content">
    @foreach ($items as $item)
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
    @endforeach
    </div>

@endsection
