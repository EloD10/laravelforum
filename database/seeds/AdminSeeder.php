<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'a',
            'email' => 'a@a.com',
            'password' => '$2y$10$IdIRW1C7uukh7yJahvIbaupMZiG1iWx0ef4k7ApVYLp/PAW9rI10a',
            'role' => 1
        ]);
    }
}
