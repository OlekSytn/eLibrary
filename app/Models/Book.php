<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	public function category()
	{
		return $this->belongsTo('App\Models\Category', 'category_id');
	}

	public function publisher()
	{
		return $this->belongsTo('App\Models\Publisher', 'publisher_id');
	}

	public function author()
	{
		return $this->belongsTo('App\Models\Author', 'author_id');
	}
}
