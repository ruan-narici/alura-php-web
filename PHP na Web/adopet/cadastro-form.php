<?php

require_once __DIR__ . "/src/Model/Cpf.php";
require_once __DIR__ . "/src/Model/birthDate.php";
require_once __DIR__ . "/src/Model/Phone.php";
require_once __DIR__ . "/src/Model/Address.php";
require_once __DIR__ . "/src/Model/Cnpj.php";
require_once __DIR__ . "/src/Model/Person.php";
require_once __DIR__ . "/src/Model/PhysicalPerson.php";
require_once __DIR__ . "/src/Model/LegalPerson.php";

header("Content-type: Application/json");

$nomeForm = filter_input(INPUT_POST,"nome");
$emailForm = filter_input(INPUT_POST,"email");
$cpfForm = filter_input(INPUT_POST,"cpf");
$cnpjForm = filter_input(INPUT_POST,"cnpj");
$cepForm = filter_input(INPUT_POST,"cep");
$cidadeForm = filter_input(INPUT_POST,"cidade");
$logradouroForm = filter_input(INPUT_POST,'logradouro');
$bairroForm = filter_input(INPUT_POST,"bairro");
$estadoForm = filter_input(INPUT_POST,'estado');
$numeroForm = filter_input(INPUT_POST,'numero');
$dataForm = filter_input(INPUT_POST, "data");
$telefoneForm = filter_input(INPUT_POST,"telefone");

$endereco = new Address($cepForm,$cidadeForm,$estadoForm, $logradouroForm, $bairroForm, $numeroForm);
$dataNascimento = new birthDate($dataForm);
$telefone = new Phone($telefoneForm);

if ($cpfForm !== null){
    $cpf = new Cpf($cpfForm);
    $pessoa = new PhysicalPerson($nomeForm,$emailForm,$endereco,$dataNascimento,$telefone, $cpf);
}

if($cnpjForm !== null){
    $cnpj = new Cnpj($cnpjForm);
    $pessoa = new LegalPerson($nomeForm,$emailForm,$endereco,$dataNascimento,$telefone, $cnpj);
}

echo json_encode($pessoa);
?>