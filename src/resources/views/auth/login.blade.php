@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
    <div class="login_content">
        <div class="title">Login</div>
        <form action="/login" method="post">
        @csrf
            <div class="login_item">
                <img src="{{asset('picture/img-email.png')}}" alt="" class="img-email">
                <div class="login-form">
                    <input type="email" name="email" placeholder="Email" class="login-form">
                </div>
            @error('email')
            {{ $message }}
            @enderror
            </div>
            <div class="login_item">
                <img src="{{asset('picture/img-pass.png')}}" alt="" class="img-pass">
                <div class="login-form">
                    <input type="password"  name="password" placeholder="Password" class="login-form">
                </div>
            @error('password')
            {{ $message }}
            @enderror
            </div>
            <div class="button_login">
                <button type=submit class="login">ログイン</button>
            </div>
        </form>
        </div>
    </div>
@endsection