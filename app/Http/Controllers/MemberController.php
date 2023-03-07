<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\MemberResource;
use App\Http\Resources\ListSelectResource;

class MemberController extends Controller
{
  public function __construct()
  {
    $this->middleware('JWT', ['except' => ['search']]);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return MemberResource::collection(User::where('status', 'M')->get());
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(UserRequest $request)
  {
    // return $request->all();
    $member = User::create($request->all());
    return response()->json(['status' => 201, 'data' => new MemberResource($member)], 201);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(User $member)
  {
    return new MemberResource($member);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $member)
  {
    $member->update($request->all());
    return response()->json(['status' => 200], 200);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }

  public function list()
  {
    return ListSelectResource::collection(User::where('status', 'M')->get());
  }

  public function search($keyword)
	{
		$members = User::where('status', 'M')->where('name', 'LIKE', '%'.$keyword.'%')->paginate(10);
		return MemberResource::collection($members);
	}
}
