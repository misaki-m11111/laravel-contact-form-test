@extends('layouts.base')

@section('header-nav')
    <a href="/login" class="header__login">login</a>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/auth/auth-common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
@endsection

@section('page')
    <div class="auth auth--register">
        <h1 class="auth__title">Register</h1>

        <form action="/register" method="post">
            @csrf

            <div class="form">
                <div class="form__group">
                    <label class="form__label">お名前</label>
                    <input class="form__input" type="name" name="name" value="{{ old('name') }}"
                        placeholder="例：山田 太郎">

                    @error('name')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form__group">
                    <label class="form__label">メールアドレス</label>
                    <input class="form__input" type="text" name="email" value="{{ old('email') }}"
                        placeholder="test@example.com">

                    @error('email')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form__group">
                    <label class="form__label">パスワード</label>
                    <input class="form__input" type="password" name="password" placeholder="password">

                    @error('password')
                        <p class="form__error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="auth__button auth__button--register">
                登録
            </button>
        </form>
    </div>
@endsection
