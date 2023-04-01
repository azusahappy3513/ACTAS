<?php

namespace Database\Seeders;

use App\Models\Book;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class booksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $books_names = [
            '公式TOEIC Listening & Reading 問題集',       
            'TOEIC L&Rテスト レベル別問題集 860点突破',
            'TOEIC L&Rテスト レベル別問題集 730点突破',
            'TOEIC L&Rテスト レベル別問題集 600点突破',
            'TOEIC L&Rテスト 文法問題 でる1000問',
            'TOEIC® L&R TEST長文読解問題集 TARGET 900',            
         ];

        foreach ($books_names as $books_name) {

            $books = new Book();
            $books->item_name = $books_name;
            // $books->item_number = $books_number;
            // $books->item_amount = $books_amount;
            // $books->updated_at = $books_updated;
            // $books->created_at = $books_created;
            $books->save();

        }

        // foreach ($books_number as $books_number) {

        //     $books = new Book();
        //     $books->item_number = $books_number;
        //     // $books->item_amount = $books_amount;
        //     // $books->updated_at = $books_updated;
        //     // $books->created_at = $books_created;
        //     $books->save();

        // }



    }
}
