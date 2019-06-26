<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminUsersTableSeeder::class,
            UsersTableSeeder::class,
            TagCategoriesSeeder::class,
            QuestionsTableSeeder::class,
            CommentsTableSeeder::class,
            AttendanceSeeder::class,
            Daily_ReportsTableSeeder::class
        ]);
    }
}

