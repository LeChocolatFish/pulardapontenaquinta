<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $regAdmin = Admin::all();
        $contador = $regAdmin->count();

        return Response()->json($regAdmin);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'NM_admin' => 'required|string|max:255',
            'email_admin' => 'required|string|email|max:255|unique:admin',
            'senha' => 'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'succes' => false,
                'message' => 'registros inválidos',
                'errors' => $validator->errors()], 422);
        }

        $registros = Admin::create($request->all());
        if ($registros) {
            return response()->json([
                'success' => true,
                'message' => 'admin cadastrado com sucessso',
                'data' => $registros
            ],201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'admin não cadastrado',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(admin $admin)
    {
        $regAdmin = admin::find($id);

        if ($regAdmin) {
            return 'admin encontrado';
            $regAdmin.Response()->json([],Response.HTTP_NO_CONTENT);
        }else{
            return 'admin não encontrado';
            Response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admin $admin)
    {
        $validator = Validator::make($request->all(), [
            'NM_admin' => 'required|string|max:255',
            'email_admin' => 'required|string|email|max:255|unique:admin',
            'senha' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'registros inválidos',
                'errors' => $validator->errors()], 400);
        }

        $regAdminBanco = admin::find($id);

        if (!$regAdminBanco) {
            return response()->json([
                'success' => false,
                'message' => 'admin não encontrado',
            ], 400);
        }

        $regAdminBanco->Nm_admin = $request->Nm_admin;
        $regAdminBanco->email_admin = $request->email_admin;
        $regAdminBanco->senha = $request->senha;

        if ($regAdminBanco->save()) {
            return response()->json([
                'success' => true,
                'message' => 'admin atualizado com sucesso',
                'data' => $regAdminBanco
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'admin não atualizado',   
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(admin $admin)
    {
        $regAdmin = admin::find($id);

        if (!$regAdmin) {
            return response()->json([
                'success' => false,
                'message' => 'admin não encontrado',   
            ], 404);
        }

        if ($regAdmin->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'admin deletado com sucesso',
            ],200);
        }
    }
}
