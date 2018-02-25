<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        DB::table('users')->insert([
            'name' => 'sid',
            'email' => 'imsidzluv@gmail.com',
            'admin' => '1',
            'password' => bcrypt('gebdandi'),
            'created_at' => Carbon::now(),
        ]);

        
        $faker = Faker\Factory::create();

        $limit = 33;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([ //,
                'name' => $faker->name,
                'email' => $faker->unique()->email,
                'password' => bcrypt('gebdandi'),
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
