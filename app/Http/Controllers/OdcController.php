<?php

namespace App\Http\Controllers;

use App\OdcModel;
use Illuminate\Http\Request;

class OdcController extends Controller
{

    public function all()
    {
        return response()->json(OdcModel::all());
    }

    public function get($id)
    {
        $odcModel = OdcModel::where('id_odc', '=', $id)->first();

        if($odcModel != null) {
            return response()->json($odcModel);
        } else {
            return response()->json("Data not found", 404);
        }
    }

    public function add(Request $request)
    {
//        var_dump($request->json()->all());
        $odcModel = OdcModel::create($request->json()->all());

        return response()->json($odcModel, 201);
    }

    public function put($id, Request $request)
    {
//        $odcModel = OdcModel::findOrFail($id);
        $odcModel = OdcModel::where('id_odc', '=', $id)->first();
        $odcModel->update($request->json()->all());

        return response()->json($odcModel, 200);
    }

    public function delete($id)
    {
        OdcModel::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}