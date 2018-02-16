<?php

use Illuminate\Database\Seeder;

class InitRepository extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $threads = factory('App\Thread', 50)->create();
		$threads->each(function ($thread) { factory('App\Replies', 10)->create(['thread_id' => $thread->id]); });
	}
}
