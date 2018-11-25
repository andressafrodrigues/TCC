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

	    include("../../config/connectionSQL.php");

		$sql = "INSERT INTO tbpessoa (nome, sobrenome, cep, rua, numero, descricao, cidade, bairro, uf, autonomo, celular, email, senha) VALUES ('$nomePessoa', '$sobrenomePessoa', '$cep', '$rua', '$numero', '$descricao', '$cidade', '$bairro', '$uf', '$autonomo', '$celular', '$email', '$senha');";
 
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
}
 ?>