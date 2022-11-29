<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enterprise;
use Illuminate\Http\Request;

class EnterpriseController extends Controller
{
    public function enterprises(Request $request)
    {
        $enterprises = Enterprise::all();
        return response()->json($enterprises);

    }
}


