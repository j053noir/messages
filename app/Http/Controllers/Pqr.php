<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pqr As modelPqr;

class Pqr extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // $pqrs = modelPqr::where('estado', 1)->get();
        $pqrs = modelPqr::get();
        // return View para creacion de PQR
        return view('pqr/index', ["pqrs" => $pqrs, "name" => "Abraham"]);
    }

    public function create()
    {
        return View('pqr/create', ["save" => null]);
    }

    public function crearPqr(Request $request)
    {
        $validatedData = $request->validate([
            'description' => 'required|max:255',
        ]);
        $description = $request->description;
        $new = new modelPqr;
        $new->description = $description;
        $new->solution = "N";
        $new->estado = 0;
        $ok = $new->save();
        return View('pqr/create', ["save" => $ok, "obj" => $new]);
    }

    public function update($id = 0)
    {
        $pqr = modelPqr::where('id', $id)->first();
        if(empty($pqr)){
            $existe = false;
            return View('pqr/update', ["existe" => $existe]);
        }else{
            $existe = true;
            return View('pqr/update', ["existe" => $existe, "pqr" => $pqr]);
        }
    }

    public function responderPqr(Request $request, $id = 0)
    {
        $validatedData = $request->validate([
            'id' => 'required',
            'solution' => 'required|max:255',
        ]);        
        
        $id = $request->id;
        $solution = $request->solution;
        // obtenemos el pqr por Id y que este en estado 0
        $model = modelPqr::where('id', $id)->where('estado',0)->first();
        if(empty($model)){
            $existe = false;
            return View('pqr/update', ["existe" => $existe]);
        }else{
            // modificamos el registro
            $model->estado = 1;
            $model->solution = $solution;
            $model->updated_at = date('Y-m-d H:i:s');
            $ok = $model->save();

            $existe = true;
            return View('pqr/update', ["existe" => $existe, "pqr" => $model]);
        }
    }
}
