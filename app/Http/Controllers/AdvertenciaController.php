<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\statusOcorrenciaAdvertencia;
use App\Participante;
use App\Ocorrencia;
use App\Advertencia;
use App\Colaborador;
use App\Matricula;
use App\RoleUser;
use App\Role;
use App\Pessoa;
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
        $advertencia = Advertencia::All();
        $tipo = statusOcorrenciaAdvertencia::All();
        return view('advertencia.index', compact('tipo', 'role', 'user_id','advertencia','ocorrencia'));
       
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
        $advertencia = Advertencia::All();
        $role_user = RoleUser::where('user_id', Auth::user()->id )->first();
        $role = Role::find($role_user->role_id);
        return view('advertencia.create', compact('tipo', 'role', 'user_id','advertencia','ocorrencia'));
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
        $formulario = new Advertencia; 
        $colaborador = new Colaborador;
        $matricula = new Matricula;
        $advertencia= new Advertencia;
        $tipo = statusOcorrenciaAdvertencia::All();

        $role_user = RoleUser::where('user_id', Auth::user()->id )->first();
        $role = Role::find($role_user->role_id);

        $colaborador = Colaborador::where('user_id', auth()->user()->id)->first();
        $formulario->colaborador =  $colaborador->id; //colaborador que esta gerando advertencia
        $formulario->data_advertencia = $request->data; //data da avertência
        $formulario->providencia =  $request->providencia; //proviência a ser gerada
        $formulario->observacao = $request->observacao;
        $formulario->tipo_ocorrencia_advertencia=$request->tipo;
        $formulario->ocorrencia_id = $request->ocorrencia_id;

        $formulario->save();

        return view('advertencia.create', compact('tipo','role','user_id'),[
            'message' => 'Advertencia gerada com sucesso'
        ]);


    }
    public function gerar(Request $request)
    {
        return view('advertencia.gerar');
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
        $advertencia = Advertencia::find($id);
        $colaborador = Colaborador::find($advertencia->colaborador);
        $tipo = statusOcorrenciaAdvertencia::find($advertencia->tipo_ocorrencia_advertencia); //o tipo da ocorrencia visitada
        $nomeAdvertencia = statusOcorrenciaAdvertencia::find($tipo->id);
        $t= statusOcorrenciaAdvertencia::All(); //todos os tipos armazenados em t
        $pessoa = Pessoa::find($colaborador->pessoa_id);

        return view('advertencia.show',compact('advertencia','id','tipo','nomeAdvertencia','t','colaborador','pessoa'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advertencia = Advertencia::find($id);
        $colaborador = Colaborador::find($advertencia->colaborador);
        $tipo = statusOcorrenciaAdvertencia::find($advertencia->tipo_ocorrencia_advertencia); //o tipo da ocorrencia visitada
        $nomeAdvertencia = statusOcorrenciaAdvertencia::find($tipo->id);
        $t= statusOcorrenciaAdvertencia::All(); //todos os tipos armazenados em t
        $pessoa = Pessoa::find($colaborador->pessoa_id);

        return view('advertencia.edit',compact('advertencia','id','tipo','nomeAdvertencia','t','colaborador','pessoa'));

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
        $ocorrencia = Ocorrencia::All();
        $advertencia = Advertencia::All();

        $tipo = statusOcorrenciaAdvertencia::All();
        $role_user = RoleUser::where('user_id', Auth::user()->id )->first();
        $role = Role::find($role_user->role_id);
      
        $advertenc = Advertencia::find($id);

        $advertenc->ocorrencia_id = $advertenc->ocorrencia_id;
        $advertenc->tipo_ocorrencia_advertencia = $request->tipo;
        $advertenc->data_advertencia = $request->data;
        $advertenc->agressor = $request->agressor;
        $advertenc->providencia = $request->providencia;
        $advertenc->observacao = $request->observacao;

        $advertenc->save();


        return view('advertencia.create', compact('tipo','role','user_id','advertencia', 'ocorrencia'),[
            'message' => 'Advertencia gerada com sucesso'
        ]);

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
    public function remove($id)
    {
        $ocorrencia = Ocorrencia::All();
        $advertencia = Advertencia::All();
        $tipo = statusOcorrenciaAdvertencia::All();
        $role_user = RoleUser::where('user_id', Auth::user()->id )->first();
        $role = Role::find($role_user->role_id);

        $advertencia = Advertencia::where("id", $id)->delete();
      
        $tipo = statusOcorrenciaAdvertencia::All();

        return view('advertencia.create', compact('tipo','role','user_id','advertencia', 'ocorrencia'),[
            'message' => 'Advertência excluída com sucesso'
        ]);
    }
}
