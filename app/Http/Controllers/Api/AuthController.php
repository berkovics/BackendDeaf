<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ResponseController;
use App\Http\Reguests\UserRegisterChecker;
use App\Http\Requests\UserLoginChecker;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function register(UserRegisterChecker $request){
        $request->validated();

        $input = $request->all();
        $input["name"] = $request->get("name");
        $input["email"] = $request->get("email");
        $input["password"] = bcrypt($input["password"]);

        $user = User::create($input);
        $success["name"] = $user->name;

        return $this->sendResponse($success, "Sikeres regisztáció");
    }

    public function login(UserLoginChecker $request){
        //$request->validated();
        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $bannedtime = (new BannController)->getBannedTime($request->email);
            (new BannController)->resetBannedData($request->email);
            $authUser = Auth::user();

            $success["token"] = $authUser->createToken($authUser->name."token")->plainTextToken;
            $success["name"] = $authUser->name;
        }

        return $this->sendResponse($success, "Sikweres bejelentkezés");
    }

    public function logout(){
        auth("sanctum")->user()->currentAccessToken()->delete();

        return $this->sendResponse([], "Sikeres kijelentkezés");
    }
}
