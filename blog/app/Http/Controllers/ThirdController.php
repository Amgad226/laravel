<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThirdController extends Controller
{
    public function check(Request $request)
    {
        return response()->json([
            'message' => 'success'
        ]);
    }
}
