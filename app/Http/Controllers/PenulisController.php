<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Requests\PenulisRequest;
use App\Http\Resources\PenulisResource;
use App\Http\Resources\ListSelectResource;

class PenulisController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $authors = Author::get();
    return PenulisResource::collection($authors);
  }
  
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PenulisRequest $request)
  {
    $author = Author::create($request->all());
    return response()->json(['status' => 201], 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Author $author)
  {
    return new PenulisResource($author);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(PenulisRequest $request, Author $author)
  {
    $author->update($request->all());
    return response()->json(['status' => 200], 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Author $author)
  {
    $author->delete();
    return response()->json(['status' => 200], 200);
  }

  public function list()
  {
    return ListSelectResource::collection(Author::get());
  }
}
