<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 3) as $num) {
            DB::table('books')->insert([
                'folder_id' => 1,
                'title' => "サンプルタスク {$num}",
                'writer' => "サンプル作者 {$num}",
                'description' => "これはサンプルです。",
                'due_date' => Carbon::now()->addDay(14),
                'status' => $num,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
