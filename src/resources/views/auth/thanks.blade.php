@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
    <div class="content">
        <div class="card">
            <svg viewBox="0 0 210 40" class="text">
                <text x="105" y="20" font-size="15" text-anchor="middle">会員登録ありがとうございます</text>
            </svg>
            <a href="/login"class="link">ログインする</a>
        </div>
    </div>
@endsection