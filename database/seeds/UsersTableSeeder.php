<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
  	$faker = Faker::create('App\User');
  	for ($i=0; $i < 1; $i++) {
  		DB::table('users')->insert([
  			'name' 						=> $faker->name,
  			'address'					=> $faker->address,
  			'phone_number' 		=> $faker->phoneNumber,
  			'status' 					=> 'A',
  			'email' 					=> 'admin@tipa.co.id',
  			'password' 				=> '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm'
  		]);
  	}
  }
}
