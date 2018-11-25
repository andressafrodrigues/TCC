<?php
	require('../../config/connectionSQL.php');
	include ('../../classes/pessoa.php');
	include("../../config/configPagina.php");

	$idpessoa			=	$_POST['editaUser_id'];
	$email				= 	$_POST['editaUser_email'];
	$senha             	= 	$_POST['editaUser_password'];
	$nomePessoa        	= 	$_POST['editaUser_nome'];
	$sobrenomePessoa   	= 	$_POST['editaUser_sobrenome'];
	$cep               	= 	$_POST['editaUser_cep'];
	$rua               	= 	$_POST['editaUser_rua'];
	$numero            	= 	$_POST['editaUser_numero'];
	$descricao         	= 	$_POST['editaUser_descricao'];
	$cidade            	= 	$_POST['editaUser_cidade'];
	$bairro            	= 	$_POST['editaUser_bairro'];
	$uf                	= 	$_POST['editaUser_uf'];
	$autonomo          	= 	$_POST['editaUser_autonomo'];
	$celular           	=	$_POST['editaUser_celular'];

	$usuario = new Pessoa();
	$usuario->idPessoa 			= 	$idpessoa;
	$usuario->nomePessoa 		= 	$nomePessoa;
	$usuario->sobrenomePessoa	= 	$sobrenomePessoa;
	$usuario->cep 				= 	$cep;
	$usuario->rua 				= 	$rua;
	$usuario->numero 			= 	$numero;
	$usuario->descricao 		= 	$descricao;
	$usuario->bairro 			= 	$bairro;
	$usuario->cidade 			= 	$cidade;
	$usuario->uf 				= 	$uf;
	$usuario->autonomo 			= 	$autonomo;
	$usuario->celular 			= 	$celular;
	$usuario->email 			= 	$email;
	$usuario->senha 			= 	$senha;

	$returnoJson = $usuario->updateUsuario($usuario);
	$returnJson 	=	json_encode($returnoJson);
	echo $returnJson;