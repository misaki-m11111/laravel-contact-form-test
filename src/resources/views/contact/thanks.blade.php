@extends('layouts.base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/contact/thanks.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact/contact-common.css') }}">
@endsection

@section('page')
    <div class="thanks">
        <p class="thanks__message">
            お問い合わせありがとうございました
        </p>

        <div class="thanks__button">
            <a href="/" class="thanks__button contact__button--home">
                HOME
            </a>
        </div>
    </div>
@endsection
