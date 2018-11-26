<?php
require('../../config/connectionSQL.php');
include ('../../classes/pessoa.php');
include("../../config/configPagina.php");

$retorno = false;
$email             = $_POST['email'];
$senha             = $_POST['password'];
$nomePessoa        = $_POST['nome'];
$sobrenomePessoa   = $_POST['sobrenome'];
$cep               = $_POST['cep'];
$rua               = $_POST['rua'];
$numero            = $_POST['numero'];
$descricao         = $_POST['descricao'];
$cidade            = $_POST['cidade'];
$bairro            = $_POST['bairro'];
$uf                = $_POST['uf'];
$autonomo          = $_POST['autonomo'];
$celular           = $_POST['celular'];
$localizacao       = $_POST['localizacao'];

$cadPessoa = new Pessoa();
$cadPessoa->nomePessoa = $nomePessoa;
$cadPessoa->sobrenomePessoa = $sobrenomePessoa;
$cadPessoa->cep = $cep;
$cadPessoa->rua = $rua;
$cadPessoa->numero = $numero;
$cadPessoa->descricao = $descricao;
$cadPessoa->bairro = $bairro;
$cadPessoa->cidade = $cidade;
$cadPessoa->uf = $uf;
$cadPessoa->autonomo = $autonomo;
$cadPessoa->celular = $celular;
$cadPessoa->email = $email;
$cadPessoa->senha = $senha;
$cadPessoa->localizacao = $localizacao;

if ($cadPessoa->cadastrarPessoa($cadPessoa)){
	$retorno = true;
}
echo $retorno;