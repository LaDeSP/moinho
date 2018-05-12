<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\statusOcorrenciaAdvertencia;
use App\Participante;
use App\Ocorrencia;
use App\Colaborador;
use App\RoleUser;
use App\Role;
use Auth;



class AdvertenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ocorrencia = Ocorrencia::All();
        $colaborador= Colaborador::All();
        $participante= Participante::All();
        $tipo = statusOcorrenciaAdvertencia::All();
        return view('advertencia.index', compact('tipo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipo = statusOcorrenciaAdvertencia::All();
        $user_id = Auth::user()->id;
        $ocorrencia = Ocorrencia::All();
        $role_user = RoleUser::where('user_id', Auth::user()->id )->first();
        $role = Role::find($role_user->role_id);
        return view('advertencia.create', compact('tipo', 'role', 'user_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
