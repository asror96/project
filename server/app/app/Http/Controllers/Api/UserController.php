<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\LoginResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use http\Env\Response;
use App\Events\UserRegistrationEvent;
class UserController extends Controller
{
    public function create(StoreUserRequest $request)
    {
        $data=$request->validated();
        $again=$data['password_again'];
        if($again==$data['password']){
            unset($data['password_again']);
            $password=bcrypt($data['password']);
            unset($data['password']);
            $data['password']=$password;
            $data['role_id']=2;
            $users=User::create($data);
            event(new UserRegistrationEvent($users));
            return new UserResource($users);
        }
        else{
            return response()->json(['Not correct password entry!'],400);
        }

    }

    public function login(LoginUserRequest $request){
        $data=$request->validated();
        if (! $token = auth()->attempt($data)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $token;
        return new LoginResource($token);
    }
}
