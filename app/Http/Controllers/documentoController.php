<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;
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
        $allowed = array( 'pdf' );
        //dd($request->documento);
        foreach( $request->documento as $key => $documento ){
            $imageName = $documento->getClientOriginalName();
            $ext = explode( '.', $imageName );
            $ext = strtolower( end( $ext ) );
            if( in_array( $ext, $allowed ) ){
                $newFileName = uniqid('', true).'.'.$ext;
                /**
                 * Enviar para o banco de dados as informações
                 */
                $doc = new Documento;
                $doc->url = '/document/'.$newFileName;
                $doc->documento_numero = $request->numero_documento[$key];
                $doc->comentario = $request->comentario[$key];
        
                $doc->inscricao()->associate(Inscricao::find($request->help));
                $doc->documento_tipo()->associate(Documento_tipo::find($request->doc_type[$key]));
                $doc->save();
                /**
                 * Fim do envio
                 */
                $documento->move(
                    base_path() . '/public/document/', $newFileName
                );
            } else {
                return redirect()->back()->with('err', 'Erro ao salvar a imagem: '.$imageName.', Tipo do arquivo não é aceitado! Só aceitamos PDF');
            }
        }
        return redirect()->back()->with('success', 'Sucesso ao enviar os documentos');
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
        $documento_tipo = Documento_tipo::all();
        $documento = Documento::where('inscricao_id', $id)->get();
        $help = $id;

        return view('documento.edit', compact('documento_tipo', 'documento', 'help', 'id'));
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
        #var_dump($request->id);
        $allowed = array( 'pdf' );
        $resp = '';
        foreach($request->id as $key => $entrada){
            if( $entrada == 0 || $entrada == null ){
                echo 'Novo ';
                if( $request->comentario[$key] == null || $request->doc_type[$key] == null || $request->numero_documento[$key] == null || is_string($request->documento) == true ){
                    echo 'Informações faltando ';
                    $resp = $resp.'O documento de numero: '.( (string) $request->numero_documento[$key]).' está faltando informações. ';
                } else {
                    $documento = $request->documento[$key];
                    $imageName = $documento->getClientOriginalName();
                    $ext = explode( '.', $imageName );
                    $ext = strtolower( end( $ext ) );
                    if( in_array( $ext, $allowed ) ){
                        $newFileName = uniqid('', true).'.'.$ext;
                        /**
                         * Enviar para o banco de dados as informações
                         */
                        $doc = new Documento;
                        $doc->url = '/document/'.$newFileName;
                        $doc->documento_numero = $request->numero_documento[$key];
                        $doc->comentario = $request->comentario[$key];
                
                        $doc->inscricao()->associate(Inscricao::find($id));
                        $doc->documento_tipo()->associate(Documento_tipo::find($request->doc_type[$key]));
                        $doc->save();
                        /**
                         * Fim do envio
                         */
                        $documento->move(
                            base_path() . '/public/document/', $newFileName
                        );
                        $resp = $resp.'Documento de numero: '.( (string) $request->numero_documento[$key]).' adicionado com sucesso. ';
                    } else {
                        $resp = $resp.'Erro ao salvar a imagem de numero: '.( (string) $request->numero_documento[$key]).', Tipo do arquivo não é aceitado! Só aceitamos PDF. ';
                    }
                }
            }
            else{
                if( $this->exists($request->excluir, $entrada) == false ){
                    $doc = Documento::find($entrada);
                    if( $request->comentario[$key] == null || $request->doc_type[$key] == null || $request->numero_documento[$key] == null){
                        $resp = $resp.'Erro ao alterar as infomações do documento de numero: '.( (string) $request->numero_documento[$key]).', Informações faltando. ';                        
                    } else {
                        $doc->documento_numero = $request->numero_documento[$key];
                        $doc->comentario = $request->comentario[$key];
                        $doc->documento_tipo()->associate(Documento_tipo::find($request->doc_type[$key]));
                        $doc->save();
                        $resp = $resp.'Sucesso ao alterar as infomações do documento de numero: '.( (string) $request->numero_documento[$key]).'. ';                        
                    }
                    if( is_string($request->documento) != true && isset($request->documento[$key])){
                        $documento = $request->documento[$key];
                        $imageName = $documento->getClientOriginalName();
                        $ext = explode( '.', $imageName );
                        $ext = strtolower( end( $ext ) );
                        if( in_array( $ext, $allowed ) ){
                            $newFileName = uniqid('', true).'.'.$ext;
                            /**
                             * Enviar para o banco de dados as informações
                             */
                            $doc->url = '/document/'.$newFileName;
                            $doc->save();
                            /**
                             * Fim do envio
                             */
                            $documento->move(
                                base_path() . '/public/document/', $newFileName
                            );
                            $resp = $resp.'Documento de numero: '.( (string) $request->numero_documento[$key]).' alterado com sucesso. ';
                        } else {
                            $resp = $resp.'Erro ao alterar a imagem de numero: '.( (string) $request->numero_documento[$key]).', Tipo do arquivo não é aceitado! Só aceitamos PDF. ';
                        }
                    }
                }
            }
        }
        if( $request->excluir != null )
            foreach($request->excluir as $id_excluir){
                $documento = Documento::find($id_excluir);
                File::delete( base_path() ."/public{$documento->url}");
                $documento->delete();
            }
        #dd($request->documento);
        #var_dump($request->excluir);
        return redirect()->back()->with('success', 'Alteração feita com sucesso. '.$resp);
    }

    public function exists($excluir, $id){
        if( $excluir != null )
            foreach($excluir as $id_excluir){
                if( $id_excluir == $id )
                    return true;
            }
        return false;
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