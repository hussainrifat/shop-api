<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Auth;


class userController extends Controller
{
    public function createUser(Request $request){


        $name=$request->name;
        $email=$request->email;
        $number=$request->number;
        $address=$request->address;
        $district=$request->district;
        $postal_code=$request->postal_code;
        $password=Hash::make($request->password);

        $data                       = new user();
        $data-> name                = $name;
        $data-> number              = $number;
        $data-> email               = $email;
        $data-> password            = $password;
        $data-> address             = $address;
        $data-> district            = $district;
        $data-> postal_code         = $postal_code;
        $result                     = $data->save();


            if($result){
                return ["Result" => "User Created Successfully"];
            }
    
            else
            {
                return ["Result" => "Operation Failed"];
            }
    
    }



    public function login(Request $req)
    {
        $credentials = array(
            'number' => $req->number,
            'password'=>$req->password
            );

        $user= user::where(['number'=>$req->number])->first();


        if ($user) {

            if (auth()->attempt($credentials)) {
                return ["Result" => "You Are Logged In"];
            }

            else{
                return ["Result" => "Credintials Not Match"];
            }    
    }
    else{
        return ["Result" => "Credintials Not Match"];
    }

    }
}
