<?php
	session_start();
	require('../../config/connectionSQL.php');
	include ('../../classes/pessoa.php');
	include("../../config/configPagina.php");

	$idpessoa	=	$_SESSION['idUser'];

	$cadPessoa = new Pessoa();
	$cadPessoa->idPessoa = $idpessoa;
	$dadosUser = $cadPessoa->getAutonomosProximos($cadPessoa);

	echo $dadosUser;