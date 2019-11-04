<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use JwtAuth;
class UserController extends Controller
{
    public function show()
    {
    	return Auth::guard('api')->user();
    }
    public function update(Request $request)
    {
    	$user = Auth::guard('api')->user();
        $user->name = $request->name; // $request->input('name')
        $user->last_name = $request->last_name;
    	$user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->email = $request->email;
    	$user->save();
    	JwtAuth::clearCache($user);
    }
}