<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Resources\Json\Resource;

class BookResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $publisher = [];
        if ($this->publisher) {
            $publisher = [
                'id' => $this->publisher->id,
                'name' => $this->publisher->name,
                'address' => $this->publisher->address,
                'phone_number' => $this->publisher->phone_number
            ];
        }
        $author = [];
        if ($this->author) {
            $author = [
                'id' => $this->author->id,
                'name' => $this->author->name,
                'address' => $this->author->address,
                'phone_number' => $this->author->phone_number
            ];
        }
        $category = [];
        if ($this->category) {
            $category = [
                'id' => $this->category->id,
                'name' => $this->category->name
            ];
        }
        return [
            'id' => $this->id,
            'isbn' => $this->isbn,
            'title' => $this->title,
            'thumbnail' => $this->thumbnail,
            'book_year' => $this->book_year,
            'purchase_date' => date("d-M-Y", strtotime($this->purchase_date)),
            'enter_date' => $this->purchase_date,
            'category_id' => $this->category->id,
            'category_name' => $this->category->name,
            'publisher_id' => $this->publisher_id,
            'author_id' => $this->author_id,
            'status' => $this->status,
            'category' => $category,
            'publisher' => $publisher,
            'author' => $author
        ];
    }
}
