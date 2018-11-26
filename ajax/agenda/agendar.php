<?php
	session_start();
	require('../../config/connectionSQL.php');
	include ('../../classes/agenda.php');
	include("../../config/configPagina.php");

	$retorno = false;
	$idpessoa	=	$_SESSION['idUser'];

	$data       = 	$_POST['formAgendamento_data'];
	$status     = 	$_POST['formAgendamento_Status'];	//A = Agendado || E = Em Andamento || F = Finalizado
	$turno      = 	$_POST['formAgendamento_turno'];	//M = Manhã || T = Tarde || N = Noite
	$fkAutonomo	=	$_POST['formAgendamento_idAutonomo'];
	$fkCliente	=	$idpessoa;


	$agendaServ = new Agenda();
	$agendaServ->data       = $data;
	$agendaServ->status     = $status;
	$agendaServ->turno      = $turno;
	$agendaServ->fkAutonomo = $fkAutonomo;
	$agendaServ->fkCliente  = $fkCliente;

	$ret = $agendaServ->agendarServico($agendaServ);
	$returnJson 	=	json_encode($ret);
	echo $returnJson;
?>