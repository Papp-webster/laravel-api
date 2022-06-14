<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, string $token, string $q = '')
    {
        $publisher = DB::table('db_publisher')
        ->select('id')
        ->where('api_token', $token)
        ->first();

        $query = DB::table('user')
        ->where('db_publisher_id', $publisher->id);

        if( ! empty($q)){
            $query->where(function($query) use ($q){
                $query->where('name', 'like', '%'. $q .'%')
                ->orWhere('name_last', 'like', '%' . $q . '%')
                ->orWhere('email', 'like', '%' . $q . '%')
                ->orWhere('address_city', 'like', '%' . $q . '%');
            });
        }

        $data['users'] = $query->get();

        return view('welcome', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function users(Request $request, string $token, string $q = '')
    {
        $publisher = DB::table('db_publisher')
        ->select('id')
        ->where('api_token', $token)
        ->first();

        $query = DB::table('user')
        ->where('db_publisher_id', $publisher->id);

        if( ! empty($q)){
            $query->where(function($query) use ($q){
                $query->where('name', 'like', '%'. $q .'%')
                ->orWhere('name_last', 'like', '%' . $q . '%')
                ->orWhere('email', 'like', '%' . $q . '%')
                ->orWhere('address_city', 'like', '%' . $q . '%');
            });
        }

        $users = $query->get();

        return response()->json($users);
    }

    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = DB::table('user')->get();
        return response()->json($users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

}
