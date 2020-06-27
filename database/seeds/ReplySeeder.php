<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('replies')->insert([
            'comment_id'=>1,
            'user_id'=>1,
            'body'=>'Thank you',
            'created_at'=>Carbon::now()->toDateTimeString(),
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);
    }
}
