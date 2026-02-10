@extends('layouts.base')

@section('header-nav')
    <form action="/logout" method="post">
        @csrf
        <button type="submit" class="admin__button admin__button--logout">
            logout
        </button>
    </form>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/modal.css') }}">
@endsection

@section('page')
    <div class="admin">
        <div class="admin__inner">

            <h1 class="admin__title">Admin</h1>

            <form action="/search" method="get" class="admin-search">
                <div class="admin-search__row">

                    <label class="visually-hidden" for="keyword">名前 / メール</label>
                    <input id="keyword" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください"
                        value="{{ request('keyword') }}">

                    <label class="visually-hidden" for="gender">性別</label>
                    <select id="gender" name="gender">
                        <option value="">性別</option>
                        <option value="all" {{ request('gender') === 'all' ? 'selected' : '' }}>全て</option>
                        <option value="1" {{ request('gender') === '1' ? 'selected' : '' }}>男性</option>
                        <option value="2" {{ request('gender') === '2' ? 'selected' : '' }}>女性</option>
                        <option value="3" {{ request('gender') === '3' ? 'selected' : '' }}>その他</option>
                    </select>

                    <label class="visually-hidden" for="category_id">お問い合わせ種別</label>
                    <select id="category_id" name="category_id">
                        <option value="">お問い合わせの種類</option>
                        <option value="1" {{ request('category_id') == 1 ? 'selected' : '' }}>1.商品のお届けについて</option>
                        <option value="2" {{ request('category_id') == 2 ? 'selected' : '' }}>2.商品の交換について</option>
                        <option value="3" {{ request('category_id') == 3 ? 'selected' : '' }}>3.商品トラブル</option>
                        <option value="4" {{ request('category_id') == 4 ? 'selected' : '' }}>4.ショップへのお問い合わせ</option>
                        <option value="5" {{ request('category_id') == 5 ? 'selected' : '' }}>5.その他</option>
                    </select>

                    <label class="visually-hidden" for="created_at">日付</label>
                    <input id="created_at" type="date" name="created_at" value="{{ request('created_at') }}">

                    <div class="admin-search__buttons">
                        <button type="submit" class="admin__button admin__button--search">
                            検索
                        </button>
                        <a href="/reset" class="admin__button admin__button--reset">
                            リセット
                        </a>
                    </div>

                </div>

                <div class="admin-search__footer">
                {{ $contacts->links('pagination::bootstrap-4') }}
                </div>

            </form>
        </div>

        <div class="admin-table">
            <table>
                <thead>
                    <tr>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>お問い合わせ種別</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                            <td>{{ $genders[$contact->gender] ?? '' }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->category->content }}</td>
                            <td>
                                <a href="#detail-modal-{{ $contact->id }}" class="admin__button admin__button-detail">
                                    詳細
                                </a>
                            </td>
                        </tr>

                        @include('admin._detail-modal', ['contact' => $contact])
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
