<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Http\Requests\UserRequest;

use App\User;

class MemberController extends Controller
{
	public function __construct()
	{
		return $this->middleware('auth');
	}
	public function index()
	{
		return view('member.index');
	}
	public function show(Request $request)
	{
		// return $request->anggotum;
		$data = User::findorfail($request->anggotum);
		return view('member.show', compact('data'));
	}
	public function store(UserRequest $request)
	{
		return $request;
	}
	public function create()
	{
		return view('member.create');		
	}
	public function data()
	{
    $members = User::where('status', 'M')->get();
		return Datatables::of($members)
					              ->addColumn('action', function ($members) {
					                return '<div style="text-align:center">
					                	<a href="anggota/'.$members->id.'" class="btn btn-xs btn-success">Detail</a>
					                	<a href="anggota/'.$members->id.'/edit" class="btn btn-xs btn-warning">Ubah</a>
					                	<a href="anggota/'.$members->id.'" class="btn btn-xs btn-danger">Hapus</a>
					                </div>';
					              })
                        ->rawColumns(['action'])
					              ->make(true);
	}
}
