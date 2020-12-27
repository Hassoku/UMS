<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\AddUserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
         
        return view('user.index');
    }

    public function getData(){
        return response()->json(['results'=>User::paginate(5)]);
    }

    public function addData(AddUserRequest $request){

        $user = User::create($request->only('name','email','role')+['password' => Hash::make($request->password)]);
        return response()->json(['user',$user]);
    }

    public function deleteData(User $user){

        return "Successfully Delete {$user->user}";
    }
}
