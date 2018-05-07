<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ocorrencia;
use App\Colaborador;
use App\Participante;
use App\statusOcorrenciaAdvertencia;
use App\Pessoa;

class OcorrenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ocorrencia = Ocorrencia::All();
        $colaborador= Colaborador::All();
        $participante= Participante::All();
        $tipo = statusOcorrenciaAdvertencia::All();
        return view('ocorrencia.index', compact('tipo'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo = statusOcorrenciaAdvertencia::All();
        $ocorrencia= Ocorrencia::All();
        return view('ocorrencia.create', compact('tipo'));
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
        $formulario = new Ocorrencia; 
        $colaborador = new Colaborador;
        $participante = new Participante;
        $tipo = statusOcorrenciaAdvertencia::All();

            $formulario->motivo = $request->motivo;
            $formulario->data_ocorrencia = $request->data;
            $formulario->participante_id = $request->participante_id;
            $colaborador = Colaborador::where('user_id', auth()->user()->id)->first();
            $formulario->colaborador_id =  $colaborador->id;  
            $formulario->tipo_ocorrencia_advertencia = $request->tipo;
            $formulario->save();
          
            return view('ocorrencia.create', compact('tipo'),[
                'message' => 'Ocorrencia enviada com sucesso'
            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ocorrencia = Ocorrencia::find($id);
        $colaborador = Colaborador::find($ocorrencia->colaborador_id);
        $tipo = statusOcorrenciaAdvertencia::find($ocorrencia->tipo_ocorrencia_advertencia); //o tipo da ocorrencia visitada
        $nomeOcorrencia = statusOcorrenciaAdvertencia::find($tipo->id);
        $pessoa = Pessoa::find($colaborador->pessoa_id);
        $t= statusOcorrenciaAdvertencia::All(); //todos os tipos armazenados em t

        return view('ocorrencia.show',compact('id','t','ocorrencia','colaborador','nomeOcorrencia','pessoa'));
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
        $ocorrencia = Ocorrencia::find($id);
        $colaborador = Colaborador::find($ocorrencia->colaborador_id);
        $tipo = statusOcorrenciaAdvertencia::find($ocorrencia->tipo_ocorrencia_advertencia); //o tipo da ocorrencia visitada
        $nomeOcorrencia = statusOcorrenciaAdvertencia::find($tipo->id);
        $pessoa = Pessoa::find($colaborador->pessoa_id);
        $t= statusOcorrenciaAdvertencia::All(); //todos os tipos armazenados em t

        return view('ocorrencia.edit',compact('id','t','ocorrencia','colaborador','nomeOcorrencia','pessoa'));
  
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
        $ocorrencia = Ocorrencia::find($id);
        $colaborador = Colaborador::find($ocorrencia->colaborador_id);
        $tipo = statusOcorrenciaAdvertencia::All();
        
            $ocorrencia->motivo = $request->motivo; //atualizando a descrição do motivo advertencia
            $ocorrencia->data_ocorrencia = $request->data; //atualiza a data da ocorrencia
            $ocorrencia->participante_id = $request->participante_id; //nome do participante que na verdade será id
            $colaborador = Colaborador::where('user_id', auth()->user()->id)->first(); //encontra o usuário no BD
            $ocorrencia->colaborador_id =  $colaborador->id;  //armazena o ususario na ocorrencia
            $ocorrencia->tipo_ocorrencia_advertencia = $request->tipo; 
            
            $ocorrencia->save();


            return view('ocorrencia.create', compact('tipo'),[
                'message' => 'Ocorrencia alterada com sucesso'
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
}
