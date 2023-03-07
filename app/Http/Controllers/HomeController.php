<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Book;
use App\Models\Loan;

class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  // public function __construct()
  // {
  //   $this->middleware('auth');
  // }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */
  public function index()
  {
    $members = User::where('status', 'M')->paginate(5);
    $books = Book::where('status', 1)->paginate(10);
    $loans = Loan::where('return_date', '')->paginate(5);
    return view('home', compact('members', 'books', 'loans'));
  }

  public function globalInfo()
  {
    $members = User::where('status', 'M')->count();
    $books = Book::where('status', 1)->count();
    $loans = Loan::whereNull('return_date')->count();
    $total_loans = Loan::count();
    return response()->json([
      'members' => number_format($members,0,'.','.'),
      'books' => number_format($books,0,'.','.'),
      'loans' => number_format($loans,0,'.','.'),
      'total_loans' => number_format($total_loans,0,'.','.')
    ]);
  }
}
