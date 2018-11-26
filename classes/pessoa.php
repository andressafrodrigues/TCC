<?php  
/**
 * 
 */
class Pessoa
{
	public $idPessoa;
	public $nomePessoa;
	public $sobrenomePessoa;
	public $cep;
	public $rua;
	public $numero;
	public $descricao;
	public $cidade;
	public $bairro;
	public $uf;
	public $autonomo;
	public $celular;
	public $email;
	public $senha;
	public $localizacao;


	public function distancia($lat1, $lon1, $lat2, $lon2) {
		$lat1 = deg2rad($lat1);
		$lat2 = deg2rad($lat2);
		$lon1 = deg2rad($lon1);
		$lon2 = deg2rad($lon2);

		$latD = $lat2 - $lat1;
		$lonD = $lon2 - $lon1;

		$dist = 2 * asin(sqrt(pow(sin($latD / 2), 2) +
		cos($lat1) * cos($lat2) * pow(sin($lonD / 2), 2)));
		$dist = $dist * 6371;

		return number_format($dist, 2, '.', '');
	}

	public function login($usuario) {
		$return = false;
		$dadosValidos = true;
		$email = $usuario->email;
		$senha = $usuario->senha;
		$idUser = "";
		$mensagem = "Usuário válido";
		if ($email == "" || $email == " "){
			$mensagem = "Email inválido!";
			$dadosValidos = false;
		}
		if ($senha == "" || $senha == " "){
			$mensagem = "Senha inválida!";
			$dadosValidos = false;
		}
		if ($dadosValidos){
			include("../../config/connectionSQL.php");
			$sql =  $conn->query("SELECT senha FROM tbpessoa WHERE email = '$email' AND senha = '$senha'");
			$rowCount = $sql->num_rows;
			if ($rowCount > 0 ) {
				$user = mysqli_fetch_object($sql);
				$return = true;
			}
			if ($return){
				$query = $conn->query("SELECT idPessoa FROM tbpessoa WHERE email = '".$email."' AND senha = '".$senha."';");
				$Row   =   $query->fetch_array(MYSQLI_ASSOC);
				$idUser = $Row["idPessoa"];
			}else{
				$mensagem = "Usuário ou senha não encontrados!";
			}
		}
		$objetoResposta	=	new \stdClass();
		$objetoResposta->idUser 	=	$idUser;
		$objetoResposta->mensagem	=	$mensagem;
		$objetoResposta->resposta	=	$return;
		return $objetoResposta;
	}

	public function cadastrarPessoa($classe) {
		$dadosValidos = true;

		$nomePessoa      = $classe->nomePessoa;
		$sobrenomePessoa = $classe->sobrenomePessoa;
		$cep             = $classe->cep;
		$rua             = $classe->rua;
		$numero          = $classe->numero;
		$descricao       = $classe->descricao;
		$cidade          = $classe->cidade;
		$bairro          = $classe->bairro;
		$uf              = $classe->uf;
		$autonomo        = $classe->autonomo;
		$celular         = $classe->celular;
		$email           = $classe->email;
		$senha           = $classe->senha;
		$localizacao     = $classe->localizacao;

		include("../../config/connectionSQL.php");

		$sql = "INSERT INTO tbpessoa (nome, sobrenome, cep, rua, numero, descricao, cidade, bairro, uf, autonomo, celular, email, senha, localizacao) VALUES ('$nomePessoa', '$sobrenomePessoa', '$cep', '$rua', '$numero', '$descricao', '$cidade', '$bairro', '$uf', '$autonomo', '$celular', '$email', '$senha', '$localizacao');";

		if ($conn->query($sql)) {
			$return = true;
		} else {
			var_dump(sprintf("Errormessage: %s\n", $mysqli->error));
			$return = false;
		}

		var_dump($sql);
		return $return;
	}

	public function getDadosPessoa($classe) {
		$dadosValidos 	=	true;
		$idPessoa 		= 	0;
		$idPessoa 		=	$classe->idPessoa;
		$objetoPessoa	=	new \stdClass();
		if ($idPessoa > 0){
			include("../../config/connectionSQL.php");
			$query = $conn->query("SELECT * FROM tbpessoa WHERE idPessoa = '".$idPessoa."';");
			$Row   =   $query->fetch_array(MYSQLI_ASSOC);
			$objetoPessoa->idUser 		=	$Row["idPessoa"];
			$objetoPessoa->autonomo 	=	$Row["autonomo"];
			$objetoPessoa->nome 		=	$Row["nome"];
			$objetoPessoa->sobrenome	=	$Row["sobrenome"];
			$objetoPessoa->email 		= 	$Row["email"];
			$objetoPessoa->celular 		= 	$Row["celular"];
			$objetoPessoa->senha 		= 	$Row["senha"];
			$objetoPessoa->descricao 	= 	$Row["descricao"];
			$objetoPessoa->cep 			= 	$Row["cep"];
			$objetoPessoa->rua 			= 	$Row["rua"];
			$objetoPessoa->cidade 		= 	$Row["cidade"];
			$objetoPessoa->bairro 		= 	$Row["bairro"];
			$objetoPessoa->uf 			= 	$Row["uf"];
			$objetoPessoa->numero 		= 	$Row["numero"];
			$objetoPessoa->return		= 	true;
		}else{
			$objetoPessoa->return		= 	false;
		}
		return $objetoPessoa;
	}

