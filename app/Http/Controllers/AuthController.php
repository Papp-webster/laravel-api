<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(Request $request) {
      
       return new JsonResponse(['message' => 'Belépett!']);
    }

    
}
