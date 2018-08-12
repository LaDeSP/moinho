<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zizaco\Entrust\EntrustFacade as Entrust;

class FileController extends Controller
{
    public function store(Request $request)
    {
        $allowed = array( 'pdf' );
        foreach( $request->document as $documento ){
            $imageName = $documento->getClientOriginalName();
            $ext = explode( '.', $imageName );
            $ext = strtolower( end( $ext ) );
            if( in_array( $ext, $allowed ) ){
                $newFileName = uniqid('', true).'.'.$ext;
                $documento->move(
                    base_path() . '/public/document/', $newFileName
                );
                return redirect()->back()->with('success', 'Sucesso ao enviar os documentos');
            } else {
                return redirect()->back()->with('err', 'Erro ao salvar a imagem: '.$imageName.', Tipo do arquivo não é aceitado! Só aceitamos PDF');
            }
        }
    }
}
