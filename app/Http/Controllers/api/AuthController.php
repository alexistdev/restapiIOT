<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Author: Alexsander Hendra Wijaya
     * NPM: 1811010007
     * TEKNIK INFORMATIKA
     * Email: alexistdev@gmail.com
     * web:https://alexistdev.com
     * IBI Darmajaya
     */

    public function login (Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
             return response()->json([
                 'message' => 'Password tidak sesuai',
             ], 401);
        } else {
            return response()->json([
                'message' => 'Success',
                'token' => "wakanda",
            ], 200);
        }
    }

}
