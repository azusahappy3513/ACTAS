<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Book;
use Illuminate\Http\Request;

class MatchingController extends Controller
{
    const MIN_MATCHING_COUNT = 1;

    public function show(User $user)
    {
        $books_ids = $user->books->pluck('id');
        $matched_users = User::with(['books' => function($query) use($books_ids){ // 同じ課題本を取得

            $query->whereIn('books_id', $books_ids);

        }])
        ->where('id', '!=', $user->id)  // 自分以外のデータを取得
        ->get()
        ->filter(function($matched_user){ // 最低でも `MIN_MATCHING_COUNT` 以上マッチするものだけ

            return ($matched_user->books->count() >= self::MIN_MATCHING_COUNT);

        })
        ->sortByDesc(function($matched_user) { // マッチした本で並べ替え（降順）

            return $matched_user->books->count();

        });

        return view('matching')->with([
            'user' => $user,
            'matched_users' => $matched_users
        ]);
    }
}
