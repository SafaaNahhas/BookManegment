<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
            /**
         * API Registerx
         *
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         */
        public function register(Request $request)
        {

            $validator = Validator::make(  $request->all(),  [
                'name' => 'unique:users|required',
                'email'    => 'unique:users|required',
                'password' => 'required',
            ]);


            if ($validator->fails()) {
                return response()->json(['success' => false, 'error' => $validator->errors()],422);
            }
            $name = $request->name;
            $email    = $request->email;
            $password = $request->password;
            $user     = User::create(['name' => $name, 'email' => $email, 'password' => Hash::make($password)]);
            return response()->json(['success' => true, 'data' => $user],200);


        }
        public function login(Request $request){
            $request->validate([
            'email' => ['required','email','exists:users,email'],
            'password' =>['required','string'],
            ]);
            if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
                $user=Auth::user();
                $token=$user->createToken('sanctum',[])->plainTextToken;
                return response()->json([
                    'user'=>$user,
                    'token'=>$token,],
                    200);
            }
            return response()->json(false);
        }

        public function logout(Request $request){
            $request->user()->currentAccessToken()->delete();

            return response()->json(['message'=>'successfully logout'
                                    //  'data'=>$request=>user()
        ],200);

        }

}
