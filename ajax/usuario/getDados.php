<?php
	require('../../config/connectionSQL.php');
	include ('../../classes/pessoa.php');
	include("../../config/configPagina.php");
	
	$ret		=	new \stdClass();
	$idpessoa	=	$_POST['editaUser_id'];

	$cadPessoa = new Pessoa();
	$cadPessoa->idPessoa = $idpessoa;
	$dadosUser = $cadPessoa->getDadosPessoa($cadPessoa);

	$returnJson 	=	json_encode($dadosUser);

	echo $returnJson;