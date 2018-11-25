<?php
	session_start();
	require('../../config/connectionSql.php');
	include ('../../classes/pessoa.php');

	$email 		= 	$_POST['email'];
	$senha 		= 	$_POST['password'];
	$retorno 	= 	false;
	$ret		=	new \stdClass();

	$usuario = new Pessoa();
	$usuario->email	= 	$email;
	$usuario->senha	= 	$senha;
	$login 			=	$usuario->login($usuario);
	
	$ret->idUser 	=	$login->idUser;
	$ret->mensagem	=	$login->mensagem;
	$ret->retorno 	=	$login->resposta;
	$returnJson 	=	json_encode($ret);

	if ($ret->retorno == true){
		$_SESSION["idUser"] = $ret->idUser;
	}else{
		$_SESSION["idUser"] = "";
	}
	echo $returnJson;
