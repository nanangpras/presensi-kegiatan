<?php

namespace App\Http\Controllers\Warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MaisahController extends Controller
{
    public function add(Request $request)
    {
        dd($request->all());
    }
}
