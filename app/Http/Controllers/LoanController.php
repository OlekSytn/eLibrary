<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use Illuminate\Http\Request;
use App\Http\Requests\LoanRequest;
use App\Http\Resources\LoanResource;

class LoanController extends Controller
{
  public function index()
  {
    return LoanResource::collection(Loan::get());
  }
  
  public function store(LoanRequest $request)
  {
    // return date("Y-m-d");
    $loan = new Loan;
    $loan->book_id = $request->book['id'];
    $loan->loan_date = date("Y-m-d");
    $loan->member_id = $request->member['id'];
    $loan->must_returned_date = explode("T", $request->must_returned_date)[0];
    $loan->save();
    return response()->json(['status' => 200], 200);
  }
  
  public function show(Loan $loan)
  {
    return new LoanResource($loan);
  }
  
  public function update(LoanRequest $request, Loan $loan)
  {
    $loan->book_id = $request->book['id'];
    $loan->loan_date = explode("T", $request->loan_date)[0];
    $loan->member_id = $request->member_id;
    $loan->must_returned_date = explode("T", $request->must_returned_date)[0];
    $loan->save();
    return response()->json(['status' => 200], 200);
  }
  
  public function destroy(Loan $loan)
  {
    $loan->delete();
    return response()->json(['status' => 200], 200);
  }

  public function borroweds()
  {
    return LoanResource::collection(Loan::whereNull('return_date')->get());
  }

  public function returnBook(Request $request, $id)
  {
    $loan = Loan::find($id);
    $loan->return_date = $request->return_date;
    $loan->save();
    return LoanResource::collection(Loan::whereNull('return_date')->get());
  }
}
