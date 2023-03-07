<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
  	$faker = Faker::create('App\Models\Book');
  	for ($i=0; $i < 1450; $i++) {
  		DB::table('books')->insert([
  			'isbn'						=> $faker->isbn13,
  			'title' 					=> $faker->sentence,
  			'publisher_id'		=> rand(1,10),
  			'author_id' 			=> rand(1,10),
  			'book_year' 			=> '2018',
  			'status' 					=> 1,
  			'purchase_date' 	=> '2018-12-12'
  		]);
  	}
  }
}
