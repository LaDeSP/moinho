<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ocorrencia;
use App\Colaborador;
use App\Matricula;
use App\statusOcorrenciaAdvertencia;
use App\Pessoa;
use App\Advertencia;

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
        $matricula= Matricula::All();
        $tipo = statusOcorrenciaAdvertencia::All();
        return view('ocorrencia.index', compact('tipo','matricula','colaborador','ocorrencia'));

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
        return view('ocorrencia.create', compact('tipo','ocorrencia'));
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
        $tipo = statusOcorrenciaAdvertencia::All();

        if(!isset($request->motivo)){
            return view('ocorrencia.create', compact('tipo'),[
                'error' => 'Error ao gerar Ocorrência sem motivo (campo obrigatório)!'
            ]);
        }

        $formulario = new Ocorrencia; 
        $colaborador = new Colaborador;
        $matricula = new Matricula;

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
       // $nomeOcorrencia = statusOcorrenciaAdvertencia::find($tipo->id);
        $pessoa = Pessoa::find($colaborador->pessoa_id);
        $t= statusOcorrenciaAdvertencia::All(); //todos os tipos armazenados em t

        return view('ocorrencia.show',compact('t','ocorrencia','tipo','pessoa'));
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

        return view('ocorrencia.edit',compact('t','ocorrencia','colaborador','tipo','pessoa'));
  
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
        $tipo = statusOcorrenciaAdvertencia::All();
        
        if(!isset($request->motivo)){
            return view('ocorrencia.create', compact('tipo'),[
                'error' => 'Error ao editar Ocorrência sem motivo (campo obrigatório)!'
            ]);
        }
        
        $ocorrencia = Ocorrencia::find($id);
        $colaborador = Colaborador::find($ocorrencia->colaborador_id);
        $participante = Matricula::find($ocorrencia->participante_id);


            $ocorrencia->motivo = $request->motivo; //atualizando a descrição do motivo advertencia
            $ocorrencia->data_ocorrencia = $request->data; //atualiza a data da ocorrencia
            $ocorrencia->participante_id = $ocorrencia->participante_id; //nome do participante que na verdade será id
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

    public function remove($id)
    {
        $ocorrencia = Ocorrencia::find($id);

        $advertencia = Advertencia::where("ocorrencia_id", $id)->delete();

        $ocorrencia = $ocorrencia->delete();

        $tipo = statusOcorrenciaAdvertencia::All();

        return view('ocorrencia.create', compact('tipo'),[
            'message' => 'Ocorrencia e Advertência excluída com sucesso'
        ]);
    }
}
