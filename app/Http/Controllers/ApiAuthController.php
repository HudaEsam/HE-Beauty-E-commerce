<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
        public function register(Request $request)
        {
            $validator =Validator::make($request->all(),[
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users|max:255',
                'password' => 'required|min:8|confirmed',
            ]);
            if($validator->fails()){
                return response()->json([
                    "errors"=>$validator->errors()
                ],301);
            }
            $password=bcrypt($request->password);
            $accessToken=Str::random(64);
            User::create([
                "name"=>$request->name,
                "email"=>$request->email,
                "password"=>$password,
                "access_token"=>$accessToken,
            ]);
            return response()->json([
                "success"=>"User registered successuflly",
                "access_token"=>$accessToken
            ],201);
        }
        public function login(Request $request)
        {
            $validator =Validator::make($request->all(),[
                'email' => 'required|email|max:255',
                'password'=>'required|min:8',
            ]);
            if($validator->fails()){
                return response()->json([
                    "errors"=>$validator->errors()
                ],300);
            }
            $user=User::where("email","=",$request->email)->first();
            if($user!==null){
                $oldPassword=$user->password;
                $accessToken=Str::random(64);
                $isVerified = Hash::check($request->password, $oldPassword);
                if($isVerified){
                    $user->update([
                        "access_token"=>$accessToken

                    ]);
                    return response()->json([
                        "success"=>"You loggedin successuflly",
                        "access_token"=>$accessToken
                
                    ],200);

                }
                else{
                    return response()->json([
                        "msg"=>"credintails not correct"
                    ],404);
                }
            }
            else{
                return response()->json([
                    "msg"=>"This account not exist"
                ],404);
            }
                

        }
        public function logout(Request $request){
            $access_token=$request->header("access_token");
            if($access_token !==null){
                $user=User::where("access_token","=",$access_token)->first();
                if($user!==null){
                    $user->update([
                        "access_token"=>null
                    ]);
                    return response()->json([
                        "success"=>"You logged out successuflly",
                
                    ],200);
                   }
                else{
                return response()->json([
                    "msg"=>"Access Token Not Correct"
                ],404);
                } 
            } 
            else{
                return response()->json([
                    "msg"=>"Access Token Not found"
                ],404);
            }

            
        }
        }

        

    

