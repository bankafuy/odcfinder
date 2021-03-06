<?php

namespace App\Http\Controllers;

use App\OdcModel;
use Illuminate\Http\Request;

class OdcController extends Controller
{

    public function all(Request $request)
    {
        $paramName = strtolower($request->get('name'));

        if($paramName != null) {
            $listUsers = OdcModel::whereRaw("LOWER(`nama_odc`) like '%" . $paramName . "%' ")->get();
            return response()->json($listUsers);
        } else {
            return response()->json(OdcModel::all());
        }
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
        $odcModel = OdcModel::create($request->json()->all());

        return response()->json($odcModel, 201);
    }

    public function put($id, Request $request)
    {
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