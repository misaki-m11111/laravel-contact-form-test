<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class AdminController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('category')->paginate(7);

        $genders = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];

        return view('admin.index', compact('contacts', 'genders'));
    }

    public function search(Request $request)
    {
        $query = Contact::query();

        if ($request->filled('keyword')) {
            $keyword = str_replace([' ', '　'], '', $request->keyword);

            $query->where(function ($q) use ($request, $keyword) {
                $q->where('last_name', 'like', "%{$request->keyword}%")
                    ->orWhere('first_name', 'like', "%{$request->keyword}%")
                    ->orWhereRaw(
                        "REPLACE(CONCAT(last_name, first_name), ' ', '') LIKE ?",
                        ["%{$keyword}%"]
                    )
                    ->orWhere('email', 'like', "%{$request->keyword}%");
            });
        }

        if ($request->filled('gender') && $request->gender !== 'all') {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        $contacts = $query
            ->with('category')
            ->paginate(10);

        $genders = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ];

        return view('admin.index', compact('contacts', 'genders'));
    }

    public function reset()
    {
        return redirect('/admin');
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect('/admin');
    }
}
