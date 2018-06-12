<?php

use Illuminate\Database\Seeder;
use App\Tipos;
use App\Condicao;

class ConditionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Buscando os Tipos de Relatórios
            #______________________--String--_____________________#
            $tipo_string = Tipos::where('nome', '=', 'string') -> first();

            #______________________--Double--_____________________#
            $tipo_double = Tipos::where('nome', '=', 'double') -> first();

            #______________________--Tinyint--_____________________#
            $tipo_tinyint = Tipos::where('nome', '=', 'tinyint') -> first();

            #______________________--Int--_____________________#
            $tipo_int = Tipos::where('nome', '=', 'int') -> first();

            #______________________--Date--_____________________#
            $tipo_date = Tipos::where('nome', '=', 'date') -> first();
        
        # String
            #1
            $condition = new Condicao;
            $condition->nome = 'Igual a';
            $condition->condicao = 'REGEXP';
            $condition->tipo()->associate($tipo_string);
            $condition->save();

            #2
            $condition = new Condicao;
            $condition->nome = 'Diferente de';
            $condition->condicao = '!=';
            $condition->tipo()->associate($tipo_string);
            $condition->save();

        # Date
            # Normal
                # 1
                $condition = new Condicao;
                $condition->nome = 'Igual a';
                $condition->condicao = '=';
                $condition->tipo()->associate($tipo_date);
                $condition->save();

                #2
                $condition = new Condicao;
                $condition->nome = 'Diferente de';
                $condition->condicao = '!=';
                $condition->tipo()->associate($tipo_date);
                $condition->save();

                #3
                $condition = new Condicao;
                $condition->nome = 'Maior que';
                $condition->condicao = '>';
                $condition->tipo()->associate($tipo_date);
                $condition->save();

                #4
                $condition = new Condicao;
                $condition->nome = 'Menor que';
                $condition->condicao = '<';
                $condition->tipo()->associate($tipo_date);
                $condition->save();
            /*
            ** Pode não ser necessario
            # Year
                # 1
                $condition = new Condicao;
                $condition->nome = 'Igual ao ano';
                $condition->especial = 0;
                $condition->condicao = 'YEAR($table) =';
                $condition->tipo()->associate($tipo_date);
                $condition->save();

                #2
                $condition = new Condicao;
                $condition->nome = 'Diferente do ano';
                $condition->especial = 0;
                $condition->condicao = 'YEAR($table) !=';
                $condition->tipo()->associate($tipo_date);
                $condition->save();

                #3
                $condition = new Condicao;
                $condition->nome = 'Maior que o ano';
                $condition->especial = 0;
                $condition->condicao = 'YEAR($table) >';
                $condition->tipo()->associate($tipo_date);
                $condition->save();

                #4
                $condition = new Condicao;
                $condition->nome = 'Menor que o ano';
                $condition->especial = 0;
                $condition->condicao = 'YEAR($table) <';
                $condition->tipo()->associate($tipo_date);
                $condition->save();
            # Month
                # 1
                $condition = new Condicao;
                $condition->nome = 'Igual ao mês';
                $condition->especial = 0;
                $condition->condicao = 'MONTH($table) =';
                $condition->tipo()->associate($tipo_date);
                $condition->save();

                #2
                $condition = new Condicao;
                $condition->nome = 'Diferente do mês';
                $condition->especial = 0;
                $condition->condicao = 'MONTH($table) !=';
                $condition->tipo()->associate($tipo_date);
                $condition->save();

                #3
                $condition = new Condicao;
                $condition->nome = 'Maior que o mês';
                $condition->especial = 0;
                $condition->condicao = 'MONTH($table) >';
                $condition->tipo()->associate($tipo_date);
                $condition->save();

                #4
                $condition = new Condicao;
                $condition->nome = 'Menor que o mês';
                $condition->especial = 0;
                $condition->condicao = 'MONTH($table) <';
                $condition->tipo()->associate($tipo_date);
                $condition->save();
            # DAY
                # 1
                $condition = new Condicao;
                $condition->nome = 'Igual ao dia';
                $condition->especial = 0;
                $condition->condicao = 'DAY($table) =';
                $condition->tipo()->associate($tipo_date);
                $condition->save();

                #2
                $condition = new Condicao;
                $condition->nome = 'Diferente do dia';
                $condition->especial = 0;
                $condition->condicao = 'DAY($table) !=';
                $condition->tipo()->associate($tipo_date);
                $condition->save();

                #3
                $condition = new Condicao;
                $condition->nome = 'Maior que o dia';
                $condition->especial = 0;
                $condition->condicao = 'DAY($table) >';
                $condition->tipo()->associate($tipo_date);
                $condition->save();

                #4
                $condition = new Condicao;
                $condition->nome = 'Menor que o dia';
                $condition->especial = 0;
                $condition->condicao = 'DAY($table) <';
                $condition->tipo()->associate($tipo_date);
                $condition->save();
            */

        # Int
            #1
            $condition = new Condicao;
            $condition->nome = 'Igual a';
            $condition->condicao = '=';
            $condition->tipo()->associate($tipo_int);
            $condition->save();

            #2
            $condition = new Condicao;
            $condition->nome = 'Diferente de';
            $condition->condicao = '!=';
            $condition->tipo()->associate($tipo_int);
            $condition->save();

            #3
            $condition = new Condicao;
            $condition->nome = 'Maior que';
            $condition->condicao = '>';
            $condition->tipo()->associate($tipo_int);
            $condition->save();

            #4
            $condition = new Condicao;
            $condition->nome = 'Menor que';
            $condition->condicao = '<';
            $condition->tipo()->associate($tipo_int);
            $condition->save();
    }
}
