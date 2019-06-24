<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class Daily_ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('daily_reports')->truncate();
        DB::table('daily_reports')->insert([
            [
                'title'      =>'テスト',
                'content'    =>'テスト',
                'created_at' => Carbon::create(2019, 03, 06),
                'updated_at' => Carbon::create(2019, 03, 06),
            ],
        ]);
    }
}
