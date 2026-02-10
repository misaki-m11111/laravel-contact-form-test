@extends('layouts.base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/contact/contact-common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact/confirm.css') }}">
@endsection

@section('page')
<div class="confirm">
    <h1 class="confirm__title">Confirm</h1>

    <dl class="confirm__list">
        <dt>お名前</dt>
        <dd>{{ $last_name }} {{ $first_name }}</dd>

        <dt>性別</dt>
        <dd>{{ $gender_label }}</dd>

        <dt>メールアドレス</dt>
        <dd>{{ $email }}</dd>

        <dt>電話番号</dt>
        <dd>{{ str_replace('-', '', $tel) }}</dd>

        <dt>住所</dt>
        <dd>{{ $address }}</dd>

        <dt>建物名</dt>
        <dd>{{ $building }}</dd>

        <dt>お問い合わせの種類</dt>
        <dd>{{ $category_label }}</dd>

        <dt>お問い合わせ内容</dt>
        <dd>{{ $detail }}</dd>
    </dl>

    <div class="confirm__buttons">
        <form action="/thanks" method="post">
            @csrf
            <input type="hidden" name="last_name" value="{{ $last_name }}">
            <input type="hidden" name="first_name" value="{{ $first_name }}">
            <input type="hidden" name="gender" value="{{ $gender }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="tel1" value="{{ $tel1 }}">
            <input type="hidden" name="tel2" value="{{ $tel2 }}">
            <input type="hidden" name="tel3" value="{{ $tel3 }}">
            <input type="hidden" name="address" value="{{ $address }}">
            <input type="hidden" name="building" value="{{ $building }}">
            <input type="hidden" name="category_id" value="{{ $category_id }}">
            <input type="hidden" name="detail" value="{{ $detail }}">

            <button type="submit" class="confirm__button confirm__button--submit">
                送信
            </button>
        </form>

        <form action="/" method="post">
            @csrf
            <input type="hidden" name="last_name" value="{{ $last_name }}">
            <input type="hidden" name="first_name" value="{{ $first_name }}">
            <input type="hidden" name="gender" value="{{ $gender }}">
            <input type="hidden" name="email" value="{{ $email }}">
            <input type="hidden" name="tel1" value="{{ $tel1 }}">
            <input type="hidden" name="tel2" value="{{ $tel2 }}">
            <input type="hidden" name="tel3" value="{{ $tel3 }}">
            <input type="hidden" name="address" value="{{ $address }}">
            <input type="hidden" name="building" value="{{ $building }}">
            <input type="hidden" name="category_id" value="{{ $category_id }}">
            <input type="hidden" name="detail" value="{{ $detail }}">

            <button type="submit" class="confirm__button confirm__button--back">
                修正
            </button>
        </form>
    </div>
</div>
@endsection

