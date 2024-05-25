@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/done.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="card">
            <svg viewBox="0 0 210 40" class="text">
                <text x="105" y="20" font-size="15" text-anchor="middle">ご予約ありがとうございます</text>
            </svg>
            <a href="/detail"class="link">戻る</a>
        </div>
    </div>
@endsection