<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AuthorsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
		$faker = Faker::create('App\Models\Author');
  	for ($i=0; $i < 10; $i++) {
  		DB::table('authors')->insert([
  			'name'						=> $faker->name,
  			'address' 				=> $faker->address,
  			'phone_number'		=> $faker->e164PhoneNumber
  		]);
  	}
  }
}
