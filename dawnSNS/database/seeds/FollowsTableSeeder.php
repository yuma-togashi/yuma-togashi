<?php

use Illuminate\Database\Seeder;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 2; $i <= 10; $i++) {
            DB::table('follows')->insert([
                'follow' => $i,
                'follower' => 1
            ]);
        }
    }
}
