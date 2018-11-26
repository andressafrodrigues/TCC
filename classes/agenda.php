<?php 

 /**
  * 
  */
 class Agenda
 {
 	public $idAgenda;
 	public $data;
 	public $idPessoa;
 	public $fkCliente;
 	public $fkAutonomo;
 	public $status; //A = Agendado || E = Em Andamento || F = Finalizado || C = Cancelado
 	public $turno; //M = Manhã || T = Tarde || N = Noite

	public function validateAgendamentoMesmaData($classe){
		include("../../config/connectionSQL.php");
    	$return				=	true;
    	$idAutonomo			=	$classe->fkAutonomo;
    	$idCliente			=	$classe->fkCliente;
    	$dataAgendamento	=	$classe->data;
    	$status				=	$classe->status;
    	$turno				=	$classe->turno;
		$query	=	$conn->query("SELECT * FROM tbagenda WHERE fkCliente = '".$idCliente."' and fkAutonomo = '".$idAutonomo."' and turno = '".$turno."' and status <> 'F';");
		$Row	=   $query->fetch_array(MYSQLI_ASSOC);
		$idAut 	=	Null;
		$idAut 	=	$Row["fkAutonomo"];
		if ($idAut == $idAutonomo){
			$return = false;
		}
    	return $return;
	}

	public function validaUsuarioAutonomo($classe){
		include("../../config/connectionSQL.php");
		$return			=	false;
		$idPessoa 		= 	0;
		$idPessoa 		=	$classe->idPessoa;
		$objetoResposta	=	new \stdClass();
		if($idPessoa > 0){
			$qrys 	=	"select * from tbpessoa where idPessoa = '".$idPessoa."'";
			$query 	=	$conn->query($qrys);
			$Row   	=   $query->fetch_array(MYSQLI_ASSOC);
			$pessoaAutonoma		=	$Row["autonomo"];
			if($pessoaAutonoma == "S"){
				$return	= true;
			}
		}
    	$objetoResposta->return		=	$return;
    	return $objetoResposta;
	}
	
    public function agendarServico($classe) {
    	$dadosValidos 		=	true;
    	$return				=	false;
    	$mensagem			=	"Dados inválidos: ";
    	$idAutonomo			=	$classe->fkAutonomo;
    	$idCliente			=	$classe->fkCliente;
    	$dataAgendamento	=	$classe->data;
    	$status				=	$classe->status;
    	$turno				=	$classe->turno;
    	$objetoResposta		=	new \stdClass();

    	if ($status != "A" && $status != "E" && $status != "F" && $status != "C"){
			$dadosValidos	=	false;
			$mensagem = $mensagem."Status inválido!";
    	}
    	if($turno != "M" && $turno != "T" && $turno != "N"){
    		$dadosValidos	=	false;
			$mensagem = $mensagem."Turno inválido!";
    	}
    	if($idAutonomo <= 0 || $idAutonomo == Null){
    		$dadosValidos	=	false;
			$mensagem = $mensagem."Autonomo inválido!";
    	}
    	if($idCliente <= 0 || $idCliente == Null){
    		$dadosValidos	=	false;
			$mensagem = $mensagem."Cliente inválido!";
    	}
    	if(!$classe->validateAgendamentoMesmaData($classe)){
    		$dadosValidos	=	false;
			$mensagem = $mensagem."Já existe um agendamento!";
    	}
    	$sql = "";
    	if($dadosValidos){
			include("../../config/connectionSQL.php");
			$sql = "INSERT INTO tbagenda (data,fkCliente,fkAutonomo,status,turno) values ('".$dataAgendamento."','".$idCliente."','".$idAutonomo."','".$status."','".$turno."')";
			if ($conn->query($sql)) {
				$return = true;
				$mensagem	=	"Agendamento efetuado com Sucesso!";
			} else {
				$mensagem = sprintf("Erro: %s\n", $mysqli->error);
				$return = false;
			}
    	}
    	$objetoResposta->mensagem	=	$mensagem;
    	$objetoResposta->return		=	$return;
    	return $objetoResposta;
    }

    public function getAgendamentos($classe){
		include("../../config/connectionSQL.php");
		$dadosValidos			=	true;
		$idPessoa 				= 	0;
		$idPessoa 				=	$classe->idPessoa;
		$arrayDeAgendamentos[]	=	Null;
		if($idPessoa > 0){
			$qry 				=	"select * from tbpessoa where idPessoa = '".$idPessoa."'";
			$query 				=	$conn->query($qry);
			$Row   				=   $query->fetch_array(MYSQLI_ASSOC);
			$pessoaAutonoma		=	$Row["autonomo"];
			if($pessoaAutonoma == "S"){
				$qryA =	"SELECT * FROM tbagenda where fkAutonomo = '".$idPessoa."' ORDER BY idAgenda DESC;";
			}else{
				$qryA =	"SELECT * FROM tbagenda where fkCliente = '".$idPessoa."' ORDER BY idAgenda DESC;";
			}
			$query = $conn->query($qryA);
			while($RowPes   =	$query->fetch_array(MYSQLI_ASSOC)){
				$status 		=	"";
				$turno			=	"";
				$status 		=	$RowPes["status"];
				$turno 			=	$RowPes["turno"];
				//A = Agendado || E = Em Andamento || F = Finalizado || C = Cancelado
				if ($status == "A"){
					$status = "Agendado";
				}elseif ($status == "E") {
					$status = "Em Andamento";
				}elseif ($status == "F"){
					$status = "Finalizado";
				}elseif ($status == "C"){
					$status = "Cancelado";
				}
				//M = Manhã || T = Tarde || N = Noite
				if($turno == "M"){
					$turno = "Manhã";
				}elseif($turno == "T"){
					$turno = "Tarde";
				}elseif($turno == "N"){
					$turno = "Noite";
				}
				$dataAgendamento = $RowPes["data"];
				$buttonCancelar	=	'<a onclick="cancelarAgendamento('.$RowPes["idAgenda"].')" class="btn btn-xs btn-danger">Cancelar</a>';
				$buttonDefinirComoFazendo	=	'<a onclick="definirComoFazendo('.$RowPes["idAgenda"].')" class="btn btn-xs btn-info">Trabalhando</a>';
				$buttonDefinirComoTerminado	=	'<a onclick="definirComoTerminado('.$RowPes["idAgenda"].')" class="btn btn-xs btn-primary">Concluir</a>';
				$outher	=	"";
				if($pessoaAutonoma == "S"){
					if ($status == "Cancelado" || $status == "Finalizado"){
						$buttons = "";
					}elseif ($status == "Em Andamento"){
						$buttons = $buttonCancelar.$buttonDefinirComoTerminado;
					}else{
						$buttons = $buttonCancelar.$buttonDefinirComoFazendo.$buttonDefinirComoTerminado;
					}
					$tipoPessoa = "Cliente";
					$qrys 				=	"select * from tbpessoa where idPessoa = '".$RowPes["fkCliente"]."'";
					$querys				=	$conn->query($qrys);
					$RowOther   		=   $querys->fetch_array(MYSQLI_ASSOC);
					$outher = $RowOther["nome"];
				}else{
					if ($status != "Cancelado" && $status != "Finalizado"){
						$buttons = $buttonCancelar;
					}else{
						$buttons	=	"";
					}
					$tipoPessoa = "Autonomo(a)";
					$qrys 				=	"select * from tbpessoa where idPessoa = '".$RowPes["fkAutonomo"]."'";
					$querys				=	$conn->query($qrys);
					$RowOther   		=   $querys->fetch_array(MYSQLI_ASSOC);
					$outher = $RowOther["nome"];
				}

				$divAnexavel	=	'<div class="media-body "><small class="float-right text-navy">'.$status.'</small><strong>Agendamento</strong> '.$tipoPessoa.': <strong>'.$outher.'</strong>. <br><small class="text-muted">'.$dataAgendamento.' - Turno: '.$turno.'</small><div class="actions">'.$buttons.'</div></div>';

				$arrayDeAgendamentos[]	=	array(	'idAgendamento'		=>	$RowPes["idAgenda"],
												'divAnexavel'		=>	$divAnexavel
										);
			}
		}
		$arrayFinal = json_encode($arrayDeAgendamentos);
		return $arrayFinal;
    }

    public function setCancelAgendamento($classe){
    	$dadosValidos 		=	true;
    	$return				=	false;
    	$mensagem			=	"";
    	$idAgenda			=	$classe->idAgenda;
    	$objetoResposta		=	new \stdClass();

    	if($idAgenda <= 0 || $idAgenda == Null){
    		$dadosValidos	=	false;
			$mensagem = "Agendamento inválido!";
    	}
    	$sql = "";
    	if($dadosValidos){
			include("../../config/connectionSQL.php");
			$sql = "UPDATE tbagenda SET status = 'C' WHERE idAgenda = '".$idAgenda."'";
			if ($conn->query($sql)) {
				$return = true;
				$mensagem	=	"Agendamento cancelado com sucesso!";
			} else {
				$mensagem = sprintf("Erro: %s\n", $mysqli->error);
				$return = false;
			}
    	}
    	$objetoResposta->mensagem	=	$mensagem;
    	$objetoResposta->return		=	$return;
    	return $objetoResposta;
    }

    public function setInProgressAgendamento($classe){
    	$dadosValidos 		=	true;
    	$return				=	false;
    	$mensagem			=	"";
    	$idAgenda			=	$classe->idAgenda;
    	$objetoResposta		=	new \stdClass();

    	if($idAgenda <= 0 || $idAgenda == Null){
    		$dadosValidos	=	false;
			$mensagem = "Agendamento inválido!";
    	}
    	$sql = "";
    	if($dadosValidos){
			include("../../config/connectionSQL.php");
			$sql = "UPDATE tbagenda SET status = 'E' WHERE idAgenda = '".$idAgenda."'";
			if ($conn->query($sql)) {
				$return = true;
				$mensagem	=	"Agendamento definido como Em Andamento, com sucesso!";
			} else {
				$mensagem = sprintf("Erro: %s\n", $mysqli->error);
				$return = false;
			}
    	}
    	$objetoResposta->mensagem	=	$mensagem;
    	$objetoResposta->return		=	$return;
    	return $objetoResposta;
    }

    public function setDoneAgendamento($classe){
    	$dadosValidos 		=	true;
    	$return				=	false;
    	$mensagem			=	"";
    	$idAgenda			=	$classe->idAgenda;
    	$objetoResposta		=	new \stdClass();

    	if($idAgenda <= 0 || $idAgenda == Null){
    		$dadosValidos	=	false;
			$mensagem = "Agendamento inválido!";
    	}
    	$sql = "";
    	if($dadosValidos){
			include("../../config/connectionSQL.php");
			$sql = "UPDATE tbagenda SET status = 'F' WHERE idAgenda = '".$idAgenda."'";
			if ($conn->query($sql)) {
				$return = true;
				$mensagem	=	"Agendamento finalizado com sucesso!";
			} else {
				$mensagem = sprintf("Erro: %s\n", $mysqli->error);
				$return = false;
			}
    	}
    	$objetoResposta->mensagem	=	$mensagem;
    	$objetoResposta->return		=	$return;
    	return $objetoResposta;
    }
 }
 ?>