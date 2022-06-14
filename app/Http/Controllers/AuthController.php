<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    public function login(Request $request) {

        $request->validate([
            'id' => 'required',
            'api_token' => 'required',
        ]);

        $credetials = request(['id', 'api_token']);

        $users = DB::table('db_publisher')->get();

        if (!$credetials) {
        
            return response()->json('Belépés csak tokenel!', 401);

       }
    
       return response()->json(['message' => 'Belépett!']);

    
}

}
