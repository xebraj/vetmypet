<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FirebaseController extends Controller
{
    public function sendAll(Request $request)
    {
        dd($request->all());
    }
}
