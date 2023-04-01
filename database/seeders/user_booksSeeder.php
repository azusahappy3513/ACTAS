<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use App\Models\User_books;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class user_booksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::get();
        $books = Book::get();

        foreach ($users as $user) {

            $count = rand(3, 5);
            $random_books = $books->shuffle()->slice(0, $count);   // ランダムで３〜５件のbook情報を取得

            foreach ($random_books as $random_books) {

                $user_books = new User_books();
                $user_books->user_id = $user->id;
                $user_books->books_id = $random_books->id;
                $user_books->save();

            }

        }
    }
}
