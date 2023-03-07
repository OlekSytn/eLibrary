<?php

namespace App\Http\Controllers;

use App\User;
use DataTables;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\ListSelectResource;

class BookController extends Controller
{
	public function index()
	{
		$books = Book::get();
		return BookResource::collection($books);
	}

	public function show(Book $book)
	{
		return new BookResource($book);
	}

	public function store(Request $request)
	{
		$book = new Book;
		$book->isbn = $request->isbn;
		$book->title = $request->title;
		$book->book_year = $request->book_year;
		$book->purchase_date = explode("T", $request->enter_date)[0];
		$book->category_id = $request->category_id;
		$book->publisher_id = $request->publisher_id;
		$book->author_id = $request->author_id;
		$book->status = $request->status;
		$book->save();
		return response()->json(['status' => 200], 200);
	}

	public function update(BookRequest $request, Book $book)
	{
		$book->isbn = $request->isbn;
		$book->title = $request->title;
		$book->book_year = $request->book_year;
		$book->purchase_date = explode("T", $request->enter_date)[0];
		$book->category_id = $request->category_id;
		$book->publisher_id = $request->publisher_id;
		$book->author_id = $request->author_id;
		$book->status = $request->status;
		$book->save();
		return response()->json(['status' => 200], 200);
	}

	public function destroy(Book $book)
	{
		$book->delete();
		return response()->json(['status' => 200], 200);
	}

	public function list()
  {
    return ListSelectResource::collection(Book::where('status', 1)->get());
	}
	
	public function search($keyword)
	{
		$books = Book::where('title', 'LIKE', '%'.$keyword.'%')->paginate(10);
		return BookResource::collection($books);
	}
}
