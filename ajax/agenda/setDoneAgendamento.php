<?php
	session_start();
	require('../../config/connectionSQL.php');
	include ('../../classes/agenda.php');
	include("../../config/configPagina.php");

	$retorno = false;
	$idAgendamento       = 	$_POST['idAgendamento'];

	$agendaServ = new Agenda();
	$agendaServ->idAgenda       = $idAgendamento;

	$ret = $agendaServ->setDoneAgendamento($agendaServ);
	$returnJson 	=	json_encode($ret);
	echo $returnJson;
?>