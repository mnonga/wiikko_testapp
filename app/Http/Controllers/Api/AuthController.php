<?php


namespace App\Http\Controllers\Api;


use App\Comment;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AuthController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login(Request $request)
    {
        $user = User::where("email", $request->request->get("email"))->first();
        if($user){
            $valid = Hash::check($request->request->get("password"), $user->password);
            if($valid){
                $token = Str::random(60);
                $user->api_token = hash('sha256', $token);
                $user->save();
                return response()->json($user);
            }
        }
        return response()->json(["message"=>"Echec"], 401);

    }

}
