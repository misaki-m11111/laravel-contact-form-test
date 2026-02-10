@extends('layouts.base')

@section('header-nav')
    <a href="/register" class="header__register">register</a>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/auth/auth-common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
@endsection

@section('page')
    <div class="auth auth--login">
        <h1 class="auth__title">login</h1>

        <form method="POST" action="/login">
            @csrf

            <div class="form login-form">
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
                    <input class="form__input" type="password" name="password" placeholder="coachtech1106">
                </div>

                @error('password')
                    <p class="form__error">{{ $message }}</p>
                @enderror

            </div>

            <button type="submit" class="auth__button auth__button--login">
                ログイン
            </button>
        </form>
    </div>
@endsection