	public function updateUsuario($classe) {
		include("../../config/connectionSQL.php");
		$dadosValidos		=	true;
		$idPessoa 			= 	0;
		$idPessoa 			=	$classe->idPessoa;
		$nomePessoa      	= 	$classe->nomePessoa;
		$sobrenomePessoa 	= 	$classe->sobrenomePessoa;
		$cep             	= 	$classe->cep;
		$rua             	= 	$classe->rua;
		$numero          	= 	$classe->numero;
		$descricao       	= 	$classe->descricao;
		$cidade          	= 	$classe->cidade;
		$bairro          	= 	$classe->bairro;
		$uf              	= 	$classe->uf;
		$autonomo        	= 	$classe->autonomo;
		$celular         	= 	$classe->celular;
		$email           	= 	$classe->email;
		$senha           	= 	$classe->senha;
		$objetoPessoa		=	new \stdClass();
		$mensagem = "Dados incorretos, revise os seguintes campos: ";
		if ($idPessoa <= 0){
			$dadosValidos = false;
			$mensagem = $mensagem." Usuário inválido <br>";
		}
		if ($nomePessoa == "" || $nomePessoa == " "){
			$dadosValidos = false;
			$mensagem = $mensagem."Nome inválido <br>";
		}
		if ($cep == "" || $cep == " "){
			$dadosValidos = false;
			$mensagem = $mensagem."CEP inválido <br>";
		}
		if ($senha == "" || $senha == " "){
			$dadosValidos = false;
			$mensagem = $mensagem."Senha inválida <br>";
		}
		if ($email == "" || $email == " "){
			$dadosValidos = false;
			$mensagem = $mensagem."Email inválido <br>";
		}
		if ($numero == "" || $numero == " "){
			$dadosValidos = false;
			$mensagem = $mensagem."Numero inválido <br>";
		}
		if ($autonomo != "N" && $autonomo != "S"){
			$dadosValidos = false;
			$mensagem = $mensagem."Tipo de pessoa inválida <br>";
		}
		if ($dadosValidos){
			$qry	=	"UPDATE tbpessoa SET 
			autonomo 	= '".$autonomo."', 
			nome 		= '".$nomePessoa."', 
			sobrenome 	= '".$sobrenomePessoa."', 
			email 		= '".$email."', 
			celular 	= '".$celular."', 
			senha 		= '".$senha."', 
			descricao	= '".$descricao."', 
			cep 		= '".$cep."', 
			rua 		= '".$rua."', 
			cidade 		= '".$cidade."', 
			bairro 		= '".$bairro."', 
			uf 			= '".$uf."', 
			numero 		= '".$numero."' 
			WHERE idPessoa 	= '".$idPessoa."';
			";
			$query = $conn->query($qry);
			if ($query === TRUE){
				$objetoPessoa->return	=	true;
				$objetoPessoa->mensagem	=	"Atualização concluída com êxito!";
				$objetoPessoa->Autonomo	=	$autonomo;
				$objetoPessoa->SQL 		= 	$qry;
			}else{		
				$objetoPessoa->return	=	false;
				$objetoPessoa->mensagem	=	"Erro ao atualizar dados: ".$conn->error;
			}

		}else{
			$objetoPessoa->return	= 	false;
			$objetoPessoa->mensagem	=	$mensagem;
		}
		return $objetoPessoa;
	}

	public function getAutonomosProximos($classe){
		include("../../config/connectionSQL.php");
		$dadosValidos		=	true;
		$idPessoa 			= 	0;
		$idPessoa 			=	$classe->idPessoa;
		$arrayDeAutonomos[]	=	Null;
		if($idPessoa > 0){
			$qry 				=	"select * from tbpessoa where idPessoa = '".$idPessoa."' and autonomo = 'N'";
			$query 				=	$conn->query($qry);
			$RowPes   			=   $query->fetch_array(MYSQLI_ASSOC);
			$localizacaoPessoa	=	"";
			$localizacaoPessoa	=	$RowPes["localizacao"];
			$partesPes 			=	explode(",",$localizacaoPessoa);
			if ($localizacaoPessoa != ""){
				$qry = "select * from tbpessoa where autonomo = 'S' and idPessoa <> '".$idPessoa."' and localizacao is not null Order By cep DESC;";
				$query = $conn->query($qry);
				while($RowPes   =	$query->fetch_array(MYSQLI_ASSOC)){
					$localizacaoAutonomo = $RowPes["localizacao"];
					$partesAut 	=	explode(",",$localizacaoAutonomo);
					$distancia	=	Null;
					$distancia 	=	$classe->distancia($partesPes[0],$partesPes[1],$partesAut[0],$partesAut[1]);
					if($distancia <= 30.00){
						$strongNome 	=	"<strong>".$RowPes["nome"]."</strong>";
						$cidade 		=	$RowPes["cidade"].",";
						$estado 		=	$RowPes["uf"]."<br>";
						$distan 		=	"Distancia de: ".$distancia."KM<br>";
						$telefone		=	$RowPes["celular"];
						$divAnexavel	=	'<div class="contact-box"><a class="row" href="#"><div class="col-4"><div class="text-center"><img alt="image" class="rounded-circle m-t-xs img-fluid" src="http://31.media.tumblr.com/16c5126fef72592182409a229621983a/tumblr_n2whpyRT6z1tollfpo1_1280.gif"></div></div><div class="col-8"><h3>'.$strongNome.'</h3><p><i class="fa fa-map-marker"></i>'.$cidade.''.$estado.''.$distan.'</p><address><abbr title="Phone">Contato:</abbr>'.$telefone.'</address></div></a></div>';
						$arrayDeAutonomos[]	=	array(	'idAutonomo'		=>	$RowPes["idPessoa"],
														'nomeAutonomo'		=>	$RowPes["nome"],
														'distanciaAutonomo'	=>	$distancia,
														'divAnexavel'		=>	$divAnexavel
												);
					}
				}
			}
		}
		$arrayFinal = json_encode($arrayDeAutonomos);
		return $arrayFinal;
	}

}
?>