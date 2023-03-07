<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Requests\PenerbitRequest;
use App\Http\Resources\PenerbitResource;
use App\Http\Resources\ListSelectResource;

class PenerbitController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    $publishers = Publisher::latest()->get();
    return PenerbitResource::collection($publishers);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PenerbitRequest $request)
  {
    $penerbit = Publisher::create($request->all());
    return response()->json(['status' => 201, 'data' => new PenerbitResource($penerbit)], 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Publisher $publisher)
  {
    return new PenerbitResource($publisher);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(PenerbitRequest $request, Publisher $publisher)
  {
    $publisher->update($request->all());
    return response()->json(['status' => 200], 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Publisher $publisher)
  {
    $publisher->delete();
    return response()->json(['status' => 200], 200);
  }

  public function list()
  {
    return ListSelectResource::collection(Publisher::get());
  }
}
