<?php

return [
    'required' => ':attribute を入力してください',
    'email' => ':attribute はメールアドレス形式で入力してください。',
    'unique' => ':attribute はすでに使用されています。',
    'min' => [
        'string' => ':attribute は :min 文字以上で入力してください',
    ],
    'max' => [
        'string' => ':attribute は :max 文字以内で入力してください。',
    ],

    'attributes' => [
        'name' => '名前',
        'email' => 'メールアドレス',
        'password' => 'パスワード',
    ],
];
