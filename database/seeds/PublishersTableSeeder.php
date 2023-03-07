<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PublishersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
		$faker = Faker::create('App\Models\Publisher');
  	for ($i=0; $i < 10; $i++) {
  		DB::table('publishers')->insert([
  			'name'						=> $faker->name,
  			'address' 				=> $faker->address,
  			'phone_number'		=> $faker->e164PhoneNumber
  		]);
  	}
  }
}
