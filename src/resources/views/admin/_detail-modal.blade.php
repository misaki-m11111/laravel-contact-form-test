<div id="detail-modal-{{ $contact->id }}" class="modal">

    <div class="modal__overlay"></div>

    <div class="modal__content">
        <a href="#" class="modal__close">×</a>

        <dl class="modal__list">
            <dt>お名前</dt>
            <dd>{{ $contact->last_name }} {{ $contact->first_name }}</dd>

            <dt>性別</dt>
            <dd>{{ $genders[$contact->gender] ?? '' }}</dd>

            <dt>メールアドレス</dt>
            <dd>{{ $contact->email }}</dd>

            <dt>電話番号</dt>
            <dd>{{ $contact->tel }}</dd>

            <dt>住所</dt>
            <dd>{{ $contact->address }}</dd>

            <dt>建物名</dt>
            <dd>{{ $contact->building }}</dd>

            <dt>お問い合わせの種類</dt>
            <dd>{{ $contact->category->content }}</dd>

            <dt>お問い合わせ内容</dt>
            <dd class="modal__detail">
                {{ $contact->detail }}
            </dd>
        </dl>

        <form action="/admin/{{ $contact->id }}" method="post" class="modal__footer">
            @csrf
            @method('DELETE')
            <button type="submit" class="modal__delete">削除</button>
        </form>
    </div>
</div>
