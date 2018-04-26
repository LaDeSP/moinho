<?php

use Faker\Generator as Faker;
use App\User;
use App\Pessoa;
use App\Endereco;
use App\Contato;

$factory->define(App\Colaborador::class, function (Faker $faker) {
    $user = new User;
    $user -> name = $faker -> name;
    $user -> email = $faker -> unique() -> safeEmail;
    $user -> password = bcrypt("MC/01");
    $user -> save();
    
    $endereco = new Endereco;
    $endereco -> rua = $faker -> streetAddress;
    $endereco -> bairro = $faker -> streetName;
    $endereco -> numero = $faker -> buildingNumber;
    $endereco -> complemento = "Nenhum";
    $endereco -> cep = $faker -> postcode;
    $endereco -> cidade = $faker -> city;
    $endereco -> estado = $faker -> state;
    $endereco -> pais = $faker -> country;
    $endereco -> save();

    $contato = new Contato;
    $contato -> numero_fixo = $faker -> phoneNumber;
    $contato -> celular1 = $faker -> phoneNumber;
    $contato -> celular2 = $faker -> phoneNumber;
    $contato -> email = $faker -> freeEmail;
    $contato -> save();

    $pessoa = new Pessoa;
    $pessoa -> nome = $faker -> name;
    $pessoa -> cpf = rand(100000000, 999999999);
    $pessoa -> data_nascimento = $faker -> date;
    $pessoa -> endereco_id = $endereco -> id;
    $pessoa -> contato_id = $contato -> id;
    $pessoa -> save();
    

    return [
        'ano_ingreco' => $faker->year,
        'area_atuacao' => $faker->jobTitle,
        'user_id' => $user -> id,
        'pessoa_id' => $pessoa -> id,
        'tipo_colaborador_id' => rand(1,5)
    ];
});
