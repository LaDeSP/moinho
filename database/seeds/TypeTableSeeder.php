<?php

use App\Tipos;
use Illuminate\Database\Seeder;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Criar os tipos
        #1
        $type               = new Tipos;
        $type->nome         = "string";
        $type->input        = "text";
        $type->save();

        #2
        $type               = new Tipos;
        $type->nome         = "double";
        $type->input        = "number";        
        $type->save();        

        #3
        $type               = new Tipos;
        $type->nome         = "tinyint";
        $type->input        = "number";        
        $type->save();

        #4
        $type               = new Tipos;
        $type->nome         = "date";
        $type->input        = "date";                
        $type->save();

        #5
        $type               = new Tipos;
        $type->nome         = "date";
        $type->tipo         = "year";
        $type->input        = "date"; 
        $type->save();

        #6
        $type               = new Tipos;
        $type->nome         = "date";
        $type->tipo         = "month";
        $type->input        = "date"; 
        $type->save();

        #7
        $type               = new Tipos;
        $type->nome         = "date";
        $type->tipo         = "day";
        $type->input        = "date"; 
        $type->save();
    }
}
