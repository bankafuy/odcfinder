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
        $userModel = UserModel::create($request->json()->all());

        return response()->json($userModel, 201);
    }

    public function put($id, Request $request)
    {
        $userModel = UserModel::where('id', '=', $id)->first();
        $userModel->update($request->json()->all());

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