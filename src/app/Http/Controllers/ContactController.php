<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\Category;

class ContactController extends Controller
{
public function index(Request $request)
{
    $data = $request->only([
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel1',
        'tel2',
        'tel3',
        'address',
        'building',
        'category_id',
        'detail',
    ]);

    $data['categories'] = Category::all();

    return view('contact.index', $data);
}


public function confirm(ContactRequest $request)
{
    $data = $request->only([
        'last_name',
        'first_name',
        'gender',
        'email',
        'tel1',
        'tel2',
        'tel3',
        'address',
        'building',
        'category_id',
        'detail',
    ]);

    $data['tel'] = $data['tel1'].'-'.$data['tel2'].'-'.$data['tel3'];

    $genderLabels = [
        1 => '男性',
        2 => '女性',
        3 => 'その他',
    ];
    $data['gender_label'] = $genderLabels[$data['gender']] ?? '';

    $category = Category::find($data['category_id']);
    $data['category_label'] = $category ? $category->content : '';

    return view('contact.confirm', $data);
}

    public function store(Request $request)
    {
        $data = $request->only([
            'last_name',
            'first_name',
            'gender',
            'email',
            'tel1',
            'tel2',
            'tel3',
            'address',
            'building',
            'category_id',
            'detail',
        ]);

        $data['tel'] = $data['tel1'] . '-' . $data['tel2'] . '-' . $data['tel3'];

        unset($data['tel1'], $data['tel2'], $data['tel3']);

        Contact::create($data);

        return view('contact.thanks');
    }
}
