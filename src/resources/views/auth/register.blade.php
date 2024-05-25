@extends('layouts.parent')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="register_content">
        <div class="title">会員登録</div>
        <form action="/register" method="post">
        @csrf
            <div class="register_item">
                <img src="{{asset('picture/img-name.png')}}" alt="" class="img-email">
                <div class="register-form">
                    <input type="text" name="name" placeholder="Name" class="register-form">
                </div>
            @error('name')
            {{ $message }}
            @enderror
            </div>
            <div class="register_item">
                <img src="{{asset('picture/img-email.png')}}" alt="" class="img-email">
                <div class="register-form">
                    <input type="email" name="email" placeholder="Email" class="register-form">
                </div>
            @error('email')
            {{ $message }}
            @enderror
            </div>
            <div class="register_item">
                <img src="{{asset('picture/img-pass.png')}}" alt="" class="img-pass">
                <div class="register-form">
                    <input type="password"  name="password" placeholder="Password" class="register-form">
                </div>
            @error('password')
            {{ $message }}
            @enderror
            </div>
            <div class="button_register">
                <button type=submit class="register">登録</button>
            </div>
        </form>
        </div>
    </div>
@endsection