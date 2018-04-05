<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Documento;
use App\Documento_tipo;
use App\DadosInscricao;
use App\Inscricao;

class documentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    
        $documento_tipo = Documento_tipo::all();
        $documento_tipo2 = Documento_tipo::all();
        $documento_tipo3 = Documento_tipo::all();
        $help = 1;
        return view('documento.index', compact('documento_tipo', 'documento_tipo2', 'documento_tipo3', 'help'));
    }
     
    public function create()
    {
       
    
        $documento_tipo = Documento_tipo::all();
        $documento_tipo2 = Documento_tipo::all();
        $documento_tipo3 = Documento_tipo::all();
        return view('documento.create', compact('documento_tipo', 'documento_tipo2', 'documento_tipo3'));
    }

    public function store(Request $request)
    {
        $document = new Documento;

       $this->validate($request, [
            'documento' => 'required|file'
         ]);
        
        $file = $request->file('documento');
        $document->url = $file->store('documento');
        $document->numero_documento = $request->numero_documento;
        $document->comentario = $request->comentario;
        $document->inscricao_id = $request->help;
        $document->documento_tipo_id = $request->doc_type; 
        $document->save(['timestamps' => false]);

        $document = new Documento;

        $this->validate($request, [
            'documento' => 'required|file'
         ]);
        
        $file = $request->file('documento2');
        $document->url = $file->store('documento');
        $document->numero_documento = $request->numero_documento;
        $document->comentario = $request->comentario2;
        $document->inscricao_id  = $request->help;
        $document->documento_tipo_id = $request->doc_type2; 
        $document->save(['timestamps' => false]);

        $document = new Documento;

        $this->validate($request, [
            'documento' => 'required|file'
         ]);
        
        $file = $request->file('documento3');
        $document->url = $file->store('documento');
        $document->numero_documento = $request->numero_documento3;
        $document->comentario = $request->comentario3;
        $document->inscricao_id = $request->help;
        $document->documento_tipo_id = $request->doc_type3; 
        $document->save(['timestamps' => false]);
        return view('home');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    }

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