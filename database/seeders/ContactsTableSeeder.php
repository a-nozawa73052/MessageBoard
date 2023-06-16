<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


/* データベース操作用のファサードを読み込み */
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert(
            [
                'name' => 'ぱぴぷぺぽ',
                'mail' => 'aaaaaa@aaaaa.com',
                'destination' => 'aaaaa@otodoke.com',
                'message' => '今日はカレーだね',
                'status' => '済'
            ]
        );
    }
}
