<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function all()
    {
        return response()->json(UserModel::all());
    }

    public function get($id)
    {
        $userModel = UserModel::where('id', '=', $id)->first();

        if($userModel != null) {
            return response()->json($userModel);
        } else {
            return response()->json("Data not found", 404);
        }
    }

    public function getByUsername($username)
    {
        $userModel = UserModel::where('username', '=', $username)->first();

        if($userModel != null) {
            return response()->json($userModel);
        } else {
            return response()->json("Data not found", 404);
        }
    }

    public function add(Request $request)
    {
        $userModel = $request->json()->all();
        $userModel['password'] = md5($userModel['password']);
        $userModel = UserModel::create($userModel);
        return response()->json($userModel, 201);
    }

    public function put($id, Request $request)
    {
        $userModel = UserModel::where('id', '=', $id)->first();
        $newRequest = $request->except(['password']);
        //$newUserModel = $newRequest->json()->all();
        $userModel->update($newRequest);

        return response()->json($userModel, 200);
    }

    public function delete($id)
    {
        UserModel::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

    public function savePhoto($id, Request $request)
    {
        $userModel = UserModel::where('id', '=', $id)->first();
        $userModel->photo = $request->json()->photo;
        $userModel->save();

        return response()->json($userModel, 200);
    }

}