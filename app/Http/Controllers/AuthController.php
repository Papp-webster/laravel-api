<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {

         $user_token = array(
                'api_token' => $request->api_token,
            );

            
        return response()->json(['message' => 'Belépett!']);
          
      
       
    }

    
}
