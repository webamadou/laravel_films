<?php

use Illuminate\Database\Seeder;

class createGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->delete();
        $genres = [
            ['name'=> 'Drama','slug'=>'drama','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            ['name'=> 'Romance','slug'=>'romance','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            ['name'=> 'Horror','slug'=>'Horror','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()],
            ['name'=> 'Comedy','slug'=>'comedy','created_at'=>\Carbon\Carbon::now(),'updated_at'=>\Carbon\Carbon::now()]
        ];
        DB::table('genres')->insert($genres);
    }
}
