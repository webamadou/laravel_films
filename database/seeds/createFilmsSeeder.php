<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class createFilmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->delete();
        $faker          = Faker::create('App\Films');
        $filmTitle      = [
            'Olympus Fallen','Black panther','Rampage','Pacific Rim','Dragon Ball goddess fight','Pacific Rim Uprising','Dragon Ball 2','Dragon Ball 3'
        ];
        for($i=0; $i<8; $i++) {
            $faker_name = $filmTitle[$faker->numberBetween(0, 7)] ;
            DB::table('films')->insert([
                [
                    'name'          => $faker_name,
                    'slug'          => str_slug($faker_name),
                    'description'   => $faker->paragraph(5, true),
                    'release_date'  => $faker->date(),
                    'rating'        => $faker->numberBetween(1, 5),
                    'ticket_price'  => $faker->numberBetween(10, 1000),
                    'country_id'    => $faker->numberBetween(1, 242),
                    'genre_id'      => $faker->numberBetween(1, 4),
                    'photo'         => $faker->numberBetween(1,8).'.jpg',
                    'created_at'    => \Carbon\Carbon::now(),
                    'updated_at'    => \Carbon\Carbon::now()
                ]
            ]);
        }
    }
}
