<?php

use Illuminate\Database\Seeder;
use App\Documento_tipo;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $document = new Documento_tipo;
        $document->nome = 'CPF';
        $document->descricao = 'Copia o CPF da pessoa';
        $document->save();

        $document = new Documento_tipo;
        $document->nome = 'Comprovante de Residência';
        $document->descricao = 'Documento que comprova a moradia do estudante';
        $document->save();

        $document = new Documento_tipo;
        $document->nome = 'Comprovante de Matrícula';
        $document->descricao = 'Documento que comprova a matrícula do estudante em uma instituição escolar';
        $document->save();

        $document = new Documento_tipo;
        $document->nome = 'Termo de Uso de Imagem e Voz';
        $document->descricao = 'Documento que comprova que os responsáveis estão de acordo com o uso de imagem e voz do estudante';
        $document->save();
    }
}
