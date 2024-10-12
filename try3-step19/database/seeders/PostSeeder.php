<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // //10/12トライ　create() ではなく factory()へ変更 ⇨特に意味がなかった
    // public function run(): void
    // {
    //     \App\Models\Post::factory([
    //         'title' => 'テスト',
    //         'body' => 'シーダーのテストを実施します。',
    //         'user_id' => 1,
    //     ]);
    // }

    public function run(): void
    {
        \App\Models\Post::create([
            'title' => 'テスト',
            'body' => 'シーダーのテストを実施します。',
            'user_id' => 1,
        ]);
    }
}
