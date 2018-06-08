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

            #______________________--Date--_____________________#
            $tipo_date = Tipos::where('nome', '=', 'date') -> first();

            #______________________--Date Year--_____________________#
            $tipo_date_year = Tipos::where('tipo', '=', 'year') -> first();

            #______________________--Date Month--_____________________#
            $tipo_date_month = Tipos::where('tipo', '=', 'month') -> first();
            
            #______________________--Date day--_____________________#
            $tipo_date_day = Tipos::where('tipo', '=', 'day') -> first();
        
        # String
        #1
        $condition = new Condicao;
        $condition->nome = 'Igual a';
        $condition->condicao = '=';
        $condition->tipo()->associate($tipo_string);
        $condition->save();

        #2
        $condition = new Condicao;
        $condition->nome = 'Diferente de';
        $condition->condicao = '!=';
        $condition->tipo()->associate($tipo_string);
        $condition->save();

        # Date
        #1
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
    }
}
