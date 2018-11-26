<?php
	session_start();
	require('../../config/connectionSQL.php');
	include ('../../classes/agenda.php');
	include("../../config/configPagina.php");

	$retorno = false;
	$idpessoa	=	$_SESSION['idUser'];

	$agendaServ = new Agenda();
	$agendaServ->idPessoa  = $idpessoa;

	$ret = $agendaServ->getAgendamentos($agendaServ);

	echo $ret;
?>