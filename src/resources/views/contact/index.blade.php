@extends('layouts.base')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/contact/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact/contact-common.css') }}">
@endsection

@section('page')
    <div class="contact">
        <div class="contact__inner">
            <h1 class="contact__title">Contact</h1>

            <form action="/confirm" method="post">
                @csrf

                <div class="contact__group">
                    <label class="contact__label">
                        お名前 <span class="contact__required">※</span>
                    </label>

                    <div class="contact__field">
                        <div class="contact__row">
                            <div class="contact__name-item">
                                <input type="text" name="last_name" class="contact__input"
                                    value="{{ old('last_name', $last_name ?? '') }}" placeholder="例：山田">

                                @if ($errors->has('last_name'))
                                    <p class="contact__error">{{ $errors->first('last_name') }}</p>
                                @endif
                            </div>

                            <div class="contact__name-item">
                                <input type="text" name="first_name" class="contact__input"
                                    value="{{ old('first_name', $first_name ?? '') }}" placeholder="例：太郎">

                                @if ($errors->has('first_name'))
                                    <p class="contact__error">{{ $errors->first('first_name') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contact__group">
                    <label class="contact__label">
                        性別 <span class="contact__required">※</span>
                    </label>

                    <div class="contact__field">
                        <div class="contact__radio">
                            <label>
                                <input type="radio" name="gender" value="1"
                                    {{ old('gender', $gender ?? '') === '1' ? 'checked' : '' }}>
                                男性
                            </label>

                            <label>
                                <input type="radio" name="gender" value="2"
                                    {{ old('gender', $gender ?? '') === '2' ? 'checked' : '' }}>
                                女性
                            </label>

                            <label>
                                <input type="radio" name="gender" value="3"
                                    {{ old('gender', $gender ?? '') === '3' ? 'checked' : '' }}>
                                その他
                            </label>
                        </div>

                        @error('gender')
                            <p class="contact__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="contact__group">
                    <label class="contact__label">
                        メールアドレス <span class="contact__required">※</span>
                    </label>

                    <div class="contact__field">
                        <input type="text" name="email" class="contact__input"
                            value="{{ old('email', $email ?? '') }}" placeholder="例：test@example.com">

                        @error('email')
                            <p class="contact__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="contact__group">
                    <label class="contact__label">
                        電話番号 <span class="contact__required">※</span>
                    </label>

                    <div class="contact__field">
                        <div class="contact__row">
                            <input type="tel" name="tel1" class="contact__input"
                                value="{{ old('tel1', $tel1 ?? '') }}" placeholder="080">
                            <span>―</span>
                            <input type="tel" name="tel2" class="contact__input"
                                value="{{ old('tel2', $tel2 ?? '') }}" placeholder="1234">
                            <span>―</span>
                            <input type="tel" name="tel3" class="contact__input"
                                value="{{ old('tel3', $tel3 ?? '') }}" placeholder="5678">
                        </div>

                        @if ($errors->has('tel1') || $errors->has('tel2') || $errors->has('tel3'))
                            <p class="contact__error">
                                {{ $errors->first('tel1') ?? ($errors->first('tel2') ?? $errors->first('tel3')) }}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="contact__group">
                    <label class="contact__label">
                        住所 <span class="contact__required">※</span>
                    </label>

                    <div class="contact__field">
                        <input type="text" name="address" class="contact__input"
                            value="{{ old('address', $address ?? '') }}" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3">

                        @error('address')
                            <p class="contact__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="contact__group">
                    <label class="contact__label">
                        建物名
                    </label>

                    <div class="contact__field">
                        <input type="text" name="building" class="contact__input"
                            value="{{ old('building', $building ?? '') }}" placeholder="例：千駄ヶ谷マンション101">
                    </div>
                </div>

                <div class="contact__group">
                    <label class="contact__label">
                        お問い合わせの種類 <span class="contact__required">※</span>
                    </label>

                    <div class="contact__field">
                        <select name="category_id" class="contact__select">
                            <option value="">選択してください</option>

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $category_id ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->content }}
                                </option>
                            @endforeach
                        </select>

                        @error('category_id')
                            <p class="contact__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="contact__group">
                    <label class="contact__label">
                        お問い合わせ内容 <span class="contact__required">※</span>
                    </label>

                    <div class="contact__field">
                        <textarea name="detail" class="contact__textarea" rows="5" placeholder="お問い合わせ内容をご記載ください">{{ old('detail', $detail ?? '') }}</textarea>

                        @error('detail')
                            <p class="contact__error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="contact__button">
                    <button type="submit" class="contact__button--confirm">
                        確認画面
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
